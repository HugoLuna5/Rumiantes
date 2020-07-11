@extends('layouts.auth.regiser_custom')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear cuenta</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-8 offset-2">

                                    <div class="form-group ">
                                        <label for="name" class=" col-form-label ">Nombre</label>


                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') }}" required autocomplete="OFF"
                                               autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label for="last_name_p" class="col-form-label ">Apellido
                                                    paterno</label>


                                                <input id="last_name_p" type="text"
                                                       class="form-control @error('last_name_p') is-invalid @enderror"
                                                       name="last_name_p" value="{{ old('last_name_p') }}" required
                                                       autocomplete="OFF" autofocus>

                                                @error('last_name_p')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label for="last_name_m" class=" col-form-label ">Apellido
                                                    materno</label>


                                                <input id="last_name_m" type="text"
                                                       class="form-control @error('last_name_m') is-invalid @enderror"
                                                       name="last_name_m" value="{{ old('last_name_m') }}" required
                                                       autocomplete="OFF" autofocus>

                                                @error('last_name_m')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror

                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="email"
                                               class=" col-form-label">Correo electronico</label>

                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="OFF">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="birthday">Fecha de nacimiento</label>
                                        <input type="text" name="birthday" id="birthday" class="form-control" data-toggle="flatpickr">

                                    </div>

                                    <div class="form-group">
                                        <label for="gender" class="col-form-label">Sexo</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>


                                    <div class="form-group ">
                                        <label for="password"
                                               class="col-form-label">Contraseña</label>


                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="OFF">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>

                                    <div class="form-group ">
                                        <label for="password-confirm"
                                               class="col-form-label">Confirmar contraseña</label>


                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="OFF">

                                    </div>

                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary active">
                                        CREAR CUENTA
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
