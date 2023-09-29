<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryRu;
use App\Models\SubCategoryAm;
use App\Models\CategoryAm;
use App\Models\CategoryRu;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function Orders() {
        $user = Auth::User();

        if ($user->role == 'admin') {
            $data = Orders::with('Address')->where('status', 'Pending')->get();
        }else{
            $data = Orders::with('Address')->where(['company_id' => $user->id, 'status'=> 'Pending'])->get();

        }
        return $data;
    }
    public function index()
    {
        $data['categories'] = Category::all();
        $data['categoriesAm'] = CategoryAm::all();
        $data['categoriesRu'] = CategoryRu::all();
        $data['relations'] = Category::with("SubCategory")->get();
        $data['relationsRu'] = CategoryRu::with("SubCategoryRu")->get();
        $data['relationsAm'] = CategoryAm::with("SubCategoryAm")->get();
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'categories';
       return view('admin.categories',$data);
    }

    public function add_category(Request $request)
    {

        $category = new Category();
        $category->name = $request['nameEn'];
        $category->icon = $request['icon'];
        $category->save();
        $categoryAm = new CategoryAm();
        $categoryAm->name = $request['nameAm'];
        $categoryAm->icon = $request['icon'];
        $categoryAm->save();
        $categoryRu = new CategoryRu();
        $categoryRu->name = $request['nameRu'];
        $categoryRu->icon = $request['icon'];
        $categoryRu->save();
        return redirect()->back();
    }
    public function edit_category(Request $request)
    {
        $category_id = $request['category_id'];
        $category = Category::find($category_id);
        $category->name = $request['nameEn'];
        $category->icon = $request['icon'];
        $category->save();
        $categoryRu = CategoryRu::find($category_id);
        $categoryRu->name = $request['nameRu'];
        $categoryRu->icon = $request['icon'];
        $categoryRu->save();
        $categoryAm = CategoryAm::find($category_id);
        $categoryAm->name = $request['nameAm'];
        $categoryAm->icon = $request['icon'];
        $categoryAm->save();

        return redirect()->back()->with("edit_category",'Edit successful !');
    }

    public function del_category($id)
    {
        $user = Category::with("SubCategory")->find($id);
        $categoryAm = CategoryAm::with("SubCategoryAm")->find($id);

        $CategoryRu = CategoryRu::with("SubCategoryRu")->find($id);
        foreach ($user->SubCategory as $sub){
            $del_sub_category = SubCategory::find($sub->id);
            $del_sub_category->delete();
        }
        foreach ($categoryAm->SubCategory as $sub){
            $del_sub_category = SubCategoryAm::find($sub->id);
            $del_sub_category->delete();
        }
        foreach ($CategoryRu->SubCategory as $sub){
            $del_sub_category = SubCategoryRu::find($sub->id);
            $del_sub_category->delete();
        }

        $user->delete();
        $categoryAm->delete();
        $CategoryRu->delete();

        return redirect()->back();
    }

    public function add_sub_category(Request $request)
    {

        $sub_category = new SubCategory();
        $sub_category->name = $request['nameEn'];
        $sub_category->category_id = $request['category_id'];
        $sub_category->save();
        $sub_categoryRu = new SubCategoryRu();
        $sub_categoryRu->name = $request['nameRu'];
        $sub_categoryRu->id = $sub_category->id;
        $sub_categoryRu->category_ru_id = $request['category_id'];
        $sub_categoryRu->save();
        $sub_categoryAm = new SubCategoryAm();
        $sub_categoryAm->id = $sub_category->id;
        $sub_categoryAm->name = $request['nameAm'];
        $sub_categoryAm->category_am_id = $request['category_id'];
        $sub_categoryAm->save();

        return redirect()->back()->with('subcategory', 'You add sub category successful !');
    }

    public function sub_edit_category(Request $request)
    {

        $subcategory_id = $request['sub_category_id'];
        $sub_category = SubCategory::find($subcategory_id);
        $sub_category->name = $request['name'];

        $sub_category->update();
        $sub_categoryRu = SubCategoryRu::find($subcategory_id);
        $sub_categoryRu->name = $request['nameRu'];

        $sub_categoryRu->update();
        $sub_categoryAm = SubCategoryAm::find($subcategory_id);
        $sub_categoryAm->name = $request['nameAm'];

        $sub_categoryAm->update();

        return redirect()->back()->with("subedir","Sub category editing successful");
    }

    public function sub_del_category($id)
    {
        $sub_category = SubCategory::find($id);
        $sub_categoryRu = SubCategoryRu::find($id);
        $sub_categoryAm = SubCategoryAm::find($id);
        $sub_category->delete();
        $sub_categoryRu->delete();
        $sub_categoryAm->delete();

        return redirect()->back();
    }
}
