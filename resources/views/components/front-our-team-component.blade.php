<!-- team -->
<section class="w3l-team" id="team">
    <div class="team-block py-5">
        <div class="container py-lg-5">
            <div class="title-content text-center mb-lg-3 mb-4">
                <h6 class="sub-title">Our team</h6>
                <h3 class="hny-title">Meet our Guides</h3>
            </div>
            @if (count($guides) > 0)
                <div class="row">
                    @foreach ($guides as $key => $guide)
                        <div class="col-lg-3 col-6 mt-lg-5 mt-4">
                            <div class="box16">
                                <!-- Image -->
                                <a href="#url"><img src="{{ asset("storage/guides/$guide->image") }}" alt=""
                                        class="img-fluid" /></a>

                                <div class="box-content">
                                    <!-- Name -->
                                    <h3 class="title"><a href="#url">{{ $guide->name }}</a></h3>

                                    <!-- Description -->
                                    <span class="post">{{ $guide->description }}</span>

                                    <!--********** Linkes **********-->
                                    <ul class="social">
                                        <!-- LINKEDIN -->
                                        <li>
                                            <a href="{{ $guide->linkedin }}" class="linkedin">
                                                <span class="fa fa-linkedin"></span>
                                            </a>
                                        </li>

                                        <!-- EMAIL -->
                                        <li>
                                            <a href="mailto:{{ $guide->email }}" class="gmail">
                                                <span class="fa fa-envelope"></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--********** End Linkes **********-->

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</section>
<!-- //team -->
