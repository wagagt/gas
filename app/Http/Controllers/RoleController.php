<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Laracasts\Flash\Flash;
use App\Permission;

class RoleController extends Controller
{

    public function index(Request $request)
    {
        $roles = Role::Role($request->get('role'))->orderBy('id', 'ASC')->paginate(10);
        $permissions = Permission::orderBy('id', 'ASC')->pluck('name', 'id');
        return view('role.index')
               ->with('roles', $roles)
               ->with('permisos', $permissions);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $role = new Role($request->all());
        $role->save();

        foreach($request->permisos_id as $permiso){
            $role->attachPermission($permiso);
        }

        Flash::success('Role creado exitosamente!!!');
        return redirect()->route('roles.index');

    }


    public function show($id)
    {
        $role = Role::findOrfail($id);
        $permisos = Permission::orderBy('name', 'ASC')->pluck('name', 'id');

        // Obtengo los permisos asignados al Role
        $getPermissions = $role->Permissions()->pluck('permission_id')->ToArray();
        return view('role.show')
               ->with('role', $role)
               ->with('permisos', $permisos)
               ->with('getPermissions', $getPermissions);
    }


    public function edit($id)
    {
        $role = Role::findOrfail($id);
        $permissions = Permission::orderBy('name', 'ASC')->pluck('name', 'id');
        $getPermission = $role->Permissions()->pluck('permission_id')->ToArray();

        return view('role.edit')
               ->with('role', $role)
               ->with('permisos', $permissions)
               ->with('getPermission', $getPermission);

    }


    public function update(Request $request, $id)
    {
        $role = Role::findOrfail($id);
        $role->fill($request->all());
        $role->update();
        $role->detachAllPermissions();

        foreach($request->permisos_id as $permiso){
            $role->attachPermission($permiso);
        }

        Flash::success("Rol: <b> $role->name </b> ha sido actualizado exitosamente!!");
        return redirect()->route('roles.index');
    }


    public function destroy($id)
    {
        $role = Role::findOrfail($id);

        if(empty($role)) {
            Flash::error('No existe el rol que desea eliminar');
            return redircet()->route('roles.index');
        }else{
            $role->delete();
            Flash::success('Rol eliminado permanentemente de la base de datos');
            return redirct(route('roles.index'));
        }
    }
}
