@extends('admin.master')

@section('title', __('keywords.add_new_destination'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.add_new_destination') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!-- ****** Start Form ****** -->
                        <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-10">
                                    <label for="name">NAME</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="{{ __('keywords.name') }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Date -->
                                <div class="col-md-10 mt-2">
                                    <label for="example-date">DATE</label>
                                    <input class="form-control" id="example-date" type="date" name="date"
                                        value="{{ old('date') }}">

                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Price -->
                                <div class="col-md-10 mt-2">
                                    <label for="price">PRICE</label>
                                    <input type="text" id="price" name="price" value="{{ old('price') }}"
                                        class="form-control" placeholder="{{ __('keywords.price') }}">

                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-10 mt-2">
                                    <label id="customFile">IMAGE</label>
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
