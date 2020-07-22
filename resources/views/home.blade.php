@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <div class="card">

                <div class="card-body">


                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                            Animales
                        </a>
                        <a href="{{route('homeStages')}}" class="list-group-item list-group-item-action">Etapas</a>
                        <a href="{{route('homeLivestocks')}}" class="list-group-item list-group-item-action">Ganaderias</a>
                        <a href="{{route('homeBatches')}}" class="list-group-item list-group-item-action">Lotes</a>
                        <a href="{{route('raceHome')}}" class="list-group-item list-group-item-action">Razas</a>
                        <a href="{{route('purposeHome')}}" class="list-group-item list-group-item-action">Proposito</a>
                    </div>


                </div>

            </div>
        </div>


        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Tus animales</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
