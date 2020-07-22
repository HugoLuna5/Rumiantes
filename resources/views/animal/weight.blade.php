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

                    <form action="{{route('saveWeightAnimal')}}" method="POST">
                        @csrf
                        <div class="card-body">


                            <div class="form-group">
                                <label for="date_gain_weight">Fecha</label>
                                <input type="date" name="date_gain_weight" id="date_gain_weight" class="form-control">
                                <input type="hidden" name="animal_no" id="animal_no" value="{{$animal->no_animal}}">
                            </div>



                            <div class="form-group">
                                <label for="weight_id">Peso</label>
                                <select name="weight_id" id="weight_id" class="form-control">
                                    <option value="0">Ningun peso</option>
                                    @foreach($weights as $weight)
                                        <option value="{{$weight->id}}">{{$weight->weight}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="weight_to_gain_id">Ganancia</label>
                                <select name="weight_to_gain_id" id="weight_to_gain_id" class="form-control">

                                    <option value="">Ningun peso</option>
                                    @foreach($weights as $weight)
                                        <option value="{{$weight->id}}">{{$weight->weight}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="stage_id">Estapa</label>
                                <select name="stage_id" id="stage_id" class="form-control">

                                    @foreach($stages as $stage)
                                        <option value="{{$stage->id}}">{{$stage->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="diet_id">Dieta</label>
                                <select name="diet_id" id="diet_id" class="form-control">

                                    <option value="">Ninguna dieta</option>
                                    @foreach($diets as $diet)
                                        <option value="{{$diet->id}}">{{$diet->name}}</option>
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
