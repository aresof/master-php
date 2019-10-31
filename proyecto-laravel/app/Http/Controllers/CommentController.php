<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(Request $request){

        //Validación
        $validate = $this->validate($request, [
            'content' => 'required'
        ]);

        //Recogida datos
        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        //Guardar bd
        $comment->save();

        return redirect()->route('image.detail', ['id' => $image_id])->with(['message' => 'Comentario enviado correctamente']);
    }

    public function delete($id){

        //Datos usuario logeado
        $user = Auth::user();

        //Objeto a eliminar
        $comment = Comment::find($id);
        //Comprobar usuario es propietario del comentario o de la imagen
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
            $comment->delete();
            return redirect()->route('image.detail', ['id' => $comment->image_id])->with(['message' => 'Comentario eliminado!!']);
        }
        else{
            return redirect()->route('image.detail', ['id' => $image_id])->with(['message' => 'Comentario no ha podido eliminarse']);
        }



    }
}
