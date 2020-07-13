<?php

namespace App\Http\Controllers;

use App\Model\RawMaterial;
use App\Model\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StagesController extends Controller
{

    public function index()
    {

        $stages = Stage::paginate(25)->setPageName('stages');

        return view('stage.index', compact('stages'));

    }

    public function create()
    {
        return view('stage.create');
    }

    public function save(Request $request)
    {

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


        if (Stage::create($request->all())) {
            return $this->responseSuccess("Estapa guardada con exito");
        } else {
            return $this->responseError("No se pudo guardar la etapa");
        }

    }

    public function delete(Request $request)
    {
        $error = Validator::make($request->all(), [
            'stage_id' => ['required']
        ]);

        if($error->fails())
        {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $element = Stage::find($request->stage_id);

        if ($element){

            if ($element->delete()){
                return $this->responseSuccess("Etapa eliminada con exito");

            }else{
                return $this->responseError("La etapa no pudo ser eliminada");
            }

        }else{
            return $this->responseError("La etapa con este ID no existe");
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
