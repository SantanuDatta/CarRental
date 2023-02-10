@extends('frontend.layout.template')

@section('title', 'Contact Us')
@section('body-content')
    <!-- //////////////////////////////// -->
    <div class="wheel-start3">
        <img src="{{ asset('frontend/assets/images/newsletter-bg.png') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Get in touch</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //////////////////////////////// -->
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="wheel-contact-info text-center marg-lg-t150 marg-lg-b50 marg-xs-t50 marg-xs-b50">
                    <div class="wheel-contact-logo"><i class="fa fa-map-marker"></i></div>
                    <h4>Address</h4>
                    <span>121 King Street, Melbourne VIC 3000 Australia</span>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wheel-contact-info text-center marg-lg-t150 marg-lg-b50 marg-xs-t50 marg-xs-b50">
                    <div class="wheel-contact-logo"><i class="fa fa-phone"></i></div>
                    <h4>telePhone</h4>
                    <a href=""><span>(+61)  3 8376 6284</span></a>
                    <a href=""><span>(+61)  3 8376 6284</span></a>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wheel-contact-info text-center marg-lg-t150 marg-lg-b50 marg-xs-t50 marg-xs-b50">
                    <div class="wheel-contact-logo"><i class="fa fa-mobile"></i></div>
                    <h4>Fax</h4>
                    <a href=""><span>(+61)  3 8376 6284 </span></a>
                    <a href=""><span>(+61)  3 8376 6284 </span></a>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wheel-contact-info text-center marg-lg-t150 marg-lg-b50 marg-xs-t50 marg-xs-b50">
                    <div class="wheel-contact-logo"><i class="fa fa-envelope"></i></div>
                    <h4>Email</h4>
                    <a href=""><span>info@wheelrental.com</span></a>
                    <a href=""><span>info@wheelrental.com</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////// -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12" style="padding: 20px; background-color:#E9EDF0;">
                <div class="wheel-header text-center marg-lg-t85 marg-lg-b90  marg-md-t50">
                    <h5>Say Hello! </h5>
                    <h3>Send Us a <span>Message</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 padd-lr0" style="padding:20px; background-color:#E9EDF0;">
                <div class="wheel-contact-form text-center marg-lg-b145">
                    <div class="form">
                        <input type="text" placeholder="Your Name *">
                        <input type="text" placeholder="Your Email *">
                        <input type="text" placeholder="Your URL (Optional)">
                        <input type="text" placeholder="Subject*">
                        <textarea   placeholder="Message *"></textarea>
                        <button class="wheel-btn">Submit Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ///////////////////////////////////// -->
    <div class="container-fluid padd-lr0">
        <div class="row">
            <div class="col-xs-12 padd-lr0">
                <div 
                    class="wheel-map" 
                    data-lat="45.7143528" 
                    data-lng="-74.0059731"  
                    data-marker="images/marker.png" 
                    data-zoom="10" 
                    data-style="style-1"
                    ></div>
            </div>
        </div>
    </div>
@endsection