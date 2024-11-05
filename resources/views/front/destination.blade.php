@extends('front.master')
@section('title', 'About')
@section('destinations-active', 'active')

@section('content')

    <!-- HERO SECTION -->
    <x-front-hero-section-component title="Destinations" subtitle="destinations"></x-front-hero-section-component>

    <!-- Grids Section -->
    <x-front-destinations-section-component></x-front-destinations-section-component>

@endsection
