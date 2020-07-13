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
                                <h4 class="card-title">Crear materia prima</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('homeRawMaterials')}}" class="btn btn-outline-primary">Regresas a
                                    materias primas</a>

                            </div>
                        </div>


                    </div>
                    <form action="{{route('saveRawMaterials')}}" method="POST">
                        @csrf
                        <div class="card-body">


                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input autocomplete="OFF" type="text" name="name" id="name" required
                                       class="form-control"
                                       placeholder="Escribe el nombre de la materia prima">
                            </div>

                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <select name="type" id="type" required class="form-control">
                                    <option value="" disabled>Selecciona un tipo</option>
                                    <option value="FP">Fuente proteinica</option>
                                    <option value="FE">Fuente energetica</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="percentage_pb">PB</label>
                                <input autocomplete="OFF" placeholder="Escribe el PB %" type="text" name="percentage_pb"
                                       id="percentage_pb"
                                       required class="form-control">
                            </div>


                        </div>

                        <div class="card-footer text-right">
                            <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                            <button type="submit" class="btn btn-outline-success">Agregar</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>



@endsection
