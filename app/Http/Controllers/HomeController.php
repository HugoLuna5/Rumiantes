<?php

namespace App\Http\Controllers;

use App\Model\Animal;
use App\Model\Batch;
use App\Model\Livestock;
use App\Model\Purpose;
use App\Model\Race;
use App\Model\Stage;
use Illuminate\Http\Request;

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
        return view('home');
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

}
