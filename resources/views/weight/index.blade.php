@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-8 offset-2">
                @include('layouts.alerts')
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Pesos</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('createWeight')}}" class="btn btn-outline-primary">Agregar
                                    peso</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @include('weight.table')

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
