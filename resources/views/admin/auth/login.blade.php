@extends('admin.auth.master')
@section('title', __('keywords.login'))


@section('content')
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">

            <!--*************** FORM ***************-->
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST" action="{{ route('admin.login') }}">
                @csrf
                @include('admin.partials.language')
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                        xml:space="preserve">
                        <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                        </g>
                    </svg>

                    <!-- LOGO -->
                    {{-- <img src="{{ asset('assets-front-auth/assets/img/favicon/Logo.png') }}" alt="Your Logo"
                        style="height: 100px;width: 200px"> --}}
                </a>

                <h1 class="h6 mb-3">{{ __('keywords.sign_in') }}</h1>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Email Address -->
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">{{ __('keywords.email') }}</label>
                    <input type="email" id="inputEmail" name="email" class="form-control form-control-lg"
                        placeholder="{{ __('keywords.email') }}" value="{{ old('email') }}" autofocus="">

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">{{ __('keywords.password') }}</label>
                    <input type="password" id="inputPassword" name="password" class="form-control form-control-lg"
                        placeholder="{{ __('keywords.password') }}">

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" name="remember" value="remember-me"> {{ __('keywords.remember') }} </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('keywords.login') }}</button>
                <p class="mt-5 mb-3 text-muted">© 2020</p>
            </form>
            <!--*************** END FORM ***************-->

        </div>
    </div>

@endsection
