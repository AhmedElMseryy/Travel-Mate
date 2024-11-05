<!-- about breadcrumb -->
<section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
        <div class="container py-2">
            <h2 class="title">{{ $title }}</h2>
            <ul class="breadcrumbs-custom-path mt-2">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> {{ $subtitle }}</li>
            </ul>
        </div>
    </div>
</section>
<!-- //about breadcrumb -->
