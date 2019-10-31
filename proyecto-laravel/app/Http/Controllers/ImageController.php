<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('image.create');
    }

    public function save(Request $request){

        //Validación
        $validate = $this->validate($request, [
            'description' => 'required',
            'image_path' => 'required|image' //mimes:jpg,jpeg
        ]);

        //Recoger datos form
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        //Asignar valores al objeto
        $user = \Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        $image->image_path = time().'_'.$image_path->getClientOriginalName();
        $image->description = $description;

        //Subir fichero
        if($image_path) {
            Storage::disk('images')->put($image->image_path, File::get($image_path));
        }

        $image->save();

        return redirect()->route('home')->with(['message' => 'La imagen ha sido guardada correctamente']);

    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file,200);
    }

    public function detail($id){
        $image = Image::find($id);

        return view('image.detail', ['image' => $image]);
    }

}
