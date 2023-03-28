@extends('layouts.master2')
@section('css')
    <!-- Data Tables -->
   <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.png') }}" />
<!-- Bootstrap css -->

<link rel="stylesheet"href="{{ URL::asset('assets/img/favicon.png') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
@endsection
@section('content')

  <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="assets/img/logo.png" alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                             <form method="POST" action="{{ route('login') }}">
                    @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Email Address</label>
                                      <input id="email" type="email"  class="form-control"@error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocusplaceholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                       <input id="password" class="form-control pass-input @error('password') is-invalid @enderror" type="password"
                            name="password" placeholder="Password"required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">


                                    </div>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>





                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Data Tables -->
    <script src="{{ URL::asset('assets/js/lg.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/countdowntime/countdowntime.js') }}"></script>
@endsection
