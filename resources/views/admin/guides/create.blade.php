@extends('admin.master')

@section('title', __('keywords.add_new_guide'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.add_new_guide') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!-- ****** Start Form ****** -->
                        <form action="{{ route('admin.guides.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-10">
                                    <label for="name">{{ strtoupper(__('keywords.name')) }}</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="{{ __('keywords.name') }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Email -->
                                <div class="col-md-10 mt-2">
                                    <label for="email">{{ strtoupper(__('keywords.email')) }}</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                        placeholder="{{ __('keywords.email') }}">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-10 mt-2">
                                    <label for="description">{{ strtoupper(__('keywords.description')) }}</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="{{ __('keywords.description') }}">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- LinkedIn -->
                                <div class="col-md-10 mt-2">
                                    <label for="linkedin">{{ strtoupper(__('keywords.linkedin')) }}</label>
                                    <input type="url" name="linkedin" value="{{ old('linkedin') }}"
                                        class="form-control" placeholder="{{ __('keywords.linkedin') }}">

                                    @error('linkedin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-10 mt-2">
                                    <label id="customFile">{{ strtoupper(__('keywords.image')) }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image"
                                            value="{{ old('image') }}" id="customFile">
                                        <label class="custom-file-label"
                                            for="customFile">{{ __('keywords.image') }}</label>
                                    </div>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <x-submit-button></x-submit-button>
                        </form>
                        <!-- ****** End Form ****** -->
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
