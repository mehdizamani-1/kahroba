<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mews\Captcha\Facades\Captcha;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web')->except('logout');
    }


    public function login(Request $request)
    {
        return view('login.login');
    }



    public function postLogin(Request $request)
    {

        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
//            'captcha' => 'required|captcha'
            'captcha' => 'required|captcha'
        ]) ;


        $userName = $request->get('user_name');
//        $password = Hash::make($request->get('password')) ;
        $password = md5(md5($request->get('password'))) ;
//        $password = Hash::make($request->get('password')) ;


        $adminOperator = Admin::query()
            ->where('mobile', $userName)
            ->first() ;

        if (!isset($adminOperator)){
            return back()->with(['fail' => 'حساب وجود ندارد!!']);
        }

//        if ($adminOperator->active == 0){
//            return back()->with(['fail' => 'حساب شما غیر فعال میباشد']);
//        }

        if ($adminOperator->password != $password){
            return back()->with(['fail' => 'رمز ورود اشتباه میباشد']);
        }

        $date = date('Y-m-d');
        //check date
        if( $adminOperator->active == 3 ){
            if( strtotime($adminOperator->active_date) < strtotime($date) )
                return back()->with(['fail' => 'حساب منقضی شده است']);
        }else if( $adminOperator->active == 4 ){
            return back()->with(['fail' => 'حساب توسط مدیر کل معلق شده است']);
        }else if( $adminOperator->active == 2 || $adminOperator->active == 0 ){
            return back()->with(['fail' => 'حساب غیرفعال می باشد']);
        }
        auth()->guard('web')->login($adminOperator);


        $operator = Auth::user();
        $operator->last_login = date('Y-m-d H:i:s');
        $operator->update();
        Session::put('operator',$operator);
        session_start();
        $_SESSION['operator'] = $operator;

        return redirect(route('home'));

    }


    public function postForgetPassword(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);
    }



    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => Captcha::img()
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
