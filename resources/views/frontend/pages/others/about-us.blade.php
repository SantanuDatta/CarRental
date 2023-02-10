@extends('frontend.layout.template')

@section('title', 'About Us')
@section('body-content')
    <div class="wheel-start3">
        <img src="{{ asset('frontend/assets/images/newsletter-bg.png') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>About Us</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">About Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /////////////////////////////////////////////////// -->
    <div class="container padd-lr0">
        <div class="row">
            <div class="col-md-6 ">
                <div class="wheel-info-img  marg-lg-t150 marg-lg-b150 marg-md-t100 marg-md-b100">
                    <img src="{{ asset('frontend/assets/images/Auto-car-logo-design-Graphics-5237528-1.jpg') }}" alt="" class="wheel-img">
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
@endsection