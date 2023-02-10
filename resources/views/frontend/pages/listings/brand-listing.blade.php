@extends('frontend.layout.template')

@section('title', 'Rentals')
@section('body-content')
    <div class="wheel-start3">
        <img src="{{ asset('frontend/assets/images/newsletter-bg.png') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Branded Cars</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Branded Cars</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="prosuct-wrap">
        <div class="container padd-lr0 xs-padd">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="select select-1">
                        <span class="">All category</span>
                        <ul class="list">
                            <li>All category</li>
                            <li>Item1</li>
                            <li>Item2</li>
                            <li>Item3</li>
                            <li>Item4</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="select select-2">
                        <span class="">All brands</span>
                        <ul class="list">
                            <li>All brands</li>
                            <li>Item1</li>
                            <li>Item2</li>
                            <li>Item3</li>
                            <li>Item4</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="select select-3">
                        <span class="">Any price</span>
                        <ul class="list">
                            <li>Any price</li>
                            <li>Item1</li>
                            <li>Item2</li>
                            <li>Item3</li>
                            <li>Item4</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container padd-lr0 xs-padd">
            <div class="product-list product-list2 wheel-bgt clearfix">
                <div class="row">
                    <div class="col-xs-12">
                        @foreach (App\Models\Car::where('brand_id', $bDetails->id)->where('status', 1)->orderBy('id', 'desc')->get() as $car)
                            <div class="product-elem-style1 product-elem-style  wheel-bg1 clearfix">
                                <div class="product-table2">
                                    <div class="img-wrap img-wrap2 product-cell">
                                        <img src="{{ asset('backend/img/cars/'. $car->image) }}" alt="img" class="img-responsive">
                                    </div>
                                </div>
                                <div class="product-table3  ">
                                    <div class="text-wrap text-wrap2 product-cell">
                                        <div class="title">{{ $car->name }}</div>
                                        <div class="price-wrap product-cell">
                                            <span>{{ $car->rent }}</span>/Day
                                        </div>
                                    </div>
                                    <div class="text-wrap text-wrap2 product-cell">
                                        <span>{!! Str::limit($car->description, 150, '...') ?? 'N/A' !!}</span>
                                    </div>
                                    <div class="text-wrap text-wrap2 product-cell">
                                        <ul class="metadata metadata2">
                                            @foreach (explode(",", $car->features) as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                            <div><br>
                                                <a href="{{ route('single.list', $car->slug) }}" class="wheel-cheader-but">View Details</a>
                                            </div>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0 text-center">
                    <div class="wheel-page-pagination marg-lg-t60 marg-lg-b25  ">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection