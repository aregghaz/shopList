<?php

namespace App\Http\Controllers;

use App\Models\AverangeStars;
use App\Models\Category;
use App\Models\CategoryAm;
use App\Models\CategoryRu;
use App\Models\Orders;
use App\Models\PreOrder;
use App\Models\ProductName;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\SubCategoryAm;
use App\Models\SubCategoryRu;
use App\Models\User;
//use App\Notifications\InvoicePaid;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Socialite;
use Validator;
use App\Models\Products;

class UserController extends Controller
{
    public function __construct()
    {
        Session::has('applocale') ?: Session::put('applocale', 'am');
    }

    public function Orders() {
        $user = Auth::User();

        if ($user->role == 'admin') {
            $data = Orders::with('Address')->where('status', 'Pending')->get();
        }else{
            $data = Orders::with('Address')->where(['company_id' => $user->id, 'status'=> 'Pending'])->get();

        }
        return $data;
    }
    public function sign()
    {
        $data['newUser'] = false;
        $data['blockUser'] = false;
        return view('user.login-registration', $data);
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

    public function account(Request $request)
    {
        $data = $this->getLang();

        $data['user'] = Auth::User();
        return view('user.my-account', $data);
    }



    public function signUp(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|string|max:55',
//            'surname' => 'required|string|max:55',
//            'email' => 'required|string|email|max:255|unique:users',
//            'phone' => 'required|numeric',
//            'password' => 'required|string|min:6|confirmed',
//        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $typeUser = 'newUser';
//        \Notification::send($user, new InvoicePaid($user, $typeUser));
        Auth::login($user);
        $data['newUser'] = true;
        $data['userName'] = $request['name'];
        $data['userId'] = $user->id;
        $data['blockUser'] = false;
        return view('user.login-registration', $data);
    }

    public function signIn(Request $request):RedirectResponse
    {

        $request->session()->forget('cart');
        $data = [];
        $totalQty = 0;
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $preorder = PreOrder::where(['user_id' =>Auth::user()->id])->get();
            for ($i =0 ; $i<count($preorder); $i++){
                $data[$i]['product'] = Products::find($preorder[$i]->product_id);
                $data[$i]['productName'] = ProductName::find($preorder[$i]->product_id);
                $data[$i]['size'] = $preorder[$i]->size;
                $data[$i]['color'] = $preorder[$i]->color;
                $data[$i]['count'] = $preorder[$i]->count;
                $data[$i]['product_id'] = $preorder[$i]->product_id;
                $totalQty =$i;
            }
            $request->session()->put('cart', $data);
            $request->session()->put('result', $totalQty);
            if (Auth::user()->confirmed == 0) {
                Auth::logout();
                return redirect()->back()->with("message", "Plz confirm your email");
            }
            return redirect('/my-account');
        }
        return redirect()->back();
    }

    public function updateuser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:20',
            'surname' => 'required|string|max:30',
            'phone' => 'required|max:20',
            'country' => 'required|string|max:25',
            'address' => 'required|string|max:100',
            'post_code' => 'required'
        ]);
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->phone = $request['phone'];
        $user->country = $request['country'];
        $user->city = $request['city'];
        $user->address = $request['address'];
        $user->post_code = $request['post_code'];
        $user->state = $request['state'];
        $user->update();
        return redirect()->back()->with("message", "Thank you for updating : Updating has been successful");
    }


    public function admin_edit_user(Request $request)
    {
        $user_id = $request['user_id'];
        $user = User::find($user_id);
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->phone = $request['phone'];
        $user->country = $request['country'];
        $user->city = $request['city'];
        $user->address = $request['address'];
        $user->post_code = $request['post_code'];
        $user->role = $request['role'];
        $user->state = $request['state'];
        $user->save();
        return redirect()->back()->with("notification", "Successfully edited");

    }

    public function about()
    {
        $data = $this->getLang();
        $data['about'] = true;
        return view('shop.about', $data);
    }

    public function contact(Request $request)
    {

        if ($_POST) {
            $data['name'] = $request->name;
            $data['lastName'] = $request->lastName;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['message'] = $request->message;
            $typeUser = 'contact';

            \Notification::send(User::find(1), new InvoicePaid($data, $typeUser));
            $data['contact'] = true;
            $data = $this->getLang();
            return response()->json('success');
        } else {
            $data = $this->getLang();
            $data['contact'] = true;
            return view('shop.contact', $data);
        }

    }

    public function deluser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('cart');
        return redirect()->back();
    }

    public function verification(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->confirmed = 1;
        $user->update();
        Auth::login($user);
        return redirect()->route('home');
    }

    public function addReview(Request $request)
    {
        $user_id = Auth::user()->id;
        $review = new Review();
        $review->review = $request->comment;
        $review->full_name = $request->name;
        $review->stars = $request->countStars;
        $review->product_id = $request->id;
        $review->save();
        $orders = Orders::where(['user_id' => $user_id, 'product_id' => $request->id, 'status' => 'Delivered'])->first();
        $orders->status = 'Complete';
        $orders->update();
        $averangeStars = AverangeStars::where('product_id', $request->id)->first();
        if (empty($averangeStars)) {
            $averangeStars = new AverangeStars();
            $averangeStars->product_id = $request->id;
            $averangeStars->count = 1;
            $averangeStars->rate = $request->countStars;
            $averangeStars->save();
        } else {
            $averangeStars->product_id = $request->id;
            $averangeStars->count = $averangeStars->count + 1;
            $averangeStars->rate = round(($request->countStars + $averangeStars->rate) / $averangeStars->count);
            $averangeStars->update();

        }
        return redirect()->back();
    }

    public function searchProduct(Request $request)
    {
        $searchWord = $request->searchWord;
        //$categoryId =$request->categoryId;
        $data = $this->getLang();
        $data['products'] = ProductName::with('Product', 'AverangeStars')->where('nameEn', 'like', '%' . $searchWord . '%')
            ->OrWhere('nameRu', 'like', '%' . $searchWord . '%')
            ->OrWhere('nameAm', 'like', '%' . $searchWord . '%')
            ->OrWhere('descriptionAm', 'like', '%' . $searchWord . '%')
            ->OrWhere('descriptionRu', 'like', '%' . $searchWord . '%')
            ->OrWhere('descriptionEn', 'like', '%' . $searchWord . '%')->paginate(16);
        return view('shop.search', $data);
    }

    public function resendEmail(Request $request)
    {

        $id = $request->id;
        $user = User::find($id);
        $typeUser = 'newUser';
        if ($request->session()->exists($id)) {
            $getCountOfResend = $request->session()->get($id);
            if ((int)$getCountOfResend < 5) {
                \Notification::send($user, new InvoicePaid($user, $typeUser));
                $data['newUser'] = true;
                $data['userId'] = $user->id;
                $data['blockUser'] = false;
                $data['userName'] = $user->name;
                $request->session()->put($id, ((int)$getCountOfResend + 1));
            } else {
                $data['newUser'] = false;
                $data['blockUser'] = true;
                $data['userName'] = $user->name;
            }
        } else {
            $data['newUser'] = true;
            $data['userId'] = $user->id;
            $data['userName'] = $user->name;
            $data['blockUser'] = false;
            \Notification::send($user, new InvoicePaid($user, $typeUser));
            $request->session()->put($id, 1);
        }

        return view('user.login-registration', $data);
    }

    public function resetPassword(Request $request)
    {
        $email = $request->login_email;

        if ($_GET) {
            $user = User::find($_GET['id']);
        } else {
            $user = User::where(['email' => $email])->first();
        }
        $typeUser = 'reset';
        if ($request->session()->exists($user->id)) {
            $getCountOfResend = $request->session()->get($user->id);
            if ((int)$getCountOfResend < 5) {
                \Notification::send($user, new InvoicePaid($user, $typeUser));
                $data['newUser'] = true;
                $data['userId'] = $user->id;
                $data['blockUser'] = false;
                $data['userName'] = $user->name;
                $request->session()->put($user->id, ((int)$getCountOfResend + 1));
            } else {
                $data['newUser'] = false;
                $data['blockUser'] = true;
                $data['userName'] = $user->name;
            }
        } else {
            $data['newUser'] = true;
            $data['userId'] = $user->id;
            $data['userName'] = $user->name;
            $data['blockUser'] = false;
            \Notification::send($user, new InvoicePaid($user, $typeUser));
            $request->session()->put($user->id, 1);
        }

        $data['noIndex'] = true;
        $data['changePassword'] = false;
        return view('user.forgotPassword', $data);
    }

    public function restorePassword(Request $request)
    {
        if ($_GET) {
            $id = $request->id;
            $token = $request->token;
            $user = User::where(['id' => $id, 'email_verified' => $token])->first();
            $data['user'] = $user;
            $data['id'] = $id;
            $data['newUser'] = false;
            $data['blockUser'] = false;
            $data['noIndex'] = true;
            $data['changePassword'] = true;
            if (count($user) == 1) {
                return view('user.forgotPassword', $data);
            }
        } else if ($_POST) {
            $id = $request['userId'];
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user = User::find($id);
            $user->password = bcrypt($request->password);
            $user->email_verified = null;
            $user->update();
            return redirect()->route('home');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();


            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/sign');
        }
        // only allow people with @company.com to login
        if (explode("@", $user->email)[1] !== 'company.com') {
            return redirect()->to('/');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            //   $newUser->avatar          = $user->avatar;
            //    $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/home');
    }
}
