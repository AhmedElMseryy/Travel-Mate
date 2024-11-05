<section class="w3l-cta4 py-5">
    @if (count($abouts) > 0)
        @foreach ($abouts as $key => $about)
            <div class="container py-lg-5">
                <div class="ab-section text-center">
                    <h6 class="sub-title">About Us</h6>
                    <h3 class="hny-title">{{ $about->title }}.</h3>
                    <p class="py-3 mb-3">{{ $about->description }}.</p>
                </div>
                <div class="row mt-5">
                    <div class="col-md-9 mx-auto">
                        <img src="{{ asset("storage/abouts/$about->image") }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</section>
