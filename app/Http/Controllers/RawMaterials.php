<?php

namespace App\Http\Controllers;

use App\Model\RawMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class RawMaterials extends Controller
{


    public function index(){

        $fps = RawMaterial::where('type', '=', 'FP')
            ->paginate(30);
        $fes = RawMaterial::where('type', '=', 'FE')
            ->paginate(30);

        return view('raw_material.index', compact('fps', 'fes'));


    }

    public function create(){
        return view('raw_material.create');
    }

    public function save(Request $request){

        $error = Validator::make($request->all(), [

            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'percentage_pb' => ['required', 'string', 'max:12'],
        ]);

        if($error->fails())
        {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }


        if (RawMaterial::create($request->all())){
            return $this->responseSuccess("Materia prima guardada con exito");
        }else{
            return $this->responseError("No se pudo guardar la materia prima");
        }


    }


    public function delete(Request $request){
        $error = Validator::make($request->all(), [
            'rm_id' => ['required']
        ]);

        if($error->fails())
        {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $element = RawMaterial::find($request->rm_id);

        if ($element){

            if ($element->delete()){
                return $this->responseSuccess("Materia prima eliminada con exito");

            }else{
                return $this->responseError("La materia prima no ha podido ser eliminada");
            }

        }else{
            return $this->responseError("La materia prima con este ID no existe");
        }



    }



    public function responseSuccess($message){

        $notification = array(
            'message' => $message,
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    public function responseError($message){

        $notification = array(
            'message' => $message,
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }



}
