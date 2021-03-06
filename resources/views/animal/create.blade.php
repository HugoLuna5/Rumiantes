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
                                <h4 class="card-title">Agregar animal</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('home')}}" class="btn btn-outline-primary">Animales</a>

                            </div>
                        </div>
                    </div>

                    <form action="{{route('saveAnimal')}}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="gender">Sexo</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input class="form-control" type="text" name="name" id="name"
                                       placeholder="Escribe el nombre del animal" required autocomplete="OFF">
                            </div>

                            <div class="form-group">
                                <label for="livestock_id">Ganaderia</label>
                                <select name="livestock_id" id="livestock_id" class="form-control">

                                    @foreach($livestocks as $livestock)
                                        <option value="{{$livestock->id}}">{{$livestock->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="batche_id">Lote</label>
                                <select name="batche_id" id="batche_id" class="form-control">

                                    @foreach($batches as $batche)
                                        <option value="{{$batche->id}}">{{$batche->number}}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="race_id">Raza</label>
                                <select name="race_id" id="race_id" class="form-control">

                                    @foreach($races as $race)
                                        <option value="{{$race->id}}">{{$race->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="purpose_id">Proposito</label>
                                <select name="purpose_id" id="purpose_id" class="form-control">

                                    @foreach($purposes as $purpose)
                                        <option value="{{$purpose->id}}">{{$purpose->purpose}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr>
                            <div class="form-group">
                                <h4 class="text-center">Origen</h4>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label for="birthday">Fecha de nacimiento</label>
                                <input type="date" name="birthday" id="birthday" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="father_id">Padre</label>
                                <select name="father_id" id="father_id" class="form-control">
                                    <option value="0">No se tiene registro</option>

                                    @foreach($animals as $animal)
                                        <option value="{{$animal->id}}">{{$animal->id}} - {{$animal->name}}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mother_id">Madre</label>
                                <select name="mother_id" id="mother_id" class="form-control">
                                    <option value="0">No se tiene registro</option>
                                    @foreach($animals as $animal)
                                        <option value="{{$animal->id}}">{{$animal->id}} - {{$animal->name}}</option>

                                    @endforeach
                                </select>
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
