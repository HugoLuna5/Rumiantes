<?php

namespace App\Http\Controllers;

use App\Model\Batch;
use App\Model\Livestock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BatchController extends Controller
{
    public function index(){
        $batches = Batch::paginate(25)->setPageName('batches');

        return view('batch.index', compact('batches'));
    }

    public function create(){
        return view('batch.create');
    }

    public function save(Request $request){
        $error = Validator::make($request->all(), [
            'number' => ['required'],
            'description' => ['required'],
        ]);

        if ($error->fails()) {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }


        if (Batch::create($request->all())) {
            return $this->responseSuccess("Lote guardado con exito");
        } else {
            return $this->responseError("No se pudo guardar el lote");
        }
    }

    public function delete(Request $request){
        $error = Validator::make($request->all(), [
            'batch_id' => ['required']
        ]);

        if ($error->fails()) {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $element = Batch::find($request->batch_id);

        if ($element) {

            if ($element->delete()) {
                return $this->responseSuccess("Lote eliminado con exito");

            } else {
                return $this->responseError("El lote no pudo ser eliminado");
            }

        } else {
            return $this->responseError("El lote con este ID no existe");
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
