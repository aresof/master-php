<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function config(){
        return view('user.config');
    }

    public function update(Request $request){

        //Obtener usuario identificado
        $user = Auth::user();
        $id = $user->id;

        //Validación del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);

        //Recoger datos introducidos en formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //Asignar nuevos valores al objeto usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //Imagen
        $image = $request->file('image_path');
        if($image){
            //Poner nombre único
            $image_name = time().'_'.$image->getClientOriginalName();

            //Guardar en carpeta disco virtual
            Storage::disk('users')->put($image_name, File::get($image));

            //Update nombre imagen usuario
            $user->image = $image_name;
        }

        $user->update();

        //Redirección
        return redirect()->route('config')
                         ->with(['message'=>'Usuario actualizado correctamente']);



    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }
}
