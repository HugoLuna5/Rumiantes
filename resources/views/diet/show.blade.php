@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-10 offset-1">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Detalles de la dieta</h4>
                            </div>
                            <div class="col-md-7 text-right">



                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <input type="text" value="{{$diet->name}}" readonly name="name" id="name" placeholder="Nombre de la dieta" class="form-control" required autofocus autocomplete="OFF"/>
                        </div>

                        <div class="form-group">
                            <input type="text" readonly value="{{$diet->ration_kg}}" name="ration_kg" id="ration_kg" placeholder="Ración en KG" class="form-control" required autocomplete="OFF"/>
                        </div>

                        <div class="form-group">
                            <input type="text" readonly value="{{$diet->protein_requirement}}" name="protein_requirement" id="protein_requirement" placeholder="Requerimiento proteico" class="form-control" required autocomplete="OFF"/>
                        </div>




                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h4>Fuente proteica</h4>

                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Materias prima</th>
                                            <th>PB(%)</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tBodyFP">
                                        @foreach($diet->rawmaterials as $dit)
                                            @if($dit->rawmaterial->type == 'FP')
                                                <tr>
                                                    <td>{{$dit->rawmaterial->name}}</td>
                                                    <td>{{$dit->rawmaterial->percentage_pb}}%</td>
                                                </tr>
                                            @endif

                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h4>Fuente energetica</h4>
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Materias prima</th>
                                            <th>PB(%)</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tBodyFE">
                                        @foreach($diet->rawmaterials as $dit)
                                            @if($dit->rawmaterial->type == 'FE')
                                                <tr>
                                                    <td>{{$dit->rawmaterial->name}}</td>
                                                    <td>{{$dit->rawmaterial->percentage_pb}}%</td>
                                                </tr>
                                            @endif

                                        @endforeach
                                        </tbody>
                                    </table>



                                </div>
                            </div>
                        </div>



                        <div class="form-group">

                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Materias primas</th>
                                    <th>PB(%)</th>
                                    <th>PD(%)</th>
                                    <th>Diferencia</th>
                                    <th>%</th>
                                    <th>Aporte(%)</th>
                                    <th>Cantidad(Kg)</th>
                                </tr>
                                </thead>
                                <tbody id="tBody">

                                </tbody>
                            </table>

                        </div>



                    </div>

                    <div class="card-footer ">



                    </div>

                </div>

            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="{{asset('/js/diets/show/header.js')}}"></script>
    <script !src="">

        @foreach($diet->rawmaterials as $dit)
        @if($dit->rawmaterial->type == 'FP')
        arrayFP.push({
            name: '{{$dit->rawmaterial->name}}',
            percentage_pb: '{{$dit->rawmaterial->percentage_pb}}',
            type: '{{$dit->rawmaterial->type}}',
        });
        sizeFP ++;
        @elseif($dit->rawmaterial->type == 'FE')
        arrayFE.push({
            name: '{{$dit->rawmaterial->name}}',
            percentage_pb: '{{$dit->rawmaterial->percentage_pb}}',
            type: '{{$dit->rawmaterial->type}}',
        });
        sizeFE++;
        @endif
        @endforeach

    </script>
    <script src="{{asset('/js/diets/show/actions.js')}}"></script>


@endsection
