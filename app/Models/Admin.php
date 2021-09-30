<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use App\Permissions\HasPermissionsTrait;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use Notifiable ;

    protected $table = 'admins';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name' ,'first_name' , 'last_name' , 'active' , 'status' , 'email', 'email_verified_at', 'national_id' , 'mobile',
        'phone' , 'avatar' , 'address' , 'last_login' , 'password' , 'remember_token' , 'role_id' , 'birth_data' , 'description' ,
        'role_in_company' , 'establishment_address' , 'mandatory_hours' , 'licence_no' , 'licence_expired_date'
    ] ;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ] ;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ] ;




}
