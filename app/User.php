<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ultraware\Roles\Traits\HasRoleAndPermission;
use Ultraware\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Database\Eloquent\SoftDeletes;




class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use Notifiable, HasRoleAndPermission;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $dates =['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'user_name',
        'first_name' ,
        'last_name',
        'married_surname',
        'full_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if(!empty($value))
        {
            $this->attributes['password'] = \Hash::make($value);
        }
    }


    public function scopeUser($query, $user){
        if(trim($user) != ''){
            $query->Where('user_name','LIKE', "%$user%")
                ->orWhere('frist_name', 'LIKE', "%$user%")
                ->orWhere('last_name', 'LIKE', "%$user%")
                ->orWhere('full_name', 'LIKE', "%$user%")
                ->orWhere('email', 'LIKE', "%$user%");
        }
    }

}
