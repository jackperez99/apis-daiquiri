<?php
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    function obtenerLista(){
        $proveedores = Proveedor::all();

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $proveedores;

        return response()->json($response,200);
    }
    function obtenerItem($id){
        $proveedor = Proveedor::find($id);

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $proveedor;

        return response()->json($response,200);
    }
    function update(Request $request){
        $proveedor = Proveedor::find($request->id);
        
        if($proveedor){
            $proveedor -> codigo = $request->codigo;
            $proveedor -> razon_social = $request->razon_social;
            $proveedor -> ruc = $request->ruc;
            $proveedor -> direccion = $request->direccion;
            $proveedor -> correo_electronico = $request -> correo_electronico;
            $proveedor -> telefono = $request->telefono;
            $proveedor->save();
        }
        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $proveedor;

        return response()->json($response,200);
    }
    function patch(Request $request){
        $proveedor = Proveedor::find($request->id);
        
        if($proveedor){

            if($request -> codigo)
            $proveedor -> codigo = $request->codigo;

            if($request -> razon_social)
            $proveedor -> razon_social = $request->razon_social;

            if($request -> ruc)
            $proveedor -> ruc = $request->ruc;

            if($request -> direccion)
            $proveedor -> direccion = $request->direccion;

            if($request -> correo_electronico)
            $proveedor -> correo_electronico = $request -> correo_electronico;

            if($request -> telefono)
            $proveedor -> telefono = $request->telefono;
            
            $proveedor->save();
        }
        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $proveedor;

        return response()->json($response,200);
    }
    function storage(Request $request){

        $proveedor = new Proveedor();

        $proveedor -> codigo = $request->codigo;
        $proveedor -> razon_social = $request->razon_social;
        $proveedor -> ruc = $request->ruc;
        $proveedor -> direccion = $request->direccion;
        $proveedor -> correo_electronico = $request -> correo_electronico;
        $proveedor -> telefono = $request->telefono;
        $proveedor->save();

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $proveedor;

        return response()->json($response,200);
    }
    function delete($id){
        $response = new \stdClass();
        $response -> success = true;
        $response_code = 200;

        $proveedor = Proveedor::find($id);

        if($proveedor){
            $proveedor->delete();
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