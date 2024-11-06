@extends('front_auth.master')
@section('title', 'Login')

@section('content')
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <img src="{{ asset('assets-front-auth/assets/img/favicon/Logo.png') }}" alt="Your Logo"
                                    style="height: 150px;width: 300px">
                            </a>
                        </div>
                        <!-- /Logo -->

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- ******************** START FORM ******************** -->
                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf

                            <!-- EMAIL -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Enter your email" autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- PASSWORD -->
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- REMEMBER ME -->
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>

                            <!-- BUTTON -->
                            <div class="mb-3">
                                <button style="background-color: #ff1654c4;" class="btn btn-primary d-grid w-100"
                                    type="submit">Sign in</button>
                            </div>

                            <!-- Google Sign In Button -->
                            <div class="mb-3">
                                <a href="{{ route('socialite.login') }}"
                                    class="btn btn-light border d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assets-front-auth/assets/img/favicon/google.png') }}" alt="#"
                                        style="width: 18px; margin-right: 8px;">
                                    Sign in with Google
                                </a>
                            </div>

                        </form>
                        <!-- ******************** END FORM ******************** -->

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="{{ route('register') }}">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
