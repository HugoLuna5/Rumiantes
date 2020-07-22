<?php

namespace App\Http\Controllers;

use App\Model\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WeightController extends Controller
{

    public function index(){

        $weights = Weight::paginate(25);
        return view('weight.index', compact('weights'));

    }

    public function create(){
        return view('weight.create');

    }

    public function save(Request $request){
        $error = Validator::make($request->all(), [
            'weight' => ['required', 'string', 'max:255'],
        ]);

        if ($error->fails()) {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }


        if (Weight::create($request->all())) {
            return $this->responseSuccess("Peso guardado con exito");
        } else {
            return $this->responseError("No se pudo guardar el peso");
        }
    }

    public function delete(Request $request){
        $error = Validator::make($request->all(), [
            'weight_id' => ['required']
        ]);

        if ($error->fails()) {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $element = Weight::find($request->weight_id);

        if ($element) {

            if ($element->delete()) {
                return $this->responseSuccess("Peso eliminado con exito");

            } else {
                return $this->responseError("El peso no pudo ser eliminado");
            }

        } else {
            return $this->responseError("El peso con este ID no existe");
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
