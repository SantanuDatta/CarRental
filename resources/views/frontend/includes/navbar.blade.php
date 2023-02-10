{{-- <div class="load-wrap">
    <div class="wheel-load">
        <img src="{{ asset('frontend/assets/images/loader.gif') }}" alt="" class="image">
    </div>
</div> --}}
<div class="wheel-menu-wrap ">
    <div class="container-fluid wheel-bg1">
        <div class="row">
            <div class="col-sm-3">
                <div class="wheel-logo">
                    @foreach ($settings as $setting)
                        <a href="{{ route('home') }}"><img src="{{ asset('backend/img/settings/logo/'.$setting->logo) }}" alt=""></a>
                    @endforeach
                    
                </div>
            </div>
            <div class="col-sm-9 col-xs-12 padd-lr0">
                <div class="wheel-top-menu clearfix">
                    <div class="wheel-top-menu-info">
                        @foreach ($settings as $setting)
                            <div class="top-menu-item"><a href=""><i class="fa fa-phone"></i><span>{{ $setting->phone_no }}</span></a></div>
                            <div class="top-menu-item"><a href=""><i class="fa fa-envelope"></i><span>{{ $setting->email }}</span></a></div>
                        @endforeach
                    </div>
                    <div class="wheel-top-menu-log">
                        <div class="top-menu-item">
                            <div class="dropdown wheel-user-ico">
                                @if (Auth::check())
                                    
                                    <button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('user.reserve') }}">Reservation</a></li>
                                        @if (Auth::user()->role == 1)
                                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        @else
                                            <li><a href="{{ route('user.setting', Auth::user()->slug) }}">Settings</a></li>
                                        @endif
                                        
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" style="padding-left: 20px;">{{ __('Log Out') }}</a> 
                                                </form>
                                            </li>
                                    </ul>
                                @else
                                    <button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Account
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('login') }}">Login / Register</a></li>
                                    </ul>
                                    <span class="caret"></span>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 ">
                <div class="wheel-navigation">
                    <nav id="dl-menu">
                        <!-- class="dl-menu" -->
                        <ul class="main-menu dl-menu">
                            <li class="menu-item @if (Route::is('home'))
                                active-color
                            @endif">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="menu-item @if (Route::is('listing') || Route::is('single.list'))
                                active-color
                            @endif"">
                                <a href="{{ route('listing') }}"> Cars </a>
                            </li>
                            <li class="menu-item @if (Route::is('about'))
                                active-color
                            @endif">
                                <a href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="menu-item @if (Route::is('contact'))
                                active-color
                            @endif">
                                <a href="{{ route('contact') }}">Contact Us</a>
                            </li>
                        </ul>
                        <div class="nav-menu-icon"><i></i></div>
                    </nav>
                    <a href="{{ route('cart.manage') }}" class="wheel-cheader-but">Your Added Listing</a>
                </div>
            </div>
        </div>
    </div>
</div>