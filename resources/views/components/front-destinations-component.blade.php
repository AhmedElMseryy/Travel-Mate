<!-- Grids Section -->
<section class="w3l-grids-3 py-5">
    <div class="container py-md-5">
        <div class="title-content text-left mb-lg-5 mb-4">
            <h6 class="sub-title">Visit</h6>
            <h3 class="hny-title">Popular Destinations</h3>
        </div>
        <div class="row bottom-ab-grids">
            <!-- Foreach loop to generate cards -->
            @foreach ($destinations as $destination)
                <div class="col-lg-6 col-md-6 mb-4"> <!-- Adjusted for better spacing -->
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
            @endforeach
        </div>
    </div>
</section>
<!-- End of Grids Section -->
