@extends('frontend.layout.template')

@section('title', 'Reserve Details')
@section('body-content')
    <!-- //////////////////////////////// -->
    <div class="wheel-start3">
        <img src="{{ asset('frontend/assets/images/newsletter-bg.png') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Reservation Receipt</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Reservation Receipt</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-wrap big-img-fix" style="padding-bottom: 140px">
        <!-- ////////////////////////////////////////// -->
        <div class="container padd-lr0 xs-padd">
            <div class="row">
                <div class="col-xs-12 mar-r col-md-6" style="padding-right: 0px;">
                    <div class="r-return-block type-2">
                        <h5 class="title">Pick-up</h5>
                        @foreach (App\Models\Cart::orderBy('id', 'asc')->where('order_id', $reserve->id)->get() as $item)
                            <div class="date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->pick_date)->format('l j F Y') }}, {{ $item->pick_time }}</div>
                            <div class="address">{{ $item->pick_up }} -- {{ $item->car->name }}</div><br>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 pad-r col-md-6" style="padding-left: 0px;">
                    <div class="r-return-block type-2">
                        <h5 class="title">Return</h5>
                        @foreach (App\Models\Cart::orderBy('id', 'asc')->where('order_id', $reserve->id)->get() as $item)
                            <div class="date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->return_date)->format('l j F Y') }}, {{ $item->return_time }}</div>
                            <div class="address">{{ $item->drop_off }} -- {{ $item->car->name }}</div><br>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 pad-r col-md-12">
                    <div class="r-return-block type-2 style-3">
                        <div class="text-wrap">
                            @foreach (App\Models\Cart::orderBy('id', 'asc')->where('order_id', $reserve->id)->get() as $item)
                            <div class="t-title">{{ $item->car->brand->name }} {{ $item->car->name }}</div>
                            <ul class="metadata">
                                @foreach (explode(",", $item->car->features) as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="checkblock type-2">
                        <h5 class="title">Rented Car And Choosen Options</h5>
                        @php
                            $totalRent = 0;
                            $totalAmount = 0;
                        @endphp
                        @foreach (App\Models\Cart::orderBy('id', 'asc')->where('order_id', $reserve->id)->get() as $item)
                            @php
                                if ($item->days == 0) {
                                    $item->days = 1;
                                }
                            @endphp
                            <label>
                                <span>{{ $item->car->brand->name }} {{ $item->car->name }}</span>
                                <span><b> ({{ $item->car->rent }} x {{ $item->days }} days) BDT </b>/Per Rental</span>
                            </label>
                            @if (!is_null($item->additional_driver))
                                <label>
                                    <span>Additional Driver</span>
                                    <span><b>{{ $item->additional_driver }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($item->gps))
                                <label>
                                    <span>GPS</span>
                                    <span><b>({{ $item->gps }} x {{ $item->days }} days) BDT</b>/Per Day</span>
                                </label>
                            @endif
                            @if (!is_null($item->bicycle_rack))
                                <label>
                                    <span>Bicycle Rack</span>
                                    <span><b>{{ $item->bicycle_rack }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($item->music))
                                <label>
                                    <span>Music</span>
                                    <span><b>{{ $item->music }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($item->collision_damage_waiver))
                                <label>
                                    <span>Collision Damage Waiver</span>
                                    <span><b>{{ $item->collision_damage_waiver }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($item->theft_protection))
                                <label>
                                    <span>Theft Protection</span>
                                    <span><b>({{ $item->theft_protection }} x {{ $item->days }} days) BDT</b>/Per Day</span>
                                </label>
                            @endif
                            @if (!is_null($item->rental_contact_fee))
                                <label>
                                    <span>Rental Contact Fee</span>
                                    <span><b>{{ $item->rental_contact_fee }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($item->personal_first_aid_service))
                                <label>
                                    <span>Personal First Aid Service</span>
                                    <span><b>{{ $item->personal_first_aid_service }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @php
                                $totalRent += ($item->car->rent * $item->days) * $item->car_quantity;
                                $totalAmount += ($item->additional_driver * $item->car_quantity) + 
                                (($item->gps * $item->days) * $item->car_quantity) + 
                                ($item->bicycle_rack * $item->car_quantity) + 
                                ($item->music * $item->car_quantity) + 
                                ($item->collision_damage_waiver * $item->car_quantity) + 
                                (($item->theft_protection * $item->days) * $item->car_quantity) + 
                                ($item->rental_contact_fee * $item->car_quantity) + 
                                ($item->personal_first_aid_service * $item->car_quantity)
                            @endphp
                        @endforeach
                    </div>
                    <div class="payment">
                        <div class="headlines1">
                            Payment method
                        </div>
                        <p class="font-sm">
                            @if ($reserve->payment_method == 1)
                                <strong>Cash On Delivery</strong>
                            @elseif ($reserve->payment_method == 2)
                                <strong>Paid Through SSL Commerz</strong><br>
                                <strong>Transaction Id: <u class="text-brand">{{ $reserve->transaction_id }}</u></strong> 
                            @endif
                        </p><br>
                        <div class="total clearfix">
                            @if ($reserve->payment_method == 1)
                                <div class="title">
                                    @if ($reserve->status == 3)
                                        Amount Has Been Paid
                                    @else
                                        Amount Need To Be Paid At The Counter
                                    @endif
                                </div>
                                <div class="price">{{ $totalAmount + $totalRent }} BDT</div>
                            @elseif ($reserve->payment_method == 2)
                                <div class="title">
                                    Amount Has Been Paid
                                </div>
                                <div class="price">{{ $totalAmount + $totalRent }} BDT</div>
                            @endif
                        </div>
                    </div><br>
                    <a href="{{ route('user.reserve') }}" name="reservations" class="wheel-btn">Your Reservation List</a>
                </div>
                
            </div>
        </div>
    </div>
@endsection