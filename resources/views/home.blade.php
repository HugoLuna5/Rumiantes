@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="card">

                    <div class="card-body">


                        <div class="list-group">
                            <a href="{{url('/home')}}" class="list-group-item list-group-item-action active">
                                Animales
                            </a>
                            <a href="{{route('homeStages')}}" class="list-group-item list-group-item-action">Etapas</a>
                            <a href="{{route('homeLivestocks')}}" class="list-group-item list-group-item-action">Ganaderias</a>
                            <a href="{{route('homeBatches')}}" class="list-group-item list-group-item-action">Lotes</a>
                            <a href="{{route('raceHome')}}" class="list-group-item list-group-item-action">Razas</a>
                            <a href="{{route('purposeHome')}}" class="list-group-item list-group-item-action">Proposito</a>
                            <a href="{{route('homeWeight')}}" class="list-group-item list-group-item-action">Peso</a>
                        </div>


                    </div>

                </div>
            </div>


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Tus animales</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('createAnimal')}}" class="btn btn-outline-primary">Agregar
                                    animal</a>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @include('animal.table')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
