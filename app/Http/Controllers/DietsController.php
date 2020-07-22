<?php

namespace App\Http\Controllers;

use App\Model\Diet;
use App\Model\RawMaterial;
use App\Model\RawMaterialDiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DietsController extends Controller
{

    public $responseSuccess = 200;

    public function index(){

        $diets = Diet::paginate(20)->setPageName('diets');
        return view('diet.index', compact('diets'));
    }


    public function create(){
        $fps = RawMaterial::where('type', '=', 'FP')
            ->get();
        $fes = RawMaterial::where('type', '=', 'FE')
            ->get();

        return view('diet.create', compact('fps', 'fes'));
    }

    public function save(Request $request){


        $error = Validator::make($request->all(), [
            'name' => ['required'],
            'ration_kg' => ['required'],
            'protein_requirement' => ['required'],
            'raw_materials' => ['required'],
        ]);

        if ($error->fails()) {

            $notification = array(
                'message' => $error->errors(),
                'alert-type' => 'error'
            );
            return response(['status' => 'error', 'message' => $notification], $this->responseSuccess);//back()->with($notification);
        }

        $diet = Diet::create([
            'name' => $request->name,
            'ration_kg' => $request->ration_kg,
            'protein_requirement' => $request->protein_requirement
        ]);

        if ($diet){

            $materials = explode(',', $request->raw_materials);

            foreach ($materials as $material){
                RawMaterialDiet::create([
                    'raw_material_id' => $material,
                    'diet_id' => $diet->id
                ]);
            }
            return response()->json(['status' => 'success', 'message' => 'Dieta guardada correctamente '. count($materials)], $this->responseSuccess);



        }else{
            return response()->json(['status' => 'error', 'message' => 'No se puedo guardar la dieta'], $this->responseSuccess);
        }


    }


    public function show($id){

        $diet = Diet::where('id', '=',$id)
        ->with([
            'rawmaterials' => function($query){
                $query->with([
                   'rawmaterial'
                ]);

            }
        ])->first();

        if (!$diet){
            return back(404);
        }

        return view('diet.show', compact('diet'));

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
