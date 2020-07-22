<?php

namespace App\Http\Controllers;

use App\Model\Diet;
use App\Model\RawMaterial;
use Illuminate\Http\Request;

class DietsController extends Controller
{

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

    public function saveDiets(Request $request){



    }

}
