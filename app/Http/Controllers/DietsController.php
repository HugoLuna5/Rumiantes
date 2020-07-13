<?php

namespace App\Http\Controllers;

use App\Model\Diet;
use Illuminate\Http\Request;

class DietsController extends Controller
{

    public function index(){

        $diets = Diet::paginate(20)->setPageName('diets');
        return view('diet.index', compact('diets'));
    }

}
