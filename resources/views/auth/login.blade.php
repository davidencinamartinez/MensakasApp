@extends('main')
@section('title', 'MensakasApp - Panel de Administración')
@push('styles')
    <link rel="stylesheet" type="text/css" href="css/home.css">
@endpush
@push('scripts')
@endpush
@section('extendedSection')
    <div class="section"></div>
    <div class="section"></div>
    <div class="section"></div>
    <center>
        <div class="section"></div>
        <div class="section"></div>
        <div class="container">
            <div class="z-depth-1 white lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; width: 348px;">
                
                <form action="{{ route('login') }}" class="col s12" method="post">
                    @csrf
                    <div class='row'>
                        <h4>Login</h4>
                        <div class='input-field col s12'>
                            <input class='validate' type='email' name='email' id='email' autofocus autocomplete="off">
                            <label for='email'>Correo electrónico</label>
                        </div> 
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password' autocomplete="off">
                            <label for='password'>Contraseña</label>
                        </div>
                    </div>
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">*Credenciales incorrectas*</strong>
                            </span>
                    @enderror
                    <br>
                    <br>
                    <center>
                        <div class='row'>
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect purple darken-1'>Entrar</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
@endsection