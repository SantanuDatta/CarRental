@extends('frontend.layout.template')

@section('title', 'Car Details')
@section('body-content')
    <!-- //////////////////////////////// -->
    <div class="wheel-start3 style-5">
        <img src="{{ asset('frontend/assets/images/bg-8-1.jpg') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Car Details</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('listing') }}"> Listing </a></li>
                            <li class="active">Car Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="imgOnBanner-wrap">
            <img src="{{ asset('backend/img/cars/'. $cDetails->image) }}" alt="" class="imgOnBanner img-responsive">
        </div>
    </div>
    <div class="container-fluid padd-lr0">
        <div class="row padd-lr0">
            <div class="col-xs-12 padd-lr0">
                <div class="container padd-lr0 xs-padd">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="listing-hedlines t-center">
                                <h5 class="title">{{ $cDetails->name }}</h5>
                                <div class="subtitle">{{ $cDetails->brand->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 padd-lr0 xs-padd sm-addpadd">
                            <div class="wheel-collection style-2">
                                <div class="tabs">
                                    <div class="tabs-header">
                                        <ul>
                                            <li class="active"><a href="#">Features</a></li>
                                            <li><a href="#">Description</a></li>
                                            <li><a href="#">(4)reviews</a></li>
                                        </ul>
                                    </div>
                                    <div class="tabs-content marg-lg-b30">
                                        <div class="tabs-item text-item active">
                                            <ul class="tabslist">
                                                @foreach (explode(",", $cDetails->features) as $feature)
                                                    <li class="item">{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="tabs-item text-item">
                                            <p> {!! $cDetails->description !!}</p>
                                        </div>
                                        <div class="tabs-item text-item">
                                            <div class="wheel-comments-area wheel-bg1">
                                                <div class="wheel-comments-list">
                                                    <ul>
                                                        <li>
                                                            <div class="wheel-comment-body">
                                                                <div class="clearfix">
                                                                    <div class="comment-author">
                                                                        <img src="images/l3.png" alt="">
                                                                        <a href="">Anthony Martial</a>
                                                                        <div class="ratings">
                                                                            <img src="images/stars.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-metadata">
                                                                        <time datetime="2015-01-10T20:15:40+00:00">  13:05, May 27</time>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-content">
                                                                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wheel-sub-comment">
                                                                <div class="wheel-comment-body">
                                                                    <div class="clearfix">
                                                                        <div class="comment-author">
                                                                            <img src="images/l4.png" alt=""><a href="">Katherine Sanders</a>
                                                                            <div class="ratings">
                                                                                <img src="images/stars.png" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="comment-metadata">
                                                                            <time datetime="2015-01-10T20:15:40+00:00">  13:05, May 27</time>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-content">
                                                                        <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wheel-comment-body">
                                                                <div class="clearfix">
                                                                    <div class="comment-author">
                                                                        <img src="images/l5.png" alt=""><a href="">Vicki Rogers</a>
                                                                        <div class="ratings">
                                                                            <img src="images/stars.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-metadata">
                                                                        <time datetime="2015-01-10T20:15:40+00:00">  13:05, May 27</time>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-content">
                                                                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <section class="wheel-reply-form wheel-bg1">
                                                <header>
                                                    <h3>Add Your Review</h3>
                                                </header>
                                                <form action="#">
                                                    <input type="text" placeholder="Your Name *">
                                                    <input type="text" placeholder="Your Email *">
                                                    <textarea placeholder="Your Message *"></textarea>
                                                    <button>Submit Now</button>
                                                </form>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid padd-lr0 z-bg-1">
        <div class="row marg-lg-t75 marg-xs-t0">
            <div class="col-xs-12 padd-lr0 xs-padd">
                <div class="container padd-lr0 xs-padd" >
                    <div class="row">
                        <div class="col-xs-12 padd-lr0 xs-padd marg-lg-b90 marg-lg-t70 marg-sm-t30">
                            <div class="wheel-header text-center">
                                <h5>book now</h5>
                                <h3>Make a <span>reservation</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row marg-lg-b20">
                        <div class="col-xs-12 padd-lr0 xs-padd marg-lg-b60 marg-sm-b10">
                            <div class="wheel-start-form wheel-start-form2">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <label for="input-val20"><span>Dropping Off</span>
                                        <input type="text" name="drop_off" id=input-val20 placeholder="ZIP, City, Airport or Address" required>
                                    </label>
                                    <label for="input-val21"><span>Picking Up</span>
                                        <input type="text" name="pick_up" id=input-val21 placeholder="ZIP, City, Airport or Address" required>
                                    </label>
                                    <div class="clearfix">
                                        <div class="wheel-date">
                                            <span>Pickup Date</span>
                                            <label class="fa fa-calendar" for="input-val22">
                                            <input class="datepicker" name="pick_date" type="text" id=input-val22 value="29 Apr">
                                            </label>
                                        </div>
                                        <div class="wheel-date ">
                                            <span>Pickup time</span>
                                            <label for="input-val23" class="fa fa-clock-o">
                                            <input class="timepicker" name="pick_time" type="text" id=input-val23 value="10:00 am">
                                            </label>
                                        </div>
                                        <div class="wheel-date">
                                            <span>Return Date</span>
                                            <label class="fa fa-calendar" for="input-val24">
                                            <input  class="datepicker" name="return_date" type="text" id=input-val24 value="29 Apr">
                                            </label>
                                        </div>
                                        <div class="wheel-date">
                                            <span>Return Time</span>
                                            <label for="input-val25" class="fa fa-clock-o">
                                            <input class="timepicker" name="return_time" type="text" id='input-val25' value="10:00 am">
                                            </label>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6 padd-lr0 xs-padd">
                            <div class="checkblock style-3">
                                <h5 class="title">Extras</h5>
                                @if (!is_null($extras->additional_driver))
                                    <label for="input-driver">
                                        <input type="checkbox" name="additional_driver" id='input-driver' value="{{ $extras->additional_driver }}" @if ($cDetails->features == $extras->additional_driver)
                                            checked
                                        @endif class="input-check">
                                        <span>Additional Driver</span>
                                        <span><b>{{ $extras->additional_driver }}</b>/Per Rental</span>
                                    </label>
                                @endif
                                @if (!is_null($extras->gps))
                                    <label for="input-gps">
                                        <input type="checkbox" name="gps" id='input-gps' class="input-check" value="{{ $extras->gps }}" @if ($cDetails->features == $extras->gps)
                                            checked
                                        @endif>
                                        <span>GPS</span>
                                        <span><b>{{ $extras->gps }}</b>/Per Day</span>
                                    </label>
                                @endif
                                @if (!is_null($extras->bicycle_rack))
                                    <label for="input-biy">
                                        <input type="checkbox" id='input-biy' name="bicycle_rack" class="input-check" value="{{ $extras->bicycle_rack }}" @if ($cDetails->features == $extras->bicycle_rack)
                                            checked
                                        @endif>
                                        <span>Biycicle Rack</span>
                                        <span><b>{{ $extras->bicycle_rack }}</b>/Per Rental</span>
                                    </label>
                                @endif
                                @if (!is_null($extras->music))
                                    <label for="input-gps2">
                                        <input type="checkbox" id='input-gps2' name="music" class="input-check" value="{{ $extras->music }}" @if ($cDetails->features == $extras->music)
                                            checked
                                        @endif>
                                        <span>Music</span>
                                        <span><b>{{ $extras->music }}</b>/Per Rental</span>
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 padd-lr0 xs-padd">
                            <div class="checkblock style-3">
                                <h5 class="title">Protection</h5>
                                @if (!is_null($protections->collision_damage_waiver))
                                    <label for="input-waiv">
                                        <input type="checkbox" id='input-waiv' class="input-check" value="{{ $protections->collision_damage_waiver }}" name="collision_damage_waiver" @if ($cDetails->features == $protections->collision_damage_waiver)
                                            checked
                                        @endif>
                                        <span>Collision Damage Waiver</span>
                                        <span><b>{{ $protections->collision_damage_waiver }}</b>/Per Rental</span>
                                    </label>
                                @endif
                                @if (!is_null($protections->theft_protection))
                                    <label for="input-protect">
                                        <input type="checkbox" id='input-protect' name="theft_protection" class="input-check" value="{{ $protections->theft_protection }}" @if ($cDetails->features == $protections->theft_protection)
                                            checked
                                        @endif>
                                        <span>Theft Protection</span>
                                        <span><b>{{ $protections->theft_protection }}</b>/Per Day</span>
                                    </label>
                                @endif
                                @if (!is_null($protections->rental_contact_fee))
                                    <label for="input-contract">
                                        <input type="checkbox" id='input-contract' class="input-check" value="{{ $protections->rental_contact_fee }}" name="rental_contact_fee" @if ($cDetails->features == $protections->rental_contact_fee)
                                            checked
                                        @endif>
                                        <span>Rental Contract Fee</span>
                                        <span><b>{{ $protections->rental_contact_fee }}</b>/Per Rental</span>
                                    </label>
                                @endif
                                @if (!is_null($protections->personal_first_aid_service))
                                    <label for="input-protect2">
                                        <input type="checkbox" id='input-protect2' class="input-check" value="{{ $protections->personal_first_aid_service }}" name="personal_first_aid_service" @if ($cDetails->features == $protections->personal_first_aid_service)
                                            checked
                                        @endif>
                                        <span>Personal First Aid Service</span>
                                        <span><b>{{ $protections->personal_first_aid_service }}</b>/Per Rental</span>
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row marg-lg-b80 marg-sm-b0">
                        <div class="col-xs-12 marg-lg-t30 marg-lg-b70 t-center">
                            <input type="hidden" name="car_id" value="{{ $cDetails->id }}" id="">
                            <button type="submit" name="reserve" class="wheel-btn type-2">Reserve Now</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection