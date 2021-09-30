<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OtpPassword;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function postForgetPassword(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required',
            'captcha' => 'required|captcha'
        ]);
        $rand = rand(11111,99999);

//        return 'yes';
        $oldOtpPassword = OtpPassword::query()
            ->where('mobile',$request->get('mobile'))
            ->whereBetween('created_at', [now()->subMinutes(3), now()])
            ->get();

        if (count($oldOtpPassword)>0){
            return back()->with('warning','تعداد درخواست کد تایید رمز عبور بیش از حد مجاز میباشد . لطفا 3 دقیقه دیگر دوباره تلاش کنید');
        }


        $result = Smsirlaravel::ultraFastSend(['forgetCode'=>$rand],47968,$request->get('mobile'));


        if ($result['IsSuccessful'] == false){
            return response()->json([
                'status'=> 'failed' ,
                'status_code' => 1008 ,
                'msg'=>'خطا در ارسال پیام'
            ]);
        }
        $otpPassword = new OtpPassword();
        $otpPassword ->mobile = $request->get('mobile');
        $otpPassword ->code = $rand;
        $otpPassword ->save();

        return redirect('/auth/verifyForgetCode?mobile='.$request->get('mobile'))
            ->with('success','کد تایید فراموشی رمز عبور با موفقیت ارسال گردید');
//        return response()->json([
//            'status'=> 'ok' ,
//            'status_code' => 1000 ,
//            'mobile'=>$request->get('mobile') ,
//            'msg'=>$result ?? ''
//        ]);
    }

    public function showVerifyForgetCodePage(Request $request)
    {
        $mobile = $request->get('mobile') ?? '09125608501';
        return view('login.forget_password',compact('mobile'));
    }

    public function postVerifyForgetCode(Request $request)
    {
        $this->validate($request, [
            'mobile'=> 'required|numeric',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        $mobile = $request->get('mobile') ;
        $verifyCode = $request->get('verify_code') ;
        $password = $request->get('password') ;

        $otpPassword = OtpPassword::query()
            ->where('mobile',$mobile)
            ->where('code',$verifyCode)
            ->whereBetween('created_at', [now()->subMinutes(3), now()])
            ->first();

        if ($otpPassword){
            $user = \App\Admin::query()
                ->where('mobile',$mobile)
                ->firstOrFail();
            $user->password = md5(md5($password));
            $user->save();
            return redirect('/auth/login')->with('success','رمز عبور با موفقیت ویرایش گردید');
//            return response()->json([
//                'status'=>'ok',
//                'status_code' => '1000',
//                'msg' => 'با موفقیت ثبت گردید'
//            ],200);
        }else{
            return back()->with('error','کد وارد شده صحیح نمیباشد یا منقضی گردیده');
//            return response()->json([
//                'status'=>'failed',
//                'status_code' => '1005',
//                'msd'=>'کد یافت نشد'
//            ],200);
        }

    }
}
