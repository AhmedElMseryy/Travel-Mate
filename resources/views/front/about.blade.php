@extends('front.master')
@section('title', 'About')
@section('about-active', 'active')

@section('content')


    <!-- HERO SECTION -->
    <x-front-hero-section-component title="About Us" subtitle="about"></x-front-hero-section-component>

    <!-- About Us SECTION -->
    <x-front-aboutus-section-component></x-front-aboutus-section-component>

    <!-- Out Team SECTION -->
    <x-front-our-team-component></x-front-our-team-component>


@endsection
