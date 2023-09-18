<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Statistic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use File;
class AdminController extends Controller
{
    /**
     * @return Orders[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function Orders() {
        $user = Auth::User();

        if ($user->role == 'admin') {
            $data = Orders::with('Address')->where('status', 'Pending')->get();
        }else{
            $data = Orders::with('Address')->where(['company_id' => $user->id, 'status'=> 'Pending'])->get();

        }
        return $data;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $user = Auth::User();

        if ($user->role == 'admin') {

            $orders = Orders::all();
            $data['ordersSumMount'] = Orders::where('created_at', '>=', Carbon::now()->startOfMonth())->sum('amount');
            $data['ordersMount'] = Orders::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
            $data['ordersCount'] = $orders->count();
            $data['ordersSum'] = $orders->sum('amount');
            $data['products'] = Statistic::with('Product', 'ProductName')->get();
            for ($i = 1; $i <= 12; $i++) {
                $data['statisticSum'][$i] = Statistic::whereRaw('MONTH(created_at) = ?', $i)
                    ->sum('count');
                $data['sumOrders'][$i] = Orders::whereRaw('MONTH(created_at) = ?', $i)
                    ->sum('amount');
            }

            $data['allView'] = Statistic::sum('count');

        } else if ($user->role == 'client') {
            $orders = Orders::where('company_id', $user->id)->get();
            $data['ordersSumMount'] = Orders::where(['company_id' => $user->id])->whereDate('created_at', '>=', Carbon::now()->startOfMonth())->sum('amount');
            $data['ordersMount'] = Orders::where(['company_id' => $user->id])->whereDate('created_at', '>=', Carbon::now()->startOfMonth())->count();
            $data['ordersCount'] = $orders->count();
            $data['ordersSum'] = $orders->sum('amount');
            $data['products'] = Statistic::with('Product', 'ProductName')->where('company_id', $user->id)->get();
            for ($i = 1; $i <= 12; $i++) {
                $data['statisticSum'][$i] = Statistic::where('company_id', $user->id)->whereRaw('MONTH(created_at) = ?', $i)
                    ->sum('count');
                $data['sumOrders'][$i] = Orders::where('company_id', $user->id)->whereRaw('MONTH(created_at) = ?', $i)
                    ->sum('amount');
            }
            $data['allView'] = Statistic::where('company_id', $user->id)->sum('count');
        }

        $data['newOrder'] = $this->Orders();
        $data['page'] = 'dashboard';
        return view('admin.dashboard', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {

        $userId = Auth::user();
        if ($userId->role == 'admin') {

            $data['companies'] = Companies::where('user_id', $userId->id)->first();
            $data['products'] = Products::count();
        } else {

            $data['products'] = Products::where(['user_id' => $userId->id])->count();
            $data['companies'] = Companies::where('user_id', $userId->id)->first();
        }
        $data['newOrder'] = $this->Orders();
        $data['active'] = false;
        $data['page'] = 'profile';
        return view('admin.profile', $data);
    }

    public function conversation()
    {
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'conversation';
        return view('admin.conversation',$data);
    }

    public function adminOrders()
    {
        $user = Auth::User();
        if ($user->role == 'admin') {
            $data['orders'] = Orders::with('Product', 'Address', 'ProductsName')->orderBy('created_at', 'desc')->get();
        } else {
            $data['orders'] = Orders::with('Product', 'Address', 'ProductsName')->where('company_id', $user->id)->orderBy('created_at', 'desc')->get();

        }
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'orders';
        return view('admin.orders', $data);
    }

    public function changeStatus(Request $request)
    {
        $status = $request->status;
        $id = $request->id;

        $data['orders'] = Orders::with('Product', 'Address', 'ProductsName')->where('id', $id)->update(['status'=> $status]);

    }

    public function updateUserFromAdmin(Request $request)
    {
            $id = $request->id;
            $user = User::find($id)->first();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->phone = $request->phone;
            $user->update();
            return redirect()->back();
    }
    public function updateUserFromAdminLogo(Request $request)
    {
        $id = $request['id'];
        $companies = Companies::find($id);
        if($request->file('logo')) {
            File::delete(public_path('img/companies/'. $companies->logo));
            $image = $request->file('logo');
            $filename = time() . '.jpg';
            $image->move(public_path().'/img/companies/', $filename);
            $companies->logo = $filename;
            $companies->update();
        }

        return redirect()->back();
    }
    public function updateUserFromAdminSlider(Request $request)
    {
        $id = $request['id'];
        $companies = Companies::find($id);
        if($request->file('img1')) {
            File::delete(public_path('img/slider/'. $companies->img1));
            $image = $request->file('img1');
            $filename = time() +1 . '.jpg';
            $image->move(public_path().'/img/slider/', $filename);
            $companies->img1 = $filename;

        }if($request->file('img2')) {
            File::delete(public_path('img/slider/'. $companies->img2));
            $image = $request->file('img2');
            $filename = time() +2 . '.jpg';
            $image->move(public_path().'/img/slider/', $filename);
            $companies->img2 = $filename;

        }if($request->file('img3')) {
            File::delete(public_path('img/slider/'. $companies->img3));
            $image = $request->file('img3');
            $filename = time() +3 . '.jpg';
            $image->move(public_path().'/img/slider/', $filename);
            $companies->img3 = $filename;

        }
        $companies->update();
        return redirect()->back();
    }
    public function updatePasswordFromAdmin(Request $request) {

        $id = $request->id;
        $user = User::find($id);
        if(Hash::check($request->oldPassword, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->update();
             return response()->json(true);
        }else {
            return response()->json(false);
        }

    }
    public  function notification(){
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'notification';
        return view('admin.notification',$data);
    }

    public function getUsers()
    {
        $data['users'] = User::all();
        $data['newOrder'] = $this->Orders();
        $data['page'] = 'users';
        return view('admin.users', $data);
    }
}
