<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function profile(Request $request)
    {
        $user = Auth::user();
        return $user ?? '-----';
        return view('dashboard.profile.profile',compact('user'));
    }


    public function updateProfile(Request $request)
    {
//        return $request->all();

        $request->validate([
            'first_name' => 'required|string' ,
            'last_name' => 'required|string' ,
            'email' => 'nullable|email' ,
//            'national_id' => 'nullable|numeric' ,
            'gender' => 'nullable|numeric' ,
//            'mobile' => 'required|numeric' ,
//            'phone' => 'nullable|numeric' ,
//            'avatar' => 'required|mimes:jpg,jpeg,gif,png'
        ]) ;

        $user = Auth::user() ;

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->gender = $request->get('gender');
        $user->email = $request->get('email');
//        $user->mobile = $request->get('mobile');
//        $user->phone = $request->get('phone');

        if ($request->has('avatar')){
            $fileName = 'avatar_'.$user->id.'_icon_'.time().'.'.$request->avatar->extension() ;
            $request->file('avatar')->move('uploads/img/avatar', $fileName) ;
            $user->avatar = '/uploads/img/avatar/' . $fileName;
        }
        $user->save() ;

        session()->put(['operator' => $user]);
        return redirect('/home')->with('success','حساب کاربری شما با موفقیت ویرایش گردید');
    }


    public function adminProfile(Request $request)
    {

        $user = Auth::user();

        return view('dashboard.profile.user_profile',compact('user'));
    }


    public function updateAdminProfile(Request $request)
    {

    }


}
