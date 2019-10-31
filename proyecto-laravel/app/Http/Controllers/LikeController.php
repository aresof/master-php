<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        $likes = Like::where('user_id',$user->id)->orderBy('id','desc')->paginate(5);;

        return view('likes.index', ['likes' => $likes]);
    }

    public function like($id){

        $user = Auth::user();

        $isset_like = Like::where('user_id', $user->id)
                            ->where('image_id', $id)
                            ->count();
        if(!$isset_like) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int)$id;

            $like->save();

            $number_likes = Like::where('image_id', $id)->count();
            return response()->json(['like' => $like, 'id_image' => $id, 'message' => 'Has dado Like!', 'number_likes' => $number_likes]);
        }
        else{
            $number_likes = Like::where('image_id', $id)->count();
            return response()->json(['id_image' => $id, 'message' => 'El like ya existe', 'number_likes' => $number_likes]);
        }

    }

    public function dislike($id){

        $user = Auth::user();

        $like = Like::where('user_id', $user->id)
            ->where('image_id', $id)
            ->first();

        if($like) {
            $like->delete();
            $number_likes = Like::where('image_id', $id)->count();
            return response()->json(['like' => $like, 'id_image' => $id,  'message' => 'Has dado dislike!', 'number_likes' => $number_likes]);
        }
        else{
            $number_likes = Like::where('image_id', $id)->count();
            return response()->json(['id_image' => $id, 'message' => 'El like no existe', 'number_likes' => $number_likes]);
        }
    }

}
