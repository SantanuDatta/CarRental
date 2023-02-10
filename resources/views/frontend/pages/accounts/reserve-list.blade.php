@extends('frontend.layout.template')

@section('title', 'Reserve List')
@section('body-content')
    <!-- //////////////////////////////// -->
    <div class="wheel-start3">
        <img src="{{ asset('frontend/assets/images/newsletter-bg.png') }}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Reserve List</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Reserve List</li>
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
                <div class="col-xs-12 pad-r col-md-12">
                    @if ($orderHistory->count() == 0)
                        <div class="alert alert-info">{{ __('You Havent Ordered Anything Yet!') }}</div>
                    @else
                        <div class="table-responsive table-bordered" style="padding: 50px;background: #eceff1;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Rented Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(Auth::check())
                                        @foreach ($orderHistory as $item)
                                            <tr>
                                                <td>#{{ $item->inv_id }}</td>
                                                <td>{{ $item->created_at->toFormattedDateString() }}</td>
                                                <td>
                                                    @if($item->status == 1) 
                                                        Pending
                                                    @elseif ($item->status == 2)
                                                        Proceesing 
                                                    @elseif ($item->status == 3)
                                                        Success
                                                    @elseif ($item->status == 4)
                                                        Failed 
                                                    @elseif ($item->status == 5)
                                                        Cancelled 
                                                    @endif
                                                </td>
                                                <td>{{ $item->amount }} {{ __('BDT') }} </td>
                                                <td><a href="{{ route('reservation', $item->inv_id) }}" class="btn-small d-block">View</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection