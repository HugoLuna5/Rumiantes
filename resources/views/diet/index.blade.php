@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Dietas</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('createDiets')}}" class="btn btn-outline-primary">Agregar dieta</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">


                    </div>
                </div>

            </div>


        </div>
    </div>


@endsection
