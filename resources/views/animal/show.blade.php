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
                                <h4 class="card-title">Detalles del animal</h4>
                            </div>
                            <div class="col-md-7 text-right">
                                <a href="{{route('home')}}" class="btn btn-outline-primary">Animales</a>

                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                        <div class="form-group">
                            <label for="gender">Sexo</label>
                            <input class="form-control" type="text" name="gender" id="gender"
                                   value="{{$animal->gender}}" readonly required autocomplete="OFF">
                        </div>

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" type="text" name="name" id="name"
                                   value="{{$animal->name}}" readonly required autocomplete="OFF">
                        </div>

                        <div class="form-group">
                            <label for="livestock_id">Ganaderia</label>
                            <input class="form-control" type="text" name="livestock_id" id="livestock_id"
                                   value="{{$animal->liveStock->name}}" readonly required autocomplete="OFF">
                        </div>

                        <div class="form-group">
                            <label for="batche_id">Lote</label>
                            <input class="form-control" type="text" name="batche_id" id="batche_id"
                                   value="{{$animal->batch->number}} - {{$animal->batch->description}}" readonly required autocomplete="OFF">
                        </div>



                        <div class="form-group">
                            <label for="race_id">Raza</label>
                            <input class="form-control" type="text" name="race_id" id="race_id"
                                   value="{{$animal->race->name}}" readonly required autocomplete="OFF">
                        </div>

                        <div class="form-group">
                            <label for="purpose_id">Proposito</label>
                            <input class="form-control" type="text" name="purpose_id" id="purpose_id"
                                   value="{{$animal->purpose->purpose}}" readonly required autocomplete="OFF">
                        </div>

                        <hr>
                        <div class="form-group">
                            <h4 class="text-center">Origen</h4>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="birthday">Fecha de nacimiento</label>
                            <input type="date" value="{{$animal->birthday}}" name="birthday" id="birthday" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="father_id">Padre</label>
                            @if($animal->father_id !== null && $animal->father_id !== 0)
                                <input class="form-control" type="text" name="father_id" id="father_id"
                                       value="{{$animal->father->name}}" readonly required autocomplete="OFF">
                            @else
                                <input class="form-control" type="text" name="father_id" id="father_id"
                                       value="No se tiene registro del padre de este animal" readonly required autocomplete="OFF">
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="mother_id">Madre</label>

                            @if($animal->father_id !== null && $animal->father_id !== 0)
                                <input class="form-control" type="text" name="mother_id" id="mother_id"
                                       value="{{$animal->mother->name}}" readonly required autocomplete="OFF">
                            @else
                                <input class="form-control" type="text" name="mother_id" id="mother_id"
                                       value="No se tiene registro de la madre de este animal" readonly required autocomplete="OFF">

                            @endif

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-8 offset-2">

                            @if($gk)
                                <h4>Peso actual: {{$gk->weight->weight}} KG</h4>

                            @endif

                            @if($pa)
                                <h4>Ganancia en kilos: {{ $gk->weight->weight -  $pa->weight->weight}} KG</h4>

                            @endif

                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Peso</th>
                                    <th scope="col">Ganancia</th>
                                    <th scope="col">Dieta</th>
                                    <th scope="col">Etapa</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($relation as $rel)
                                    <tr>
                                        <td>{{$rel->date_gain_weight}}</td>
                                        <td>{{$rel->weight->weight}}</td>
                                        @if($rel->weight_to_gain_id !== null && $rel->weight_to_gain_id !== 0)
                                            <td>{{$rel->weight_to_gain->weight}}</td>
                                        @else
                                            <td>--</td>

                                        @endif


                                        @if($rel->diet !== null && $rel->diet !== 0)
                                            <td>{{$rel->diet->name}}</td>
                                        @else
                                            <td>--</td>

                                        @endif

                                        @if($rel->stage !== null && $rel->stage !== 0)
                                            <td>{{$rel->stage->name}}</td>
                                        @else
                                            <td>--</td>

                                        @endif



                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="form-group">
                                <a href="{{route('createWeightAnimal', [$animal->no_animal])}}" class="btn btn-outline-success float-right">Agregar peso</a>
                            </div>

                        </div>

                    </div>

                    <div class="card-footer text-right">

                    </div>



                </div>

            </div>

        </div>
    </div>


@endsection
