<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\User;
use Auth;

class ClientController extends Controller
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
  public function info() {
     // $userId = Auth::user()->id;
     // $companyInfo = Companies::where('user_id', $userId)->first();
      $data['newOrder'] = $this->Orders();
      $data['page'] = 'newCompany';
      return view('admin.client.info',$data);
  }
   public function addCompany(Request $request) {
      if($request->file('logo')) {
          $image = $request->file('logo');
          $filename = time() . '.jpg';
          $image->move(public_path().'/img/companies/', $filename);

      }
       $this->validate($request, [
           'firstName' => 'required|string|max:55',
           'lastName' => 'required|string|max:55',
           'name' => 'required|string|max:55',
           'email' => 'required|string|email|max:255|unique:users',
           'phone' => 'required|numeric',
           'password' => 'required|string|min:6|confirmed',
           'role' => 'required',
       ]);

       $user = new User();
       $user->name = $request->firstName;
       $user->surname = $request->lastName;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->role = $request->role;
       $user->password = bcrypt($request->password);
       $user->confirmed = 1;
       $user->save();
       $companies = new Companies();
       $companies->id = $user->id;
       $companies->name = $request->name;
       $companies->logo = $filename;
       $companies->user_id =  $user->id ;
       $companies->save();
       return redirect()->route('adminInfo');
   }
}
