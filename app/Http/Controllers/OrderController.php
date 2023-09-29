<?php

namespace App\Http\Controllers;

use App\Models\Addreess;
use App\Models\Companies;
use App\Models\Orders;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Validator;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Notifiable;

class OrderController extends Controller
{
    use Notifiable;
    public function add(Request $request)
    {
        $CartController = new CartController();
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric',
            'postcode' => 'required|min:4',
            'address' => 'required|min:5',
            'city' => 'required',

        ]);
        $numbers = rand(10000000, 99999999);
        $products = Session::get('order');
        $id = Auth::user()->id;
        $checkMethod = $request->payment_method;
        if ($checkMethod == 'Bank Payments') {
            $paymantMethod = 'Processing';
        } elseif ($checkMethod == 'Cash') {
            $paymantMethod = 'Pending';
        } else {
            return redirect()->back();
        }
        $address = new Addreess();
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->city = $request->city;
        $address->post_code = $request->postcode;
        $address->description = $request->description;
        $address->user_id = $id;
        $address->order_id = $numbers;
        $address->payment_method = $request->payment_method;
        $address->save();
        foreach ($products as $product) {
            $order = new Orders();
            $product_id = $product['product']['product_id'];

            $order->product_id = $product_id;
            $order->order_id = $numbers;
            $order->company_id = $product['product']['user_id'];
            $order->count = $product['count'];
            $order->amount = $product['product']['price'] * $product['count'];
            $order->size = $product['size'];
            $order->color = $product['color'];
            $order->user_id = $id;
            $order->address_id = $address->id;
            $order->status = $paymantMethod;
            $order->save();
        }
        $CartController->deleteCheckoutProdcut($request,$products);

        return redirect()->route('orderDetails',['orderId' => $numbers]);
    }

    public function orderDetails(Request $request)
    {

        $orderId = $request->orderId;
        $id = Auth::user()->id;
        $data['orders'] = Orders::with('ProductsName','Product')->where('order_id',$orderId)->get();
        $data['address'] = Addreess::where(['user_id'=>$id,'order_id'=> $orderId])->first();
        $typeUser = 'user';
      ///  \Notification::send( Auth::user(), new InvoicePaid($data, $typeUser));
        for($i = 0; $i <count($data['orders']); $i++) {
            $clientEmail = $data['orders'][$i];
            $clientEmail = User::find($clientEmail->company_id);
            $typeUser = 'client';
           /// \Notification::send($clientEmail, new InvoicePaid($data, $typeUser));
        }

        return view('shop.order-details', $data);
    }
    public function orderHistory() {
        $id = Auth::user()->id;
        $data['orders'] = Orders::with('ProductsName')->where('user_id', $id)->get();
        return view('shop.order-history', $data);

    }
}
