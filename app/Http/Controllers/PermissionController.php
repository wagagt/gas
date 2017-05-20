<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Laracasts\Flash\Flash;


class PermissionController extends Controller
{

    public function index(Request $request)
    {
        $permissions = Permission::Permiso($request->get('permiso'))->orderBy('id', 'ASC')->paginate(10);
        return view('permission.index')->with('permissions', $permissions);

    }


    public function create()
    {

    }


    public function store(Request $request)
    {

        $mySlug = $this->convertWord($request->name);
        //dd($mySlug);
        $permission = new Permission($request->all());
        $permission->slug = $mySlug;
        $permission->save();

        Flash::success('Permiso creado exitosamente!!!');
        return redirect()->route('permissions.index');
    }


    public function show($id)
    {
         $permission = Permission::findOrfail($id);
         return view('permission.show')->with('permission', $permission);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $permission = Permission::findOrfail($id);
        $permission->fill($request->all());
        $permission->update();

        Flash::success("Permiso: <b>{{$permission->name}}</b> ha sido actualizado exitosamente!!");
        return redirect()->route('permissions.index');
    }


    public function destroy($id)
    {
        $permission = Permission::findOrfail($id);

        if(empty($permission)) {
            Flash::error('No existe el permiso que desea eliminar');
            return redircet()->route('permissions.index');
        }else{
            $permission->delete();
            Flash::success('Permiso eliminado permanentemente de la base de datos');
            return redirct(route('permissions.index'));
        }

    }





    // Functions Convert slug the word before save the first time

    protected function convertWord($toConvert){
        $convertWordName = explode(" ",$toConvert);

        $word = $convertWordName[0];
        $wordComplement = $convertWordName[1];

        $newComplementWord = $this->quitar_tildes($wordComplement);

        if(strtolower($word) == 'crear'){
            $slug = strtolower($newComplementWord).'.create';
            return $slug;
        }elseif(strtolower($word) == 'editar'){
            $slug = strtolower($newComplementWord).'.edit';
            return $slug;
        }elseif(strtolower($word) == 'ver'){
            $slug = strtolower($newComplementWord).'.show';
            return $slug;
        }elseif(strtolower($word) == 'eliminar'){
            $slug = strtolower($newComplementWord).'.delete';
            return $slug;
        }
    }


    protected function quitar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À",
                                    "Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U",
                            "a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }



}
