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
                                <h4 class="card-title">Agregar proposito</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('purposeHome')}}" class="btn btn-outline-primary">Propositos</a>

                            </div>
                        </div>
                    </div>

                    <form action="{{route('savePurpose')}}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="purpose">Proposito</label>
                                <input class="form-control" type="text" name="purpose" id="purpose"
                                       placeholder="Escribe el proposito" required autocomplete="OFF">
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
