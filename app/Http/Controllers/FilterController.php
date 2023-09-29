<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryAm;
use App\Models\CategoryRu;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\SubCategoryAm;
use App\Models\SubCategoryRu;
use Illuminate\Http\Request;
use View;
use Session;
class FilterController extends Controller
{
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
    public function addFiltre(Request $request) {
        $to = $request->to;
        $from = $request->from;
        $cmd = $request->cmd;
        $data = [];
        if($cmd == 'serchByPrice') {
        }else {
            $data = $this->getLang();
        }
        if(isset($to) and isset($from)){
            $data['products'] = Products::with('ProductName', 'AverangeStars')->where('price' ,'>=', $from)->where('price', '<=', $to)->paginate(16);
        }else if(isset($to) and !isset($from)) {
            $data['products'] = Products::with('ProductName', 'AverangeStars')->where('price', '<=', $to)->paginate(16);
        }else if(!isset($to) and isset($from)) {
            $data['products'] = Products::with('ProductName', 'AverangeStars')->where('price' ,'>=', $from)->paginate(16);
        }
        if($cmd == 'serchByPrice') {
            return View::make("include/products" , $data);
        }else {
            $data['teg'] = 'allProduct';
            return view('shop.teg',$data);
        }

    }

}
