 <section class="w3l-grids-3 py-5">
     <div class="container py-md-5">
         <div class="title-content text-left mb-lg-5 mb-4">
             <h3 class="hny-title">Destinations</h3>
         </div>

         <div class="row bottom-ab-grids">
             <!-- Foreach loop to generate cards -->
             @if (count($destinations) > 0)
                 @foreach ($destinations as $destination)
                     <div class="col-lg-6 col-md-6 mb-4">
                         <div class="subject-card-header p-4 h-100">
                             {{-- <a href="#" class="card_title d-block"> --}}

                             <form action="{{ route('front.reservation.submit') }}" method="POST">
                                 @csrf
                                 <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                                 @if (Auth::check())
                                     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                 @endif
                                 <button style="border: 0px;background: none" type="submit" class="card_title d-block">
                             </form>



                             <div class="row align-items-center">

                                 <!-- IMAGE -->
                                 <div class="col-sm-5 subject-img">
                                     <img src="{{ asset("storage/destinations/$destination->image") }}"
                                         class="img-fluid" alt="">
                                 </div>

                                 <div class="col-sm-7 subject-content mt-sm-0 mt-4">
                                     <!-- NAME -->
                                     <h4>{{ $destination->name }}</h4>

                                     <!-- DESTINATION -->
                                     <p>{{ $destination->date }}</p>

                                     <!-- PRICE -->
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
             @endif
         </div>
         <!-- ***************** PAGINATION ***************** -->
         {{ $destinations->render('pagination::bootstrap-5') }}
         <!-- ********************************************** -->
     </div>
 </section>
