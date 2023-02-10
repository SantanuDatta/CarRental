@extends('frontend.layout.template')

@section('title', 'Account Setting')
@section('body-content')
    <!-- //////////////////////////////// -->
    <div class="wheel-start3">
        <img src="{{ asset('frontend/assets/images/newsletter-bg.png') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Account Settings</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Settings</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-wrap big-img-fix" style="padding-bottom: 140px">
        <!-- ////////////////////////////////////////// -->
        <div class="container padd-lr0 xs-padd" style="padding: 50px;background: #eceff1;">
            <div class="row">
                <div class="col-xs-12 pad-r col-md-12">
                    <div class="headlines1">
                        personal info
                    </div>
                    <div class="form-2 marg-lg-b25">
                        <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                            @csrf
                        <input type="text" class="f-input" name="name" style="width:100%;"
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
                        <input type="text" class="f-input" name="email" style="width:48%;"
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
                        <input type="text" class="f-input f-right" name="phone" style="width:48%;"
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
                        <select class="f-input" id="divisions" name="division_id" style="background: #fff; width:48%;">
                        <option value="">Please Select Division</option>
                            @foreach ($divisions as $division)
                                @if (Auth::check())
                                    @if (!is_null(Auth::user()->division_id))
                                        <option value="{{ $division->id }}" @if ($division->id == Auth::user()->division_id) selected @endif>{{ $division->name }}</option>
                                    @else
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <select class="f-input f-right" name="district_id" id="districts" style="background: #fff; width:48%;">
                            <option value="">Please Select District</option>
                        </select>
                        <input type="text" class="f-input"  name="address_one" style="width:48%;"
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
                        <input type="text" class="f-input f-right"  name="address_two" style="width:48%;"
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
                        <input type="text" class="f-input"  style="width: 100%;" name="post_code"
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
                    </div>
                    <a href="{{ route('user.reserve') }}" name="reservations" class="wheel-btn">Your Reservations</a>
                    <button type="submit" name="updateUser" class="wheel-btn" style="float: right;">Update Settings</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pageScripts')
    <script>
        //Showing Saved locations From Database
        var savedDivisionId = "{{ $savedDivisionId}}";
        var savedDistrictId = "{{ $savedDistrictId}}";

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