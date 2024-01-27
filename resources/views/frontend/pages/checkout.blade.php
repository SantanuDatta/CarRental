@extends('frontend.layout.template')

@section('title', 'Checkout')
@section('body-content')
    <!-- //////////////////////////////// -->
    <div class="wheel-start3">
        <img src="{{ asset('frontend/assets/images/newsletter-bg.png') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Checkout</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('cart.manage') }}"> Cart </a></li>
                            <li class="active">Checkout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////// -->
    <div class="product-wrap">
        <!-- ////////////////////////////////////////// -->
        <div class="container padd-lr0 xs-padd">
            <div class="row">
                <div class="col-xs-12 pad-r col-md-6">
                    <div class="headlines1">
                        personal info
                    </div>
                    <div class="form-2 marg-lg-b25">
                        <form action="{{ route('make.payment') }}" method="POST">
                            @csrf
                        <input type="text" class="f-input" name="name" style="width:100%;" required
                        @if (Auth::check())
                            @if (Auth::user()->name)
                                value = "{{ Auth::user()->name }}"
                            @else
                                placeholder="Enter Your Name"
                            @endif
                        @else
                            placeholder="Enter Your Name"
                        @endif
                        >
                        <input type="email" class="f-input" name="email" 
                        @if (Auth::check())
                            @if (Auth::user()->email)
                                value = "{{ Auth::user()->email }}"
                                readonly
                            @else
                                placeholder="Enter Your Email"
                            @endif
                        @else 
                            placeholder="Enter Your Email"
                        @endif
                        >
                        <input type="text" class="f-input f-right" name="phone" required
                        @if (Auth::check())
                            @if (Auth::user()->phone)
                                value = "{{ Auth::user()->phone }}"
                            @else
                                placeholder="Enter Your Phone No"
                            @endif
                        @else
                            placeholder="Enter Your Phone No"
                        @endif
                        >
                        <select class="f-input" id="divisions" name="division_id" style="background: #fff"; required>
                        <option value="">Please Select Division</option>
                        @if(Auth::check())
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}" @if ($division->id == Auth::user()->division_id) selected @endif>{{ $division->name }}</option>
                            @endforeach
                        @else
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        @endif
                        </select>
                        <select class="f-input f-right" name="district_id" id="districts" style="background: #fff"; required>
                            <option value="" hidden>Please Select District</option>
                        </select>
                        <input type="text" class="f-input"  name="address_one" required
                        @if (Auth::check())
                            @if (Auth::user()->address_one)
                                value = "{{ Auth::user()->address_one }}"
                            @else
                                placeholder="Address Line 1"
                            @endif
                        @else
                            placeholder="Address Line 1"
                        @endif
                        >
                        <input type="text" class="f-input f-right"  name="address_two"
                        @if (Auth::check())
                            @if (Auth::user()->address_two)
                                value = "{{ Auth::user()->address_two }}"
                            @else
                                placeholder="Address Line 2"
                            @endif
                        @else
                            placeholder="Address Line 2"
                        @endif
                        >
                        <input type="text" class="f-input"  style="width: 100%;" name="post_code" required
                        @if (Auth::check())
                            @if (Auth::user()->post_code)
                                value = "{{ Auth::user()->post_code }}"
                            @else
                                placeholder="ZIP / Postcode"
                            @endif
                        @else
                            placeholder="ZIP / Postcode"
                        @endif
                        >
                        <textarea class="f-input" style="width: 100%;" name="add_info" placeholder="Notes about your order "></textarea>
                    </div>
                    <div class="r-return-block type-2">
                        <h5 class="title">Pick-up</h5>
                        @foreach (App\Models\Cart::totalCarts() as $cart)
                            <div class="date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$cart->pick_date)->format('l j F Y') }}, {{ $cart->pick_time }}</div>
                            <div class="address">{{ $cart->pick_up }} -- {{ $cart->car->name }}</div><br>
                        @endforeach
                    </div>
                    <div class="r-return-block type-2">
                        <h5 class="title">Return</h5>
                        @foreach (App\Models\Cart::totalCarts() as $cart)
                            <div class="date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$cart->return_date)->format('l j F Y') }}, {{ $cart->return_time }}</div>
                            <div class="address">{{ $cart->drop_off }} -- {{ $cart->car->name }}</div><br>
                        @endforeach
                    </div>
                    <div class="r-return-block type-2 style-3">
                        <div class="text-wrap">
                            @foreach (App\Models\Cart::totalCarts() as $cart)
                            <div class="t-title">{{ $cart->car->brand->name }} {{ $cart->car->name }}</div>
                            <ul class="metadata">
                                @foreach (explode(",", $cart->car->features) as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="checkblock type-2">
                        <h5 class="title">Choosen Options</h5>
                        @php
                            $totalRent = 0;
                            $totalAmount = 0;
                        @endphp
                        @foreach (App\Models\Cart::totalCarts() as $cart)
                            @if (!is_null($cart->additional_driver))
                                <label>
                                    <span>Additional Driver</span>
                                    <span><b>{{ $cart->additional_driver }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($cart->gps))
                                <label>
                                    <span>GPS</span>
                                    <span><b>{{ $cart->gps }} BDT</b>/Per Day</span>
                                </label>
                            @endif
                            @if (!is_null($cart->bicycle_rack))
                                <label>
                                    <span>Bicycle Rack</span>
                                    <span><b>{{ $cart->bicycle_rack }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($cart->music))
                                <label>
                                    <span>Music</span>
                                    <span><b>{{ $cart->music }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($cart->collision_damage_waiver))
                                <label>
                                    <span>Collision Damage Waiver</span>
                                    <span><b>{{ $cart->collision_damage_waiver }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($cart->theft_protection))
                                <label>
                                    <span>Theft Protection</span>
                                    <span><b>{{ $cart->theft_protection }} BDT</b>/Per Day</span>
                                </label>
                            @endif
                            @if (!is_null($cart->rental_contact_fee))
                                <label>
                                    <span>Rental Contact Fee</span>
                                    <span><b>{{ $cart->rental_contact_fee }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                            @if (!is_null($cart->personal_first_aid_service))
                                <label>
                                    <span>Personal First Aid Service</span>
                                    <span><b>{{ $cart->personal_first_aid_service }} BDT</b>/Per Rental</span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 pad-l col-md-6">
                    <div class="headlines1">
                        Your order
                    </div>
                    <ul class="order clearfix marg-lg-b40 marg-xs-b10">
                        @foreach (App\Models\Cart::totalCarts() as $cart)
                            @php
                                if ($cart->days == 0) {
                                    $cart->days = 1;
                                }
                            @endphp
                            <li class="item clearfix">
                                <div class="title">{{ $cart->car->brand->name }} {{ $cart->car->name }} <span>({{ $cart->car->rent }} x {{ $cart->days }} days)</span></div>
                                <span>{{ $cart->car->rent * $cart->days}} BDT</span>
                            </li>
                            @if (!is_null($cart->additional_driver))
                                <li class="item clearfix">
                                    <div class="title">{{ $cart->car->name }} - Additional Driver <span></span></div>
                                    <span>{{ $cart->additional_driver }} BDT</span>
                                </li>
                            @endif
                            @if (!is_null($cart->gps))
                                <li class="item clearfix">
                                    <div class="title">{{ $cart->car->name }} - Gps <span>({{ $cart->gps }} x {{ $cart->days }} days)</span></div>
                                    <span>{{ $cart->gps * $cart->days}} BDT</span>
                                    
                                </li>
                            @endif
                            @if (!is_null($cart->bicycle_rack))
                                <li class="item clearfix">
                                    <div class="title">{{ $cart->car->name }} - Bicycle Rack <span></span></div>
                                    <span>{{ $cart->bicycle_rack }} BDT</span>
                                </li>
                            @endif
                            @if (!is_null($cart->music))
                                <li class="item clearfix">
                                    <div class="title">{{ $cart->car->name }} - Music <span></span></div>
                                    <span>{{ $cart->music }} BDT</span>
                                </li>
                            @endif
                            @if (!is_null($cart->collision_damage_waiver))
                                <li class="item clearfix">
                                    <div class="title">{{ $cart->car->name }} - Collision Damage Waiver <span></span></div>
                                    <span>{{ $cart->collision_damage_waiver }} BDT</span>
                                </li>
                            @endif
                            @if (!is_null($cart->theft_protection))
                                <li class="item clearfix">
                                    <div class="title">{{ $cart->car->name }} - Theft Protection <span>({{ $cart->theft_protection }} x {{ $cart->days }} days)</span></div>
                                    <span>{{ $cart->theft_protection * $cart->days }} BDT</span>
                                </li>
                            @endif
                            @if (!is_null($cart->rental_contact_fee))
                                <li class="item clearfix">
                                    <div class="title">{{ $cart->car->name }} - Rental Contact Fee <span></span></div>
                                    <span>{{ $cart->rental_contact_fee }} BDT</span>
                                </li>
                            @endif
                            @if (!is_null($cart->personal_first_aid_service))
                                <li class="item clearfix">
                                    <div class="title">{{ $cart->car->name }} - Personal First Aid Service </div>
                                    <span>{{ $cart->personal_first_aid_service }} BDT</span>
                                </li>
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
                    </ul>
                    <div class="payment">
                        <div class="headlines1">
                            Payment method
                        </div>
                        <input name="payment_method" id="pay1" type="radio" value="1" checked>
                        <label for="pay1">Pay at Rental Counter</label>
                        <input name="payment_method" id="pay2" type="radio" value="2">
                        <label for="pay2">Pay Online</label>
                        <div class="total clearfix">
                            <div class="title">Estimated Total</div>
                            <div class="price">{{ $totalAmount + $totalRent }} BDT</div>
                        </div>
                        <div class="agree">
                            <input type="checkbox" class="input-check" value="yes">
                            I agree with the <a href="#">Terms and Conditions</a>
                        </div>
                        <input type="hidden" name="total_amount" value="{{ $totalAmount + $totalRent }}" id="">
                        <button type="submit" name="order" class="wheel-btn">Book It Now</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////// -->
    </div>
@endsection

@section('pageScripts')
    <script>
        //Showing Saved locations From Database
        var savedDivisionId = "{{ $savedDivisionId }}";
        var savedDistrictId = "{{ $savedDistrictId }}";

        //Trggering and Changing
        $("#divisions").val(savedDivisionId);
        $("#divisions").trigger("change");
        $("#districts").val(savedDistrictId);
        
        $('#divisions').on('change', function(){
            var division = $('#divisions').val();
            // Make All The Dsitrict As Null
            $('#districts').html("");
            var option = "";
            $.get("/districts/" + division, function(data){
                data = JSON.parse(data);
                data.forEach(function(value){
                    option += "<option value=' " + value.id + " '>" + value.name + "</option>";
                });
                $('#districts').html(option);
            })
        });
        $('#divisions').trigger('change');
    </script>
@endsection