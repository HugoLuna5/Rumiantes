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
                                <h4 class="card-title">Materias primas</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('createRawMaterials')}}" class="btn btn-outline-primary">Agregar
                                    materia prima</a>

                            </div>
                        </div>


                    </div>
                    <div class="card-body">


                        @include('raw_material.table', ['data' => $fps, 'type' => 'Fuente proteinica'])



                        @include('raw_material.table', ['data' => $fes, 'type' => 'Fuente energetica'])



                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection
