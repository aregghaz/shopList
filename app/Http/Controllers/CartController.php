<?php

namespace App\Http\Controllers;

use App\Models\Addreess;
use App\Models\PreOrder;
use App\Models\ProductName;
use App\Models\Products;
use Auth;
use Illuminate\Http\Request;
use Session;
use View;

class CartController extends Controller
{
    public function __construct()
    {
        Session::has('applocale') ?: Session::put('applocale', 'am');

    }

    public function getAddToCart(Request $request)
    {

        $id = $request['id'];
        $count = $request['count'];
        $color = $request['color'];
        $size = $request['size'];
        $user_id = Auth::user()->id;
        $check = [
            // 'count'             => $count,
            'color' => $color,
            'size' => $size,
            'user_id' => $user_id,
            'product_id' => $id,
        ];
        $update = [
            'count' => $count,
            'color' => $color,
            'size' => $size,
            'user_id' => $user_id,
            'product_id' => $id,
        ];

        // checking exist or not
        $new_order = PreOrder::where($check);

        if (!$new_order->exists()) {
            // if not exist
            PreOrder::create($update);
        } else {
            // if exist
            PreOrder::where($check)->update(['count' => $count]);
        }


        $totalQty = $request->session()->get('result');
        $data = $request->session()->get('cart');
        $countData = count($data);
        $data[$countData]['product'] = Products::find($id);
        $data[$countData]['productName'] = ProductName::find($id);
        $data[$countData]['size'] = $size;
        $data[$countData]['color'] = $color;
        $data[$countData]['count'] = $count;
        $data[$countData]['product_id'] = $id;


        $request->session()->put('cart', $data);
        $request->session()->put('result', (int)$totalQty + 1);


        return View::make("include/cart");
    }


    public function AddToOrder(Request $request)
    {

        $cmd = $request['cmd'];

        if ($cmd == 'addOrder') {
            $request->session()->forget('order');
            $id = $request['id'];
            $count = $request['count'];
            $color = $request['color'];
            $size = $request['size'];
            $data[0]['product'] = Products::find($id)->first();
            $data[0]['productName'] = ProductName::find($id)->first();
            $data[0]['size'] = $size;
            $data[0]['color'] = $color;
            $data[0]['count'] = $count;
            $data[0]['product_id'] = $id;
            $request->session()->put('order', $data);
            $data['products'] = $data;
        } else if ($cmd == 'addOrderCart') {
            $request->session()->forget('order');
            $id = $request['id'];
            $count = $request['count'];
            $data2 = Session::get('cart');
            $data[0]['product'] = $data2[$id]['product'];
            $data[0]['productName'] = $data2[$id]['productName'];
            $data[0]['size'] = $data2[$id]['size'];

            if (isset($count)) {
                $data[0]['count'] = $count;
            } else {
                $data[0]['count'] = $data2[$id]['count'];
            }
            $data[0]['color'] = $data2[$id]['color'];

            $data[0]['product_id'] = $data2[$id]['product_id'];
            $request->session()->put('order', $data);
            $data['products'] = $data;
        } else if ($cmd == 'checkout') {

            $products = $request->session()->get('order');

            $data['products'] = $products;
        }
        $data['address'] = Addreess::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

        $data['user'] = Auth::User();
        return view('shop.check-out', $data);
    }

    public function addWish(Request $request)
    {
        $id = $request['id'];
        $count = $request['count'];
        $color = $request['color'];
        $size = $request['size'];
        $check = true;
        $cartsReasault = [];
        if ($request->session()->exists('wish')) {
            $carts = $request->session()->get('wish');
            $cartsReasault = $request->session()->get('wishResult');
            $countCart = count($carts);
            for ($i = 0; $i < $countCart; $i++) {
                if ($carts[$i]['id'] == $id) {
                    $carts[$i]['count'] += (int)$count;
                    $carts[$i]['size'] = $carts[$i]['size'] . ',' . $size;
                    $carts[$i]['color'] = $carts[$i]['color'] . ',' . $color;
                    $cartsReasault['totalPrice'] += $carts[$i]['product']['price'] * (int)$count;
                    $check = false;
                    $request->session()->put('wish', $carts);
                    $request->session()->put('wishResult', $cartsReasault);
                }
            }
            if ($check) {
                $carts[$countCart]['product'] = Products::find($id);
                $carts[$countCart]['productName'] = ProductName::find($id);
                $carts[$countCart]['id'] = $id;
                $carts[$countCart]['count'] = $count;
                $carts[$countCart]['size'] = $size;
                $carts[$countCart]['color'] = $color;
                $cartsReasault['totalQty'] += 1;
                $cartsReasault['totalPrice'] += $carts[$countCart]['product']['price'] * $count;
                $request->session()->put('wish', $carts);
                $request->session()->put('wishResult', $cartsReasault);
            }
        } else {
            $data[0]['product'] = Products::find($id);
            $data[0]['productName'] = ProductName::find($id);
            $data[0]['id'] = $id;
            $data[0]['count'] = $count;
            $data[0]['size'] = $size;
            $data[0]['color'] = $color;
            $cartsReasault['totalQty'] = 1;
            $cartsReasault['totalPrice'] = $data[0]['product']['price'] * (int)$count;
            $request->session()->put('wish', $data);
            $request->session()->put('wishResult', $cartsReasault);
        }

        print_r('ok');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.cart');
        }
        $data['products'] = Session::get('cart');
        $data['result'] = Session::get('result');
        return view('shop.cart', $data);
    }

    public function getWish()
    {

        $data['wish'] = Session::get('wish');
        $data['wishResult'] = Session::get('wishResult');
        return view('shop.wishlist', $data);
    }


    public function getCheckOut(Request $request)
    {
        $request->session()->forget('order');

        $productsId = $request->data;
        $count = 0;
        $products = $request->session()->get('cart');
        $checkout = [];
        $countCart = count($products);
        for ($i = 0; $i < $countCart; $i++) {
            for ($j = 0; $j < count($productsId); $j++) {
                if ($i == $productsId[$j][0]) {
                    $checkout[$count] = $products[$i];
                    $checkout[$count]['count'] = $productsId[$j][1];
                    $count++;
                    break;
                }
            }
        }


        $request->session()->put('order', $checkout);

        return response('ok');
    }

    public function deleteCheckoutProdcut(Request $request, $products)
    {
        $cmd = $request->cmd;
        $user_id = Auth::user()->id;
        if ($cmd == 'deleteByID') {
            $products = Session::get('cart');
            $id = $request->id;
            $check = [
                'count' => $products[$id]['count'],
                'color' => $products[$id]['color'],
                'size' => $products[$id]['size'],
                'user_id' => $user_id,
                'product_id' => $products[$id]['product']->id,
            ];
            // checking exist or not
            $new_order = PreOrder::where($check);

            if ($new_order->exists()) {
                // if not exist
                $new_order->delete();
            }

        } else {
            $user_id = Auth::user()->id;
            $order = $request->session()->get('order');
            $countCart = count($order);
            for ($i = 0; $i < $countCart; $i++) {
                $check = [
                    'count' => $order[$i]['count'],
                    'color' => $order[$i]['color'],
                    'size' => $order[$i]['size'],
                    'user_id' => $user_id,
                    'product_id' => $order[$i]['product']->id,
                ];
                // checking exist or not
                $new_order = PreOrder::where($check);

                if ($new_order->exists()) {
                    // if not exist
                    $new_order->delete();
                }
            }
        }

        $preorder = PreOrder::where(['user_id' => $user_id])->get();
        for ($i = 0; $i < count($preorder); $i++) {
            $data[$i]['product'] = Products::find($preorder[$i]->product_id);
            $data[$i]['productName'] = ProductName::find($preorder[$i]->product_id);
            $data[$i]['size'] = $preorder[$i]->size;
            $data[$i]['color'] = $preorder[$i]->color;
            $data[$i]['count'] = $preorder[$i]->count;
            $data[$i]['product_id'] = $preorder[$i]->product_id;
            $totalQty = $i;
        }
        $request->session()->put('cart', $data);
        $request->session()->put('result', $totalQty);
        if ($cmd == 'deleteByID') {
            return redirect()->back();
        }
    }

    public function deleteWish(Request $request, $id)
    {
        $carts = $request->session()->get('wish');
        $cartsReasault = $request->session()->get('wishResult');
        $countCart = count($carts);
        for ($i = 0; $i < $countCart; $i++) {
            if ($carts[$i]['id'] == $id) {
                $cartsReasault['totalPrice'] -= $carts[$i]['product']['price'] * (int)$carts[$i]['count'];
                $cartsReasault['totalQty'] -= 1;
                $deleteProduct = $i;
            }
        }
        array_splice($carts, $deleteProduct, 1);
        $request->session()->put('wish', $carts);
        $request->session()->put('wishResult', $cartsReasault);
        return redirect()->back();
    }
}
