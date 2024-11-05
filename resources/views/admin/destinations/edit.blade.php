@extends('admin.master')

@section('title', __('keywords.edit_destination'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_destinations') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!--************* Start FORM ****-->
                        <form action="{{ route('admin.destinations.update', ['destination' => $destination]) }}"
                            method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-10">
                                    <label for="name">{{ __('keywords.name') }}</label>
                                    <input type="text" name="name" value="{{ $destination->name }}"
                                        class="form-control" placeholder="{{ __('keywords.name') }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Date -->
                                <div class="col-md-10 mt-2">
                                    <label for="example-date">{{ __('keywords.date') }}</label>
                                    <input class="form-control" id="example-date" type="date" name="date"
                                        value="{{ $destination->date }}">

                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Price -->
                                <div class="col-md-10 mt-2">
                                    <label for="price">{{ __('keywords.price') }}</label>
                                    <input type="text" id="price" name="price" value="{{ $destination->price }}"
                                        class="form-control" placeholder="{{ __('keywords.price') }}">

                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-10 mt-2">
                                    <label id="customFile">{{ __('keywords.image') }}</label>
                                    <div class="custom-file">
                                        <input type="file" value="{{ $destination->image }}" class="custom-file-input"
                                            name="image" id="customFile">
                                        <label class="custom-file-label"
                                            for="customFile">{{ __('keywords.image') }}</label>
                                    </div>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm mt-3">{{ __('keywords.submit') }}</button>

                        </form>
                        <!--************* End FORM ****-->
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
@endsection
