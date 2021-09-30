<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{



    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function users(Request $request)
    {
        $users = Admin::query();

        $users =  $users->orderBy('id','desc')
            ->get() ;

        $active_users = Admin::query()->where('active', 1)->count();
        $deactivated_users = 0;
        $supervisor_users = Admin::query()->count();
        $logged_users = Admin::query()->where('last_login', '>=', date('Y-m-d'))->count();
        return view('dashboard.admin.admins',compact('users', 'active_users', 'deactivated_users', 'supervisor_users', 'logged_users')) ;
    }



    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createUser(Request $request)
    {

        $operator = auth()->user();
//        return $permissions ;
        return view('dashboard.admin.admin',compact( 'operator')) ;
    }


    /**
     * @param Request $request
     * @return Admin
     */
    public function storeUser(Request $request)
    {
        $request->validate([
//            'full_name' => 'nullable|string' ,
            'first_name' => 'nullable|string' ,
            'last_name' => 'nullable|string' ,
            'email' => 'nullable|email' ,
            'national_id' => 'nullable|numeric' ,
            'mobile' => 'nullable|numeric' ,
            'phone' => 'nullable|numeric' ,
            'avatar' => 'nullable' ,
            'address' => 'nullable|string' ,
            'active' => 'nullable|numeric' ,
            'status' => 'nullable|numeric' ,
//            'last_login' => 'nullable' ,
            'password' => 'required' ,
            'birth_data' => 'nullable|date' ,
        ]) ;
        $mobile = $request['mobile'];
        $check_user = Admin::query()->where('mobile', $mobile)->first();
        if( isset($check_user) ){
            return back()->with(['fail' => 'شماره موبایل قبلا ثبت شده است'])->withInput($request->all());
        }
        if( $request['password'] != $request['password_confirmation'] )
            return back()->withInput($request->all())->with(['fail' => 'رمز عبور منطبق نیست!']);
        $permission_ids = (isset($request['permission_ids']))?explode(',', $request['permission_ids']):array();
        $status = $request->get('status');
        $date = date('Y-m-d');
        if( $status == 3 ){
            $day_logged = 3;
            $system_config = DB::table('system_config')->where('key', 'access_login')->first();
            if( isset($system_config) )
                $day_logged = $system_config->value;
            $date_logged = date('Y-m-d', strtotime($date. " + $day_logged days"));
        }
        $fullName = $request->get('first_name') . ' ' . $request->get('last_name') ;
        $user = new Admin() ;
        $user->active = $status ;
        $user->active_date = $date_logged ?? date('Y-m-d') ;
        $user->full_name = $fullName ?? '' ;
        $user->first_name = $request->get('first_name') ?? '' ;
        $user->last_name = $request->get('last_name') ?? '' ;
        $user->email = $request->get('email') ?? '' ;
        $user->national_id = $request->get('national_id') ?? '' ;
        $user->mobile = $request->get('mobile') ?? '' ;
        $user->phone = $request->get('phone') ?? '' ;
        $user->avatar = $request->get('avatar') ?? '' ;
        $user->address = $request->get('address') ?? '' ;
        $user->status = $status;
        $user->password = md5(md5($request->get('password'))) ?? '' ;
        $user->birth_data = $request->get('birth_data') ?? '' ;
        $user->remember_token = randomString(50) ;
        $user->save() ;

        if ($request->has('avatar')){
            $fileName = 'avatar_' .  time().'.'.$request->avatar->extension();
            $request->file('avatar')->move('uploads/img/user', $fileName);

            $user->avatar = '/uploads/img/user/' . $fileName ;
            $user->save() ;
        }


        return redirect(route('admins'))->with('success' , 'کاربر با موفقیت ثبت گردید');
    }



    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUser(Request $request,$id)
    {


        $user = Admin::query()
            ->find($id) ;


        $operator = auth()->user();
        return view('dashboard.admin.edit_admin',compact('user', 'operator'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function updateUser(Request $request,$id)
    {

        $request->validate([
//            'full_name' => 'required|string' ,
            'email' => 'nullable|email' ,
            'national_id' => 'nullable|numeric' ,
            'mobile' => 'required|digits:11' ,
//            'phone' => 'required|numeric' ,
//            'avatar' => 'nullable|string' ,
            'address' => 'nullable|string' ,
            'active' => 'nullable|numeric' ,
            'status' => 'nullable|numeric' ,
//            'last_login' => 'nullable' ,
            'password' => 'nullable' ,
            'birth_data' => 'nullable' ,
        ]) ;


        $mobile = $request['mobile'];
        $check_user = Admin::query()->where('mobile', $mobile)->where('id', '!=', $id)->first();
        if( isset($check_user) ){
            return back()->with(['fail' => 'شماره موبایل قبلا ثبت شده است'])->withInput($request->all());
        }
        $user = Admin::query()
            ->find($id) ;

        if (!$user){
            return back()->with('failed',__('user not found')) ;
        }
        $status = $request->get('status');
        $date = date('Y-m-d');
        if( $status == 3 ){
            $day_logged = 3;
            $system_config = DB::table('system_config')->where('key', 'access_login')->first();
            if( isset($system_config) )
                $day_logged = $system_config->value;
            $date_logged = date('Y-m-d', strtotime($date. " + $day_logged days"));
        }
        $permission_ids = (isset($request['permission_ids']))?explode(',', $request['permission_ids']):array();
        $fullName = $request->get('first_name') . ' ' . $request->get('last_name') ;
        $user->active_date = $date_logged ?? $user->active_date ;
        $user->full_name = $fullName;
        $user->first_name = $request->get('first_name') ?? $user->first_name ;
        $user->last_name = $request->get('last_name') ?? $user->last_name ;
        $user->email = $request->get('email') ?? $user->email ;
        $user->national_id = $request->get('national_id') ?? $user->national_id ;
        $user->mobile = $request->get('mobile') ?? $user->mobile ;
        $user->phone = $request->get('phone') ?? $user->phone ;
        $user->status = $status;
        $user->active = $status;

        $user->address = $request->get('address') ?? '' ;

        if( $request->get('birth_data') != '')
            $user->birth_data = $request->get('birth_data') ;

        $user->save() ;


        if ($request->has('avatar')){
            $fileName = 'avatar_' .  time().'.'.$request->avatar->extension();
            $request->file('avatar')->move('uploads/img/user', $fileName);

            $user->avatar = '/uploads/img/user/' . $fileName ;
            $user->save() ;
        }

        return redirect()->route('admins')->with(['success' => 'ویرایش شد']);
    }


    public function deleteUser(Request $request,$id)
    {
        $user = Admin::query()
            ->where('id',$id)
            ->delete() ;

        return redirect('/admins')->with('success', 'کاربر با موفقیت حذف گردید') ;
    }


}
