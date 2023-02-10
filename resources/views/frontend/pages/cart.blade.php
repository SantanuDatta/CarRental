@extends('frontend.layout.template')

@section('title', 'Cart')
@section('body-content')
    <!-- ////////////////////////////////////////////////////////////// -->
    <div class="wheel-start3">
        <img src="{{ asset('frontend/assets/images/newsletter-bg.png') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Shopping Cart</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////// -->
    @if (App\Models\Cart::totalCars() == 0)
        <div class="container">
            <div class="row marg-lg-t40 marg-lg-b40 marg-xs-b40">
                <div class="col-xs-12">
                    <div class="alert alert-info">No Cars Have Been Reserved</div>
                    <div class="s-cart-options">
                        <a href="{{ route('listing') }}" class="wheel-btn large pull-right">Reserve Cars</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container no-padding">
            <div class="row ">
                <div class="col-xs-12">
                    <div class="table-responsive wheel-cart">
                        <table class="wheel-table-cart marg-lg-t140 marg-md-t100 marg-sm-t80 marg-xs-t60">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Reserve Car</th>
                                    <th>Reserve Date/Time</th>
                                    <th>Rent/Day</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalRent = 0;
                                    $totalAmount = 0;
                                    
                                @endphp
                                @foreach (App\Models\Cart::totalCarts() as $cart)
                                    <tr>
                                        <td>
                                            <form action="{{ route('cart.destroy',$cart->id) }}" method="POST">
                                            @csrf
                                                <input type="submit" class="cart-destroy" value="❌" name="deleteCart"></i>
                                            </form>
                                        </td>
                                        <td>
                                            <img src="{{ asset('backend/img/cars/'.$cart->car->image) }}" alt="" class="img">
                                        </td>
                                        <td>{{ $cart->car->name }}</td>
                                        <td><small>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$cart->pick_date)->format('d/m/Y') }} - {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$cart->return_date)->format('d/m/Y') }}</small> <br><small>{{ $cart->pick_time }} - {{ $cart->return_time }}</small></td>
                                        <td>{{ $cart->car->rent }} BDT</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="wheel-order-price marg-lg-t40 marg-lg-b40 marg-xs-b40">
                        <div class="wheel-header ">
                            <h5>Total For Reservation</h5>
                        </div>
                        <ul>
                            @foreach (App\Models\Cart::totalCarts() as $cart)
                            @php
                                if ($cart->days == 0) {
                                    $cart->days = 1;
                                }
                            @endphp
                                <li class="clearfix"><span>{{ $cart->car->brand->name }} {{ $cart->car->name }} ({{ $cart->car->rent}} x {{ $cart->days }} days)</span><b>{{ $cart->car->rent * $cart->days }} BDT</b></li>
                                @if (!is_null($cart->additional_driver))
                                    <li class="clearfix"><span>{{ $cart->car->name }} - Additional Driver </span><b>{{ $cart->additional_driver }} BDT</b></li>
                                @endif
                                @if (!is_null($cart->gps))
                                    <li class="clearfix"><span>{{ $cart->car->name }} - Gps ({{ $cart->gps }} x {{ $cart->days }} days)</span><b>{{ $cart->gps * $cart->days }} BDT</b></li>
                                @endif
                                @if (!is_null($cart->bicycle_rack))
                                    <li class="clearfix"><span>{{ $cart->car->name }} - Bicycle Rack </span><b>{{ $cart->bicycle_rack }} BDT</b></li>
                                @endif
                                @if (!is_null($cart->music))
                                    <li class="clearfix"><span>{{ $cart->car->name }} - Music </span><b>{{ $cart->music }} BDT</b></li>
                                @endif
                                @if (!is_null($cart->collision_damage_waiver))
                                    <li class="clearfix"><span>{{ $cart->car->name }} - Collision Damage Waiver </span><b>{{ $cart->collision_damage_waiver }} BDT</b></li>
                                @endif
                                @if (!is_null($cart->theft_protection))
                                    <li class="clearfix"><span>{{ $cart->car->name }} - Theft Protection ({{ $cart->theft_protection }} X {{ $cart->days }} days)</span><b>{{ $cart->theft_protection * $cart->days }} BDT</b></li>
                                @endif
                                @if (!is_null($cart->rental_contact_fee))
                                    <li class="clearfix"><span>{{ $cart->car->name }} - Rental Contact Fee </span><b>{{ $cart->rental_contact_fee }} BDT</b></li>
                                @endif
                                @if (!is_null($cart->personal_first_aid_service))
                                    <li class="clearfix"><span>{{ $cart->car->name }} - Personal First Aid Service </span><b>{{ $cart->personal_first_aid_service }} BDT</b></li>
                                @endif
                                @php
                                    $totalRent += ($cart->car->rent * $cart->days) * $cart->car_quantity;
                                    $totalAmount += ($cart->additional_driver * $cart->car_quantity) + 
                                    (($cart->gps * $cart->days) * $cart->car_quantity) + 
                                    ($cart->bicycle_rack * $cart->car_quantity) + 
                                    ($cart->music * $cart->car_quantity) + 
                                    ($cart->collision_damage_waiver * $cart->car_quantity) + 
                                    (($cart->theft_protection * $cart->days) * $cart->car_quantity) + 
                                    ($cart->rental_contact_fee * $cart->car_quantity) + 
                                    ($cart->personal_first_aid_service * $cart->car_quantity)
                                @endphp
                            @endforeach
                            <li class="clearfix wheel-total">
                                <h4>Estimated Total</h4>
                                <b>{{ $totalAmount + $totalRent }} BDT</b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row marg-lg-t30 marg-lg-b150 marg-sm-b100">
                <div class="col-xs-12">
                    <div class="s-cart-options">
                        <a href="{{ route('checkout') }}" class="wheel-btn large pull-right">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
@endsection