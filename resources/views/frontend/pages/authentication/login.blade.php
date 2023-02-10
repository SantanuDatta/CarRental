@extends('frontend.layout.template')

@section('title', 'Login/Register')
@section('body-content')
    <!-- //////////////////////////////// -->
    <div class="wheel-start3">
        <img src="{{ asset('frontend/assets/images/newsletter-bg.png') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Login / Register</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Login / Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /////////////////////////////////// -->
    <div class="wheel-register-block big-img-fix">
        <div class="container">
            <div class="row">
                <div class="col-md-5 padd-l0">
                    <div class="wheel-register-log marg-lg-t150 marg-lg-b150 marg-sm-t100 marg-sm-b100">
                        <div class="wheel-header">
                            <h5>have an account? Log In</h5>
                        </div>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <label for="email" class="fa fa-user"><input type="email" name="email" id="email" value="{{ old('email') }}" placeholder='Email' required></label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <label for="password" class="fa fa-lock"><input type="password" name="password" id='password' placeholder='Passsword' required autocomplete="current-password"></label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <button type="submit" name="login" class="wheel-btn">Login</button>
                            <label class="password-sing clearfix" for="input-val2">
                            <input type='checkbox' id='input-val2'> <span>Keep me signed in</span>
                            <a href="">Forgot password?</a>
                            </label>
                            <div class="wheel-register-link">
                                <a href="" class="wheel-btn-link wheel-bg11">Login With Facebook</a>
                                <a href="" class="wheel-btn-link wheel-bg12">Login With Twitter</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="wheel-register-sign marg-lg-t150 marg-lg-b150 marg-sm-t100 marg-sm-b100">
                        <div class="wheel-header">
                            <h5>Sign up Now </h5>
                            <h3>Get <span>Registered</span></h3>
                        </div>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Username" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <input type="password" name="password_confirmation" placeholder="Confirm Password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            <label for="input-val1">
                            <input type="checkbox" id='input-val1'> <span>I agree with the </span>
                            <a href="">Terms and Conditions</a>
                            </label>
                            <button type="submit" name="register" class="wheel-btn">Sign Up</button>
                            <div class="wheel-register-link">
                                <a href="" class="wheel-btn-link wheel-bg11">Sign Up With Facebook</a>
                                <a href="" class="wheel-btn-link wheel-bg12">Sign Up With Twitter</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection