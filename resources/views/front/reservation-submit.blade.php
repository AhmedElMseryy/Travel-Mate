@extends('front.master')
@section('title', 'Reservation Submit')

@section('content')

    <!-- HERO SECTION -->
    <x-front-hero-section-component title="Reservation Submit" subtitle="reservation"></x-front-hero-section-component>

    <section class="w3l-grids-3 py-5">
        <div class="container py-md-5">
            <div class="row">
                <!-- Card Section -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="subject-card-header p-4 h-100">
                        <a href="#" class="card_title d-block">
                            <div class="row align-items-center">
                                <div class="col-sm-5 subject-img">
                                    <img src="{{ asset("storage/destinations/$destination->image") }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="col-sm-7 subject-content mt-sm-0 mt-4">
                                    <h4>{{ $destination->name }}</h4>
                                    <p>{{ $destination->date }}</p>
                                    <div class="dst-btm">
                                        <h6>Price</h6>
                                        <span>${{ $destination->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Card Section -->



                <!-- Payment Form Section -->
                <div class="col-lg-6 col-md-6">
                    <div class="subject-card-header payment-form p-4 h-100">
                        <!-- SUCCESS MESSAGE -->
                        <div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>

                        <h4>Payment Form</h4>

                        <form action="{{ route('reservations.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                            @if (Auth::check())
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endif

                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="expiration">Expiration Date</label>
                                    <input type="text" class="form-control" id="expiration" placeholder="MM/YY">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="CVV">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Payment</button>
                        </form>
                    </div>
                </div>
                <!-- End Payment Form Section -->


            </div>
        </div>
    </section>




@endsection
