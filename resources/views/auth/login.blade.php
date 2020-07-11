@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Iniciar sesion</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-8 offset-2">
                                <div class="form-group">
                                    <label for="email" class="col-md-4 col-form-label ">Correo electronico</label>


                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-4 col-form-label">Contraseña</label>


                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>

                       <div class="row">
                           <div class="col-md-8 offset-2">
                               <div class="form-group form-inline align-content-center">
                                   <div class="col-md-4 ">
                                       <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                           <label class="form-check-label" for="remember">
                                               Recordarme
                                           </label>
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       @if (Route::has('password.request'))
                                           <a class="btn btn-link" href="{{ route('password.request') }}">
                                               ¿Olvidaste tu contraseña?
                                           </a>
                                       @endif
                                   </div>
                               </div>

                               <div class="form-group  mb-0">
                                   <div class="col-md-8 offset-md-4">
                                       <button type="submit" class="btn btn-outline-primary active">
                                           ENTRAR
                                       </button>


                                   </div>
                               </div>
                           </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
