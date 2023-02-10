<!-- /////////////////////////////// -->
<div class="wheel-subscribe wheel-bg2 wheel-bg-image">
    <div class="container ">
        <div class="row">
            <div class="col-md-6 padd-lr0">
                <div class="wheel-header">
                    <h3>Join Our Newsletter</h3>
                    <h5>Sign up for our free newsletters to receive latest news.</h5>
                </div>
            </div>
            <div class="col-md-6 padd-lr0">
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Email Adddress" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <button type="submit" name="subscribe" class="wheel-btn">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="wheel-footer">
    <img src="{{ asset('frontend/assets/images/bg4.jpg') }}" alt="" class="wheel-img">
    <div class="container">
        <div class="row">
            <div class="col-md-4  col-sm-6  padd-lr0">
                <div class="wheel-address">
                    <div class="wheel-footer-logo"><a href=""><img src="{{ asset('frontend/assets/images/logo2.png') }}" alt=""></a></div>
                    <ul>
                        @foreach ($settings as $setting)
                            <li><span><i class="fa fa-map-marker"></i>{{ $setting->address }}  </span>
                            </li>
                            <li><a href=""><span><i class="fa fa-phone"></i> {{ $setting->phone_no }}</span></a></li>
                            <li><a href=""><span><i class="fa fa-envelope"></i>{{ $setting->email }}</span></a></li>
                        @endforeach
                        
                    </ul>
                    <div class="wheel-soc">
                        <a href="" class="fa fa-twitter"></a>
                        <a href="" class="fa fa-facebook"></a>
                        <a href="" class="fa fa-linkedin"></a>
                        <a href="" class="fa fa-instagram"></a>
                        <a href="" class="fa fa-share-alt"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6  padd-lr0">
                <div class="wheel-footer-item">
                    <h3>Useful Links</h3>
                    <ul>
                        <li><a href="" class="">About us</a></li>
                        <li><a href="" class="">Contact Us</a></li>
                        <li><a href="" class="">Safety Recall</a></li>
                        <li><a href="" class="">Privacy policy</a></li>
                        <li><a href="" class="">Terms & condition</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6  padd-lr0">
                <div class="wheel-footer-item ">
                    <h3>Brands</h3>
                    <ul>
                        @foreach (App\Models\Brand::orderBy('name', 'asc')->take(5)->get() as $brand)
                            <li><a href="{{ route('brand.car', $brand->slug) }}" class="">{{ $brand->name }}</a></li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="wheel-footer-info wheel-bg6">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-6  padd-lr0"><span>&#169; WHEEL {{ date('Y') }} | All Rights Reserved</span></div>
            <div class="col-lg-5 col-sm-6 padd-lr0">
                <ul>
                    <li><a href="{{ route('home') }}"> Home</a></li>
                    <li><a href="{{ route('listing') }}"> Listings</a></li>
                    <li><a href="{{ route('about') }}"> About Us</a></li>
                    <li><a href="{{ route('contact') }}"> Contact Us</a></li>
                    <li><a href="{{ route('cart.manage') }}"> Added Listing</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>