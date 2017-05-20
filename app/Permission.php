<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ultraware\Roles\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{

    public static $rules = [
    'name'               => 'min:5|required|unique',
    'slug'                 => 'required',
    'description'       => 'required',
];



    public function scopePermiso($query, $permiso){
        if(trim($permiso) != ''){
            $query->Where('name','LIKE', "%$permiso%")
                ->orWhere('slug', 'LIKE', "%$permiso%")
                ->orWhere('description', 'LIKE', "%$permiso%")
                ->orWhere('model', 'LIKE', "%$permiso%");
        }
    }
}
