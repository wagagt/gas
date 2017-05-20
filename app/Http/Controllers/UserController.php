<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;
use App\Role;
use Carbon\Carbon;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
    private $getRol = null;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        Carbon::setLocale('es');
    }

    public function index(Request $request)
    {

        $roles = Role::orderBy('name', 'ASC')->pluck('name', 'id');
        $users = User::User($request->get('user'))->orderBy('id', 'ASC')->paginate(10);

        return view('user.index')
            ->with('users', $users)
            ->with('roles', $roles);
    }


    public function create()
    {

        $roles = Role::orderBy('name', 'ASC')->pluck('name','id');

        return view('users.create')
            ->with('roles', $roles);
    }


    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->full_name = "$request->first_name $request->last_name $request->married_surname";
        $user->save();

        foreach($request->roles_id as $role){
            $user->attachRole($role);
        }

        Flash::success("Usuario $user->full_name ha sido creado exitosamente!!!.");

        return redirect(route('users.index'));
    }


    public function show($id)
    {
        $user = User::findOrfail($id);
        $roles      = Role::orderBy('name', 'ASC')->pluck('name', 'id');

        // Obtener todos los roles asignados al usuario
        $getRoles   = $user->getRoles()->pluck('id')->ToArray();

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('user.show')
               ->with('user', $user)
               ->with('roles', $roles)
               ->with('getRoles', $getRoles);
    }


    public function edit($id)
    {
        $user       = User::findOrfail($id);
        $roles      = Role::orderBy('name', 'ASC')->pluck('name', 'id');

        // Obtener todos los roles asignados al usuario
        $getRoles   = $user->getRoles()->pluck('id')->ToArray();

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        return view('user.edit')
               ->with('user', $user)
               ->with('roles', $roles)
               ->with('getRoles', $getRoles);
    }


    public function update($id, UpdateUserRequest $request)
    {
        $user = User::findOrfail($id);
        $user->fill($request->all());
        $user->full_name = "$request->first_name $request->last_name $request->married_surname";
        $user->update();

        // Detach Roles
        $user->detachAllRoles();

        // Reasignación
        foreach($request->roles_id as $role){
            $user->attachRole($role);
        }

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        //$user = $this->userRepository->update($request->all(), $id);

        Flash::success("El usuario $user->full_name se ha actualizado exitosamente!!!.");

        return redirect(route('users.index'));
    }


    public function destroy($id)
    {
        $user = User::findOrfail($id);

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        $user->delete();

        Flash::success("Usuario <b>[ $user->full_name ]</b> eliminado exitosamente!!!.");

        return redirect(route('users.index'));
    }
}
