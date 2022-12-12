@extends('layouts.authenticate')

@section('content')
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Sign In</h4>
                            </div>
                            <div class="card-body">
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <x-text-input id="email" class="form-control form-control-lg" type="email"
                                            name="email" :value="old('email')" required autofocus placeholder="Email"
                                            aria-label="Email" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <x-text-input id="password" class="form-control form-control-lg" type="password"
                                            name="password" required autocomplete="current-password" placeholder="Password"
                                            aria-label="Password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">

                                        <x-primary-button class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">

                                            {{ __('Sign in') }}

                                        </x-primary-button>

                                    </div>
                                </form>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <a class="ml-1 btn btn-primary" href="{{ route('auth.facebook') }}" style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;" id="btn-fblogin">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook
                                </a>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="text-primary text-gradient font-weight-bold">Register</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-rhttps://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpgadius-lg d-flex flex-column justify-content-center overflow-hidden"
                            style="background-image: url(''); background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Please Login"</h4>
                            <p class="text-white position-relative">To explore the Quiz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
