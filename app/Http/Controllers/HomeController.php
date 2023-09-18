<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryAm;
use App\Models\CategoryRu;
use App\Models\SubCategory;
use App\Models\SubCategoryRu;
use App\Models\Companies;
use App\Models\SubCategoryAm;
use App\Models\ProductName;
use Illuminate\Support\Facades\Session;
use App\Events\MessageSent;

class HomeController extends Controller
{

    public function __construct( )
    {
        Session::has('applocale') ?: Session::put('applocale', 'am');

    }
    public function getLang() {
        $lang = Session::get('applocale');
        if($lang == 'am'){
            $data['category'] = CategoryAm::All();
            $data['subCategory'] = SubCategoryAm::All();
        }else if($lang == 'ru') {
            $data['category'] = CategoryRu::All();
            $data['subCategory'] = SubCategoryRu::All();
        }else if($lang == 'en') {
            $data['category'] = Category::All();
            $data['subCategory'] = SubCategory::All();
        }
        return $data;
    }
    public function index()
    {

        $data = $this->getLang();
        $data['products'] = Products::with( 'ProductName', 'AverangeStars')->take(12)->get();
        $data['new'] = Products::with( 'ProductName', 'AverangeStars')->where('status', '1')->take(4)->get();
        $data['sale'] = Products::with( 'ProductName', 'AverangeStars')->where('status', "3")->take(4)->get();
        $data['best'] = Products::with( 'ProductName', 'AverangeStars')->where('status', '2')->take(4)->get();
        $data['saleTeg'] = Products::with( 'ProductName', 'AverangeStars')->where('status', '3')->take(4)->get();
        $data['companies'] = Companies::take(11)->get();
        $data['home'] = true;

        return view('index',$data);
    }

    public function category(Request $request){

        $data = $this->getLang();
        $categoriId = $request['category'];
        $subCategoryId = $request['subCategory'];

        $lang = Session::get('applocale');
        if($lang == 'am'){

            if($subCategoryId) {
                $data['products'] = Products::with( 'ProductName','CategoryProductAm','SubCategoryProductAm', 'AverangeStars')->where('sub_category_id', $subCategoryId )->paginate(16);;
            }else {
                $data['products'] = Products::with( 'ProductName','CategoryProductAm', 'AverangeStars')->where('category_id', $categoriId)->paginate(16);
            }

        }else if($lang == 'ru') {

            if($subCategoryId) {
                $data['products'] = Products::with( 'ProductName','CategoryProductRu','SubCategoryProductRu', 'AverangeStars')->where('sub_category_id', $subCategoryId )->paginate(16);;
            }else {
                $data['products'] = Products::with( 'ProductName','CategoryProductRu', 'AverangeStars')->where('category_id', $categoriId)->paginate(16);;
            }

        }else if($lang == 'en') {
            if($subCategoryId) {
                $data['products'] = Products::with( 'ProductName','CategoryProduct','SubCategoryProduct', 'AverangeStars')->where('sub_category_id', $subCategoryId )->paginate(16);;
            }else {
                 $data['products'] = Products::with( 'ProductName','CategoryProduct', 'AverangeStars')->where('category_id', $categoriId)->paginate(16);;
            }
        }
        if($lang == 'am'){
            if($subCategoryId) {
                $data['subCategory_name'] = SubCategoryAm::find($subCategoryId)->name;
            }
            $data['category_name'] = CategoryAm::find($categoriId)->name;

        }else if($lang == 'ru') {
            if($subCategoryId) {
                $data['subCategory_name'] = SubCategoryRu::find($subCategoryId)->name;
            }
            $data['category_name'] = CategoryRu::find($categoriId)->name;

        }else if($lang == 'en') {
            if($subCategoryId) {
                $data['subCategory_name'] = SubCategory::find($subCategoryId)->name;

            }
            $data['category_name'] = Category::find($categoriId)->name;
        }

        return view('shop.shop', $data);
    }


    public function product_detieils($id)
    {
        $product = Products::with('SubCategoryProduct','CategoryProduct', 'AverangeStars')->where('id', $id)->first();
        $featureds = Products::where('status','3')->OrderBy('id','desc')->get();
        $bests = Products::where('status','5')->OrderBy('id','desc')->get();

        return view('shop.product-details', compact('product','featureds','bests'));
    }

    public function companyByName(Request $request) {
        $data = $this->getLang();
        $companyName =  $request->name;

        $data['company'] = Companies::where('name', $companyName)->first();
        $data['products'] = Products::with('ProductName', 'AverangeStars')->where(['user_id' => $data['company']->user_id])->paginate(12);
        return view('shop.companie',$data);
    }

}
