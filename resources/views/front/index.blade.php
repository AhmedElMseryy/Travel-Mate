@extends('front.master')
@section('title', 'Home')
@section('home-active', 'active')


@section('content')

    <!-- main-slider -->
    <x-front-main-slider-component></x-front-main-slider-component>

    <!-- Grids Section -->
    <x-front-destinations-component></x-front-destinations-component>

    <!--/w3l-bottom-->
    <x-front-home-bottom-component></x-front-home-bottom-component>

@endsection

@section('testimonials')
    <!-- testimonials -->
    <x-front-testimonials-component></x-front-testimonials-component>
    <!-- //testimonials -->
@endsection
