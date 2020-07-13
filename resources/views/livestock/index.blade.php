@extends('layouts.app')
@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-8 offset-2">

                <div class="card">

                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Ganaderias</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('createLivestock')}}" class="btn btn-outline-primary">Agregar
                                    ganaderia</a>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        @include('livestock.table')
                    </div>
                    <div class="card-footer"></div>

                </div>

            </div>


        </div>

    </div>


@endsection
