@extends('frontend.layout.template')

@section('title', 'Home')
@section('body-content')
    <div class="wheel-start">
        <img src="{{ asset('frontend/assets/images/bg-8-1.jpg') }}" alt="" class="wheel-img">
        <div class="container padd-lr0">
            <div class="col-lg-6 col-lg-push-6 ">
                <header class="wheel-header marg-lg-b100 marg-lg-t200  marg-md-b0 marg-md-t0">
                    <h1>We Are Wheel  </h1>
                    <h2>Search - Hire - Compare - Save</h2>
                    <span>We Help you Rent Car in 150+ Countries</span>
                </header>
            </div>
            <div class="col-lg-6 col-lg-pull-6  marg-lg-b100 marg-lg-t200  marg-md-b0 marg-md-t0">
                <div class="wheel-start-form search-form">
                    <form action="{{ route('search.listing') }}" method="POST">
                        @csrf
                        <label for="input-val11"><span>Car Name</span>
                            <input type="text" name="name" id='input-val11' placeholder="Porsche 911" required>
                            </label>
                        <div class="clearfix">
                            <div class="wheel-date">
                                <span>Pickup Date</span>
                                <label for="input-val13" class="fa fa-calendar">
                                <input  class="datepicker" name="pick_date" id='input-val13' type="text" value="29 Apr">
                                </label>
                            </div>
                            <div class="wheel-date">
                                <span>Return Date</span>
                                <label for="input-val15" class="fa fa-calendar">
                                <input  class="datepicker" name="return_date" id='input-val15' type="text" value="29 Apr">
                                </label>
                            </div>
                        </div>
                        <label class="promo promo2" >
                        <button type="submit" class="wheel-btn search-btn" style="margin-left: 0px;">Search</button> 
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////// -->
    <div class="wheel-bg2 wheel-bg-image">
        <div class="wheel-middle">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="wheel-header text-center marg-lg-t140 marg-lg-b200 marg-md-t140 marg-md-b140 marg-sm-t70 ">
                            <h5>the Biggest Online </h5>
                            <h3>car <span>Rental</span>  Service</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wheel-clients">
        <div class="container padd-lr0">
            <div class="row">
                <div class="col-md-4 padd-r0 padd-md-lr15">
                    <div class="wheel-service-item text-center wheel-bg3">
                        <div class="wheel-service-logo">
                            <img src="{{ asset('frontend/assets/images/ico1.png') }}" alt="">
                        </div>
                        <h5>Most Affordable</h5>
                        <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat </p>
                    </div>
                </div>
                <div class="col-md-4 padd-lr0 padd-md-lr15">
                    <div class="wheel-service-item text-center wheel-service-active wheel-bg4">
                        <div class="wheel-service-logo">
                            <img src="{{ asset('frontend/assets/images/ico2.png') }}" alt="">
                        </div>
                        <h5>Best Rated</h5>
                        <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat </p>
                    </div>
                </div>
                <div class="col-md-4 padd-l0 padd-md-lr15">
                    <div class="wheel-service-item  text-center wheel-bg5">
                        <div class="wheel-service-logo">
                            <img src="{{ asset('frontend/assets/images/ico3.png') }}" alt="">
                        </div>
                        <h5>Excellent Service</h5>
                        <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="wheel-service-img">
                    <img src="{{ asset('frontend/assets/images/31.png') }}" alt="" class="wheel-img">
                </div>
            </div>
        </div>
    </div>
    <!-- /////////////////////////////////////////////////// -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="wheel-header wheel-testi-header text-center marg-lg-t155 marg-lg-b65 marg-md-t50  marg-md-b50">
                    <h3>Our Mission is <span>Client’s</span> Satisfaction</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="wheel-testimonial text-center">
                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 padd-lr0 ">
                <div class="wheel-testimonial-item">
                    <i class="fa fa-users"></i>
                    <span data-to="753" data-speed="10000"></span><b>+</b>
                    <p>Dedicated Employees</p>
                </div>
                <div class="wheel-testimonial-item">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span data-to="9053" data-speed="5000"></span><b>+</b>
                    <p>Satisfied Customers</p>
                </div>
                <div class="wheel-testimonial-item">
                    <i class="fa  fa-car"></i>
                    <span data-to="529" data-speed="6000"></span><b>+</b>
                    <p>100% Fit Veihicles</p>
                </div>
                <div class="wheel-testimonial-item">
                    <i class="fa fa-trophy"></i>
                    <span data-to="111" data-speed="1000"></span><b>+</b>
                    <p>Int. Awards Achieved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////// -->
    <div class="container padd-lr0">
        <div class="row">
            <div class="col-md-6 ">
                <div class="wheel-info-img  marg-lg-t150 marg-lg-b150 marg-md-t100 marg-md-b100">
                    <img src="{{ asset('frontend/assets/images/img_07.jpg') }}" alt="" class="wheel-img">
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="wheel-info-text  marg-lg-t150 marg-lg-b150 marg-md-t100 marg-md-b100 marg-sm-t50 marg-sm-b50">
                    <div class="wheel-header">
                        <h5>Who we are  </h5>
                        <h3>We Love Our <span>Customers</span></h3>
                    </div>
                    <span>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. </span>
                    <p>Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam </p>
                    <a href="" class="wheel-btn">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //////////////////////////////////////////// -->
    <div class="wheel-quote text-center">
        <img src="{{ asset('frontend/assets/images/bg3.jpg') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="swiper-container" data-autoplay="7000" data-touch="1" data-mouse="0" data-xs-slides="1" data-sm-slides="1" data-md-slides="1" data-lg-slides="1" data-add-slides="1" data-slides-per-view="responsive" data-loop="1" data-speed="1000">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="wheel-quote-item">
                                    <h6>Catrina Romero</h6>
                                    <div class="wheel-quote-stars"><img src="{{ asset('frontend/assets/images/stars.png') }}" alt=""></div>
                                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wheel-quote-item">
                                    <h6>Catrina Romero</h6>
                                    <div class="wheel-quote-stars"><img src="{{ asset('frontend/assets/images/stars.png') }}" alt=""></div>
                                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wheel-quote-item">
                                    <h6>Catrina Romero</h6>
                                    <div class="wheel-quote-stars"><img src="{{ asset('frontend/assets/images/stars.png') }}" alt=""></div>
                                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                                </div>
                            </div>
                        </div>
                        <div class="pagination"></div>
                    </div>
                    <div class="swiper-outer-left fa fa-angle-left"></div>
                    <div class="swiper-outer-right fa fa-angle-right"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="wheel-quote-partners">
                        <a href=""><img src="{{ asset('frontend/assets/images/p1.png') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/assets/images/p2.png') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/assets/images/p3.png') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/assets/images/p4.png') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/assets/images/p5.png') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/assets/images/p6.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
