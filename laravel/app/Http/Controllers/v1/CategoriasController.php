<?php
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    function obtenerLista()
    {
        $categorias = Categoria::all();

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $categorias;

        return response()->json($response,200);
    }
    function obtenerItem($id){
        $categoria = Categoria::find($id)->with("categoria");

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $categoria;

        return response()->json($response,200);
    }
    function update(Request $request){
        $categoria = Categoria::find($request->id);
        
        if($categoria){
            $categoria -> codigo = $request -> codigo;
            $categoria -> nombre = $request -> nombre;
            $categoria -> save();
        }
        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $categoria;

        return response()->json($response,200);
    }
    function patch(Request $request){
        $categoria = Categoria::find($request->id);
        
        if($categoria){

            if($request ->codigo)
            $categoria -> codigo = $request -> codigo;

            if($request -> nombre)
            $categoria -> nombre = $request -> nombre;
            
            $categoria -> save();
        }
        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $categoria;

        return response()->json($response,200);
    }
    function storage(Request $request){

        $categoria = new Categoria();
        $categoria -> codigo = $request->codigo;
        $categoria -> nombre = $request->nombre;
        $categoria -> save(); 

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $categoria;

        return response()->json($response,200);
    }
    function delete($id){
        $response = new \stdClass();
        $response -> success = true;
        $response_code = 200;

        $categoria = Categoria::find($id);

        if($categoria){
            $categoria->delete();
            $response -> success = true;
            $response_code = 200;
        }else{
            $response -> error= ["el elemento ya ha sido eliminado"];
            $response->success = false;
            $response_code = 500;
        }


        return response()->json($response,200);
    }
}