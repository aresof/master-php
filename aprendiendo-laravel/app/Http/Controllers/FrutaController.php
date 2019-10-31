<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrutaController extends Controller
{
    public function index(){

        $frutas = DB::table('frutas')
            ->orderBy('id','desc')
            ->get();

        return view('fruta.index',[
                    'frutas' => $frutas
        ]);

    }

    public function detail($id){

        $fruta = DB::table('frutas')->where('id', '=', $id)->first();

        return view('fruta.detail', [
            'fruta' => $fruta
        ]);

    }

    public function create(){

        return view('fruta.create');

    }

    public function save(Request $request){

        $fruta = DB::table('frutas')->insert([
           'nombre' => $request->input('name'),
           'descripcion' => $request->input('desc'),
           'precio' => $request->input('precio'),
           'fecha' => date('Y-m-d')
        ]);

        return redirect()->action('FrutaController@index')->with('status', 'Fruta creada correctamente');
    }

    public function delete($id){

        DB::table('frutas')->where('id',$id)->delete();

        return redirect()->action('FrutaController@index')->with('status','Fruta borrada correctamente');
    }

    public function edit($id){

        $fruta = DB::table('frutas')->where('id', $id)->first();

        return view('fruta.create', ['fruta' => $fruta]);

    }

    public function update(Request $request){

        $id = $request->input('id');

        DB::table('frutas')->where('id', $id)
                            ->update([
                                'nombre' => $request->input('name'),
                                'descripcion' => $request->input('desc'),
                                'precio' => $request->input('precio')
                            ]);

        return redirect()->action('FrutaController@index')->with('status','Fruta actualizada correctamente');


    }
}
