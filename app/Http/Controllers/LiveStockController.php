<?php

namespace App\Http\Controllers;

use App\Model\Livestock;
use App\Model\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LiveStockController extends Controller
{

    public function index(){
        $livestocks = Livestock::paginate(25)->setPageName('livestocks');

        return view('livestock.index', compact('livestocks'));
    }

    public function create(){
        return view('livestock.create');
    }

    public function save(Request $request){
        $error = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($error->fails()) {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }


        if (Livestock::create($request->all())) {
            return $this->responseSuccess("Ganaderia guardada con exito");
        } else {
            return $this->responseError("No se pudo guardar la ganaderia");
        }
    }

    public function delete(Request $request){
        $error = Validator::make($request->all(), [
            'livestock_id' => ['required']
        ]);

        if ($error->fails()) {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $element = Livestock::find($request->livestock_id);

        if ($element) {

            if ($element->delete()) {
                return $this->responseSuccess("Ganaderia eliminada con exito");

            } else {
                return $this->responseError("La ganaderia no pudo ser eliminada");
            }

        } else {
            return $this->responseError("La ganaderia con este ID no existe");
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
