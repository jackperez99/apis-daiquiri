<?php
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    function obtenerLista(){
        $clientes = Cliente::all();

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $clientes;

        return response()->json($response,200);
    }
    function obtenerItem($id){
        $cliente = Cliente::find($id);

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $cliente;

        return response()->json($response,200);
    }
    function update(Request $request){
        $cliente = Cliente::find($request->id);
        
        if($cliente){
            $cliente -> codigo = $request->codigo;
            $cliente -> nombres = $request->nombres;
            $cliente -> apellidos = $request->apellidos;
            $cliente -> correo_electronico = $request ->correo_electronico;
            $cliente -> telefono = $request -> telefono;
            $cliente->save();
        }
        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $cliente;

        return response()->json($response,200);
    }
    function patch(Request $request){
        $cliente = Cliente::find($request->id);
        
        if($cliente){

            if($request -> codigo)
            $cliente -> codigo = $request->codigo;

            if($request -> nombres)
            $cliente -> nombres = $request->nombres;

            if($request -> apellidos)
            $cliente -> apellidos = $request->apellidos;

            if($request -> correo_electronico)
            $cliente -> correo_electronico = $request ->correo_electronico;

            if($request -> telefono)
            $cliente -> telefono = $request -> telefono;
            
            $cliente->save();
        }
        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $cliente;

        return response()->json($response,200);
    }
    function storage(Request $request){

        $cliente = new Cliente();

        $cliente -> codigo = $request->codigo;
        $cliente -> nombres = $request->nombres;
        $cliente -> apellidos = $request->apellidos;
        $cliente -> correo_electronico = $request ->correo_electronico;
        $cliente -> telefono = $request -> telefono;
        $cliente->save();

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $cliente;

        return response()->json($response,200);
    }
    function delete($id){
        $response = new \stdClass();
        $response -> success = true;
        $response_code = 200;

        $cliente = Cliente::find($id);

        if($cliente){
            $cliente->delete();
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