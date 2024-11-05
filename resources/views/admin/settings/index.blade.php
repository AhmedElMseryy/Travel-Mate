@extends('admin.master')

@section('title', __('keywords.settings'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.settings') }}</h2>

                <!-- Success Alert Component -->
                <x-success-alert></x-success-alert>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!--**** Start FORM ****-->
                        <form action="{{ route('admin.settings.update', ['setting' => $setting]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">


                                <!-- Facebook -->
                                <div class="col-md-6 mt-2">
                                    <label for="facebook">{{ __('keywords.facebook') }}</label>
                                    <input type="url" name="facebook" class="form-control"
                                        placeholder="{{ __('keywords.facebook') }}" value="{{ $setting->facebook }}">

                                    <x-validation-error field="facebook"></x-validation-error>
                                </div>

                                <!-- Linkedin -->
                                <div class="col-md-6 mt-2">
                                    <label for="linkedin">{{ __('keywords.linkedin') }}</label>
                                    <input type="url" name="linkedin" class="form-control"
                                        placeholder="{{ __('keywords.linkedin') }}" value="{{ $setting->linkedin }}">

                                    <x-validation-error field="linkedin"></x-validation-error>
                                </div>

                                <!-- Google -->
                                <div class="col-md-6 mt-2">
                                    <label for="Google">{{ __('keywords.Google') }}</label>
                                    <input type="url" name="Google" class="form-control"
                                        placeholder="{{ __('keywords.google') }}" value="{{ $setting->Google }}">

                                    <x-validation-error field="Google"></x-validation-error>
                                </div>


                                <!-- Twitter -->
                                <div class="col-md-6 mt-2">
                                    <label for="twitter">{{ __('keywords.twitter') }}</label>
                                    <input type="url" name="twitter" class="form-control"
                                        placeholder="{{ __('keywords.twitter') }}" value="{{ $setting->twitter }}">

                                    <x-validation-error field="twitter"></x-validation-error>
                                </div>


                                <!-- Github -->
                                <div class="col-md-6 mt-2">
                                    <label for="Github">{{ __('keywords.Github') }}</label>
                                    <input type="url" name="Github" class="form-control"
                                        placeholder="{{ __('keywords.Github') }}" value="{{ $setting->Github }}">

                                    <x-validation-error field="Github"></x-validation-error>
                                </div>


                            </div>

                            <x-submit-button></x-submit-button>
                        </form>
                        <!--**** End FORM ****-->
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
