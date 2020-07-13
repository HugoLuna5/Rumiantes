<?php

namespace App\Http\Controllers;

use App\Model\Race;
use App\Model\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RaceController extends Controller
{

    public function index(){
        $races = Race::paginate(25)->setPageName('race');

        return view('race.index', compact('races'));
    }

    public function create(){
        return view('race.create');
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


        if (Race::create($request->all())) {
            return $this->responseSuccess("Raza guardada con exito");
        } else {
            return $this->responseError("No se pudo guardar la raza");
        }
    }

    public function delete(Request $request){
        $error = Validator::make($request->all(), [
            'race_id' => ['required']
        ]);

        if ($error->fails()) {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $element = Race::find($request->race_id);

        if ($element) {

            if ($element->delete()) {
                return $this->responseSuccess("Raza eliminada con exito");

            } else {
                return $this->responseError("La raza no pudo ser eliminada");
            }

        } else {
            return $this->responseError("La raza con este ID no existe");
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
