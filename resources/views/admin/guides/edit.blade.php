@extends('admin.master')

@section('title', __('keywords.edit_guide'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.edit_guide') }}</h2>

                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!--************* Start FORM ****-->
                        <form action="{{ route('admin.guides.update', ['guide' => $guide]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-10">
                                    <label for="name">{{ strtoupper(__('keywords.name')) }}</label>
                                    <input type="text" name="name" value="{{ $guide->name }}" class="form-control"
                                        placeholder="{{ __('keywords.name') }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-10 mt-2">
                                    <label for="email">{{ strtoupper(__('keywords.email')) }}</label>
                                    <input type="email" name="email" value="{{ $guide->email }}" class="form-control"
                                        placeholder="{{ __('keywords.email') }}">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-10 mt-2">
                                    <label for="description">{{ strtoupper(__('keywords.description')) }}</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="{{ __('keywords.description') }}">{{ $guide->description }}</textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- LinkedIn -->
                                <div class="col-md-10 mt-2">
                                    <label for="linkedin">{{ strtoupper(__('keywords.linkedin')) }}</label>
                                    <input type="url" name="linkedin" value="{{ $guide->linkedin }}"
                                        class="form-control" placeholder="{{ __('keywords.linkedin') }}">

                                    @error('linkedin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-10 mt-2">
                                    <label id="currentImage">{{ strtoupper(__('keywords.image')) }}</label>

                                    <!-- عرض الصورة الحالية إذا كانت موجودة -->
                                    @if ($guide->image)
                                        <div class="mb-2">
                                            <img src="{{ asset("storage/guides/{$guide->image}") }}" alt="Current Image"
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
