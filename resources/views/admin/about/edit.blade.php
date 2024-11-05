@extends('admin.master')

@section('title', __('keywords.edit_about'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_about') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!--************* Start FORM ****-->
                        <form action="{{ route('admin.about.update', ['about' => $about]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-10">
                                    <label for="title">{{ strtoupper(__('keywords.title')) }}</label>
                                    <input type="text" name="title" value="{{ $about->title }}" class="form-control"
                                        placeholder="{{ __('keywords.title') }}">

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-10 mt-2">
                                    <label for="description">{{ strtoupper(__('keywords.description')) }}</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="{{ __('keywords.description') }}">{{ $about->description }}</textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-10 mt-2">
                                    <label id="currentImage">{{ strtoupper(__('keywords.image')) }}</label>

                                    <!-- عرض الصورة الحالية إذا كانت موجودة -->
                                    @if ($about->image)
                                        <div class="mb-2">
                                            <img src="{{ asset("storage/abouts/{$about->image}") }}" alt="Current Image"
                                                style="width: 50px; height: auto;">
                                        </div>
                                    @endif

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label"
                                            for="customFile">{{ __('keywords.image') }}</label>
                                    </div>

                                    <small>إذا لم يتم اختيار صورة جديدة، ستظل الصورة الحالية كما هي.</small>

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
