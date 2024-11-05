@extends('front.master')
@section('title', 'Contact')
@section('contact-active', 'active')

@section('content')


    <!-- HERO SECTION -->
    <x-front-hero-section-component title="Contact Us" subtitle="Contact"></x-front-hero-section-component>

    <!-- contact-form -->
    <section class="w3l-contact" id="contact">
        <div class="contact-infubd py-5">
            <div class="container py-lg-3">
                <div class="contact-grids row">
                    <div class="col-lg-6 contact-left">
                        <div class="partners">
                            <div class="cont-details">
                                <h5>Get in touch</h5>
                                <p class="mt-3 mb-4">
                                    Hi there, We are available 24/7 by fax, e-mail or by phone. Drop us line so we can talk
                                    futher about that.
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
                        <!-- SUCCESS MESSAGE -->
                        <div>
                            @if (session('contact_success_msg'))
                                <div class="alert alert-success">
                                    {{ session('contact_success_msg') }}
                                </div>
                            @endif
                        </div>

                        <!-- ******************** START FORM ******************** -->
                        <form action="{{ route('front.contact.store') }}" method="POST" class="signin-form">
                            @csrf

                            <div class="input-grids">
                                <!-- NAME -->
                                <div class="form-group">
                                    <input type="text" name="name" value="{{ old('name') }}" id="w3lName"
                                        placeholder="Your Name*" class="contact-input" />

                                    <x-validation-error field="name"></x-validation-error>
                                </div>

                                <!-- EMAIL -->
                                <div class="form-group">
                                    <input type="email" name="email" value="{{ old('email') }}" id="w3lSender"
                                        placeholder="Your Email*" class="contact-input" required="" />

                                    <x-validation-error field="email"></x-validation-error>
                                </div>

                                <!-- SUBJECT -->
                                <div class="form-group">
                                    <input type="text" name="subject" value="{{ old('subject') }}" id="w3lSubect"
                                        placeholder="Subject*" class="contact-input" />

                                    <x-validation-error field="subject"></x-validation-error>
                                </div>
                            </div>

                            <!-- MESSAGE -->
                            <div class="form-group">
                                <textarea name="message" value="{{ old('message') }}" id="message" placeholder="Type your message here*"
                                    required=""></textarea>
                                <x-validation-error field="message"></x-validation-error>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-style btn-primary">Send Message</button>
                            </div>
                        </form>
                        <!-- ******************** END FORM ******************** -->
                    </div>

                </div>

            </div>
    </section>
    <!-- /contact-form -->

@endsection
