<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryAm;
use App\Models\CategoryRu;
use App\Models\ProductName;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\SubCategoryAm;
use App\Models\SubCategoryRu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use App\Models\Orders;

class ProductController extends Controller
{
    public function __construct()
    {
        Session::has('applocale') ?: Session::put('applocale', 'am');

    }

    public $user_id;
    public $user;
    public function Orders() {
        $user = Auth::User();

        if ($user->role == 'admin') {
            $data = Orders::with('Address')->where('status', 'Pending')->get();
        }else{
            $data = Orders::with('Address')->where(['company_id' => $user->id, 'status'=> 'Pending'])->get();

        }
        return $data;
    }
    public function getLang()
    {
        $lang = Session::get('applocale');
        if ($lang == 'am') {
            $data['category'] = CategoryAm::All();
            $data['subCategory'] = SubCategoryAm::All();
        } else if ($lang == 'ru') {
            $data['category'] = CategoryRu::All();
            $data['subCategory'] = SubCategoryRu::All();
        } else if ($lang == 'en') {
            $data['category'] = Category::All();
            $data['subCategory'] = SubCategory::All();
        }
        return $data;
    }

    public function index()
    {
        $data['categories'] = Category::all();
        $data['sub_caregories'] = SubCategory::all();
        $user = Auth::User();
        if ($user->role == 'admin') {
            $data['products'] = Products::with('ProductName', 'CategoryProduct', 'SubCategoryProduct')->get();

        } else if ($user->role == 'client') {
            $data['products'] = Products::with('SubCategoryProduct', 'CategoryProduct', 'ProductName')->where('user_id', $user->id)->get();
        }

        $data['newOrder'] = $this->Orders();
        $data['page'] = 'product';
        return view('admin.product', $data);
    }

    public function getsubcategoryajax(Request $request)
    {
        $category_id = $request->id;
        $sub_categories = SubCategory::where('category_id', $category_id)->get();
        foreach ($sub_categories as $sub_cat) {
            $data[] = $sub_cat;
        }
        $response = array(
            'status' => 'success',
            'subcategory' => $data
        );

        return response()->json($response);
    }

    public function newProduct()
    {
        $data['category'] = Category::with('SubCategory')->get();
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'newProduct';
        return view('admin.newProduct', $data);
    }

    public function add_product(Request $request)
    {
        $count = 0;
        foreach ($request->file('images') as $image) {
            $filename = time() + $count . '.png';
            $image->move(public_path() . '/img/products/', $filename);
            $data[] = $filename;
            // open file a image resource
            $img = Image::make(public_path() . '/img/products/' . $filename);
            $img->fit(600 , 500);
            $img->save(public_path() . '/img/products/' . $filename);
            $count++;
        }
        $this->user_id = Auth::user()->id;
        $this->user = Auth::user()->name;
        $productName = new ProductName();
        $productName->nameEn = $request->nameEn;
        $productName->nameRu = $request->nameRu;
        $productName->nameAm = $request->nameAm;
        $productName->descriptionEn = $request->descriptionEn;
        $productName->descriptionAm = $request->descriptionAm;
        $productName->descriptionRu = $request->descriptionRu;
        $productName->save();
        $product = new Products();
        $product->id = $productName->id;
        $product->user_id = $this->user_id;
        $product->user = $this->user;
        $product->category_id = $request['category_id'];
        $product->sub_category_id = $request['sub_category_id'];
        $product->product_id = $productName->id;
        $product->price = $request['price'];
        $product->images = $data;
        $product->sku = $request->sku;
        $product->availability = $request['availability'];
        $product->size = $request['size'];
        $product->colors = $request['colors'];
        $product->save();

        return redirect()->back()->with('product' . 'Added product successful !');
    }

    public function edit_product(Request $request)
    {
        $product_id = $request['product_id'];
        $product = Products::find($product_id);
        if ($request['images']) {
            $count = 0;
            foreach ($request->file('images') as $image) {
                $filename = time() + $count . '.jpg';
                $image->move(public_path() . '/img/products/', $filename);
                $data[] = $filename;
                // open file a image resource
                $img = Image::make(public_path() . '/img/products/' . $filename);
                $img->fit(600 , 500);
                $img->save(public_path() . '/img/products/' . $filename);
                $count++;
            }
            $product->images = $data;
        }
      //  dd($product_id);
        $productName = ProductName::find($product_id);
        $productName->nameEn = $request->nameEn;
        $productName->nameRu = $request->nameRu;
        $productName->nameAm = $request->nameAm;
        $productName->descriptionEn = $request->descriptionEn;
        $productName->descriptionAm = $request->descriptionAm;
        $productName->descriptionRu = $request->descriptionRu;
        $productName->update();
        $product->user_id = Auth::user()->id;
        $product->user = Auth::user()->name;
        $product->category_id = $request['category_id_edit'];
        $product->sub_category_id = $request['sub_category_id'];
        $product->price = $request['price'];
        $product->sku = $request->sku;
        $product->availability = $request['availability'];
        $product->colors = $request['colors'];
        $product->size = $request['size'];
        $product->update();
        return redirect()->back()->with('editproduct', "Edit product successful!");
    }

    public function del_product($id)
    {
        $product = Products::find($id);
        $productName = ProductName::find($id);
        $product->delete();
        $productName->delete();
        return redirect()->back()->with('deletePr', 'Product Deleted successful !');
    }


    public function brand($id)
    {

        $product = Products::findOrFail($id);
        $product->status = "1";
        $product->save();

        return redirect()->back()->with('product', 'Product added to  brand succasfuly !');
    }

    public function get_brands()
    {
        $data['brands'] = Products::where('status', '1')->OrderBy('id', 'desc')->get();
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'new';
        return view('admin.brand', $data);
    }

    public function del_brand($id)
    {

        $brand = Products::findOrFail($id);
        $brand['status'] = "0";
        $brand->save();

        return redirect()->back();
    }

    public function featured($id)
    {

        $product = Products::findOrFail($id);
        $product->status = "2";
        $product->save();

        return redirect()->back()->with('product', 'Product added to  featured succasfuly !');
    }

    public function get_featured()
    {
        $data['featureds'] = Products::where('status', '2')->OrderBy('id', 'desc')->get();
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'hot';
        return view('admin.featured', $data);
    }

    public function del_featured($id)
    {

        $featured = Products::findOrFail($id);
        $featured['status'] = "0";
        $featured->save();

        return redirect()->back();
    }

    public function sale($id)
    {

        $product = Products::findOrFail($id);
        $product->status = "3";
        $product->save();

        return redirect()->back()->with('product', 'Product added to  sale succasfuly !');
    }

    public function get_sales()
    {
        $data['sales'] = Products::where('status', '3')->OrderBy('id', 'desc')->get();
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'sale';
        return view('admin.sale', $data);
    }

    public function del_sales($id)
    {

        $sales = Products::findOrFail($id);
        $sales['status'] = "0";
        $sales->save();

        return redirect()->back();
    }

    public function best($id)
    {

        $product = Products::findOrFail($id);
        $product->status = "4";
        $product->save();

        return redirect()->back()->with('product', 'Product added to  best succasfuly !');
    }

    public function get_bests()
    {
        $data['bests'] = Products::where('status', '4')->OrderBy('id', 'desc')->get();
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'best';
        return view('admin.best', $data);
    }

    public function del_bests($id)
    {

        $best = Products::findOrFail($id);
        $best['status'] = "0";
        $best->save();

        return redirect()->back();
    }

    public function productDetails(Request $request)
    {
        $productId =$request->id ;
        $data = $this->getLang();
        $data['product'] = Products::with('SubCategoryProduct', 'CategoryProduct', 'ProductName', 'Review', 'Company', 'AverangeStars')
            ->where('product_id', $productId)
            ->first();
        $data['order'] = Orders::where(['product_id'=> $productId, 'status' => 'Delivered'])->first();

        $lang = Session::get('applocale');
        if ($lang == 'am') {
            if ($data['product']->sub_category_id) {
                $data['subCategory_name'] = SubCategoryAm::find($data['product']->category_id)->name;
            }
            $data['category_name'] = CategoryAm::find($data['product']->category_id)->name;
        } else if ($lang == 'ru') {
            if ($data['product']->sub_category_id) {
                $data['subCategory_name'] = SubCategoryRu::find($data['product']->category_id)->name;
            }
            $data['category_name'] = CategoryRu::find($data['product']->category_id)->name;
        } else if ($lang == 'en') {
            if ($data['product']->sub_category_id) {
                $data['subCategory_name'] = SubCategory::find($data['product']->category_id)->name;
            }
            $data['category_name'] = Category::find($data['product']->category_id)->name;
        }
        if (Auth::check()) {
            $data['order'] = Orders::where(['product_id'=> $productId, 'status' => 'Delivered'])->first();

            if(empty($data['order'])){
                $data['order'] = false;
            }
        } else {
            $data['order'] = false;
        }

        $data['categoryProducts'] = Products::with( 'ProductName')->where('category_id', $data['product']->category_id )->orderByRaw('RAND()')->take(16)->get();

        return view('shop.product-details', $data);
    }

    public function productByTeg(Request $request)
    {
        $data = $this->getLang();
        $data['teg'] = $request['teg'];
        if ($data['teg'] == 'best-product') {
            $data['teg'] = 'bestproducts';
            $data['products'] = Products::with('ProductName', 'AverangeStars')->where('status', '2')->paginate(16);

        } else if ($data['teg'] == 'sale') {
            $data['teg'] = 'sale';
            $data['products'] = Products::with( 'ProductName', 'AverangeStars')->where('status', "3")->paginate(16);
        }else if ($data['teg'] == 'new') {
            $data['teg'] = 'newLong';
            $data['products'] = Products::with( 'ProductName', 'AverangeStars')->where('status', '1')->paginate(16);
        }
        $data['menuteg'] = true;
        return view('shop.teg',$data);
    }
    public function allProduct(Request $request)
    {
        $data = $this->getLang();
        $data['teg'] = 'allProduct';
        $data['products'] = Products::with('ProductName', 'AverangeStars')->paginate(16);

        return view('shop.teg',$data);
    }
}
