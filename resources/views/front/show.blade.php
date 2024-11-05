@extends('front.master')
@section('title', 'Reservation')
@section('reservation-active', 'active')


@section('content')

    <!-- HERO SECTION -->
    <x-front-hero-section-component title="My Reservation" subtitle="reservation"></x-front-hero-section-component>

    <!-- SHOW RESERVATION -->
    <x-front-show-reservation></x-front-show-reservation>

@endsection
