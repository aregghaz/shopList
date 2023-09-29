<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryAm;
use App\Models\CategoryRu;
use App\Models\Companies;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\SubCategoryAm;
use App\Models\SubCategoryRu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
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

        return response()->json($data);
    }
}
