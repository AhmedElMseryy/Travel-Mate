@extends('admin.master')

@section('title', __('keywords.about'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.about') }}</h2>

                </div>
                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!-- Success Alert Component -->
                        <x-success-alert></x-success-alert>

                        <!-- ****** Start Table ****** -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('keywords.title') }}</th>
                                    <th>{{ __('keywords.description') }}</th>
                                    <th>{{ __('keywords.image') }}</th>
                                    <th width="10%">{{ __('keywords.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($abouts) > 0)
                                    @foreach ($abouts as $key => $about)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $about->title }}</td>
                                            <td>{{ $about->description }}</td>
                                            <td>
                                                <img src="{{ asset('storage/abouts/' . $about->image) }}?{{ session('timestamp') ?? '' }}"
                                                    alt="#" width="50px">
                                            </td>

                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.about.edit', ['about' => $about]) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class='fe fe-edit fa-2x'></i>
                                                </a>


                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <!-- Empty Alert Component -->
                                    <tr>
                                        <td colspan ="100%">
                                            <div class="alert alert-danger">
                                                {{ __('keywords.no_found_records') }}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- ****** End Table ****** -->
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>



@endsection
