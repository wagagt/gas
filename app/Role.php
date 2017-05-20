<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ultraware\Roles\Models\Role as RoleModel;

class Role extends RoleModel
{


    public static $rules = [
        'name'               => 'min:5|required|unique',
        'slug'                 => 'required',
        'description'       => 'required',
        'level'                => 'required'
    ];



    public function scopeRole($query, $role){
        if(trim($role) != ''){
            $query->Where('name','LIKE', "%$role%")
                ->orWhere('slug', 'LIKE', "%$role%")
                ->orWhere('description', 'LIKE', "%$role%")
                ->orWhere('level', 'LIKE', "%$role%");
        }
    }

}
