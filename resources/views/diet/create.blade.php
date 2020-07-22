@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-10 offset-1">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Agregar dieta</h4>
                            </div>
                            <div class="col-md-7 text-right">



                            </div>
                        </div>
                    </div>

                        <div class="card-body">

                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Nombre de la dieta" class="form-control" required autofocus autocomplete="OFF"/>
                            </div>

                            <div class="form-group">
                                <input type="text" name="ration_kg" id="ration_kg" placeholder="Ración en KG" class="form-control" required autocomplete="OFF"/>
                            </div>

                            <div class="form-group">
                                <input type="text" name="protein_requirement" id="protein_requirement" placeholder="Requerimiento proteico" class="form-control" required autocomplete="OFF"/>
                            </div>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="proteica">Fuente proteica</label>
                                        <select class="form-control" name="raw_material_p" id="proteica">
                                            @foreach($fps as $fp)
                                                <option value="{{$fp->id}}">{{$fp->name}} - {{$fp->percentage_pb}}%</option>
                                            @endforeach
                                        </select>
                                        <button id="addFP" class="btn btn-outline-success float-right m-2">Agregar</button>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="energetica">Fuente energetica</label>
                                        <select class="form-control" name="raw_material_e" id="energetica">
                                            @foreach($fes as $fp)
                                                <option value="{{$fp->id}}">{{$fp->name}} - {{$fp->percentage_pb}}%</option>
                                            @endforeach
                                        </select>
                                        <button id="addFE" class="btn btn-outline-success float-right m-2">Agregar</button>

                                    </div>
                                </div>

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
                                              <th>Acciones</th>
                                          </tr>
                                          </thead>
                                          <tbody id="tBodyFP">

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
                                              <th>Acciones</th>
                                          </tr>
                                          </thead>
                                          <tbody id="tBodyFE">

                                          </tbody>
                                      </table>



                                  </div>
                              </div>
                           </div>

                            <div class="row">
                                <div class="col text-center">
                                <button class="btn btn-outline-primary" id="populateTable">Poblar tabla</button>
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

                            <div class="form-group">
                                <button class="btn btn-outline-primary float-left" id="actionCalculate" style="display: none"> Calcular</button>
                            </div>


                        </div>

                        <div class="card-footer ">
                            <button class="btn btn-outline-danger float-right m-1" id="cancelAction">Cancelar</button>
                            <button type="submit" class="btn btn-outline-success float-right m-1" id="actionSaveDiet">Guardar</button>


                        </div>

                </div>

            </div>


        </div>
    </div>


@endsection
