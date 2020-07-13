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
                                <h4 class="card-title">Agregar lote</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('homeBatches')}}" class="btn btn-outline-primary">Lotes</a>

                            </div>
                        </div>
                    </div>

                    <form action="{{route('saveBatches')}}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="number">Número</label>
                                <input class="form-control" type="number" name="number" id="number"
                                       placeholder="Escribe el número del lote" required autocomplete="OFF">
                            </div>

                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>

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
