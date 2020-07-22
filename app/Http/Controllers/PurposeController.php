<?php

namespace App\Http\Controllers;

use App\Model\Purpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurposeController extends Controller
{

    public function  index(){

        $purposes = Purpose::paginate(20)->setPageName('purpose');


        return view('purpose.index', compact('purposes'));

    }

    public function create(){

        return view('purpose.create');
    }

    public function save(Request $request){

        $error = Validator::make($request->all(), [
            'purpose' => ['required', 'string', 'max:255'],
        ]);

        if ($error->fails()) {
            return $this->responseError($error->errors());
        }

        $purpose = Purpose::create([
           'purpose' => $request->purpose
        ]);

        if ($purpose){

            return $this->responseSuccess("Proposito agregado exitosamente");
        }else{
            return $this->responseError("Ocurrio un error al crear el proposito");
        }
    }


    public function delete(Request $request){
        $error = Validator::make($request->all(), [
            'purposeid' => ['required']
        ]);

        if ($error->fails()) {
            return $this->responseError($error->errors());
        }

        $element = Purpose::find($request->purposeid);

        if ($element) {

            if ($element->delete()) {
                return $this->responseSuccess("Proposito eliminada con exito");

            } else {
                return $this->responseError("El proposito no pudo ser eliminado");
            }

        } else {
            return $this->responseError("El proposito con este ID no existe");
        }

    }




    public function responseSuccess($message)
    {

        $notification = array(
            'message' => $message,
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    public function responseError($message)
    {

        $notification = array(
            'message' => $message,
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }

}
