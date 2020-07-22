<?php

namespace App\Http\Controllers;

use App\Model\Animal;
use App\Model\AnimalRelationStageWeight;
use App\Model\Batch;
use App\Model\Diet;
use App\Model\Livestock;
use App\Model\Purpose;
use App\Model\Race;
use App\Model\Stage;
use App\Model\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $animals = Animal::paginate(25);
        return view('home', compact('animals'));
    }

    public function create()
    {
        $livestocks = Livestock::all();
        $batches = Batch::all();
        $stages = Stage::all();
        $races = Race::all();
        $purposes = Purpose::all();

        $animals = Animal::all();

        return view('animal.create', compact('livestocks', 'batches', 'stages', 'races', 'purposes', 'animals'));
    }

    public function save(Request $request){

        $error = Validator::make($request->all(), [
            'father_id' => ['required'],
            'mother_id' => ['required'],
            'race_id' => ['required'],
            'purpose_id' => ['required'],
            'livestock_id' => ['required'],
            'batche_id' => ['required'],
            'birthday' => ['required'],
            'gender' => ['required'],
            'name' => ['required'],
        ]);

        if ($error->fails()) {
            return $this->responseError($error->errors());
        }



        if (Animal::create($request->all())){
            return $this->responseSuccess("Animal guardado con exito");
        }else{
            return $this->responseError("No se pudo guardar el animal");
        }

    }


    public function show($no_animal){

        $animal = Animal::where('no_animal', '=', $no_animal)->first();
        $relation = AnimalRelationStageWeight::where('animal_no', '=', $no_animal)
            ->orderBy('created_at', 'DESC')
            ->get();
        $gk = AnimalRelationStageWeight::where('animal_no', '=', $no_animal)
            ->orderBy('created_at', 'DESC')
            ->first();

        $pa = AnimalRelationStageWeight::where('animal_no', '=', $no_animal)
            ->orderBy('created_at', 'ASC')
            ->first();

        if ($animal){

            return view('animal.show', compact('animal', 'relation', 'gk', 'pa'));

        }else{
            return $this->responseError("Este animal no existe");
        }
    }


    public function createWeightAnimal($id){

        $animal = Animal::where('no_animal', '=', $id)->first();
        $weights = Weight::all();
        $diets = Diet::all();
        $stages = Stage::all();


        return view('animal.weight', compact('animal', 'relation', 'weights', 'diets', 'stages'));

    }


    public function saveWeightAnimal(Request $request){

        $error = Validator::make($request->all(), [
            'animal_no' => ['required'],
            'stage_id' => ['required'],
            'weight_id' => ['required'],
            'date_gain_weight' => ['required'],

        ]);

        if ($error->fails()) {
            return $this->responseError($error->errors());
        }

        if (AnimalRelationStageWeight::create($request->all())){
            return $this->responseSuccess("Peso guardado con exito");
        }else{
            return $this->responseError("No se pudo guardar el peso");
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
