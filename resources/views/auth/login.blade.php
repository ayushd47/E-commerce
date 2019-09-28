@extends('layouts.main')

@section('content')
<section id="form">
    <!--form-->

    <div class="container">
        <div class="row">
            <div class="col-sm-9 ">
                <div class="login-form">
                    <!--login form-->
                    <div class="jumbotron jumbotron-fluid">
                        <h2>Login Form</h2>
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <h5>{{ $message }}</h5>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-9">
                                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <h5>{{ $message }}</h5>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">
                                            <a>{{ __('Login') }}</a>
                                        </button>
                                    </div>


                                    <button type="submit" class="btn btn-primary">
                                        <a href="{{ route('register') }}"> {{ __('Sign up') }}</a>
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif

                                </div>




                        </form>
                    </div>
                    <!--/login form-->
                </div>


            </div>

        </div>
    </div>
</section>
@stop