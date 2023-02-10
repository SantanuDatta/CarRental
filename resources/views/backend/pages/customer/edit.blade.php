@extends('backend.layout.template')

@section('title', 'Edit Customer')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-compose-outline tx-70 lh-0"></i>
        <div>
        <h4>Edit Customer</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="row row-sm mg-b-20">
            <div class="col-sm-12">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white">
                        Edit Customer
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <form action="{{ route('customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Customer Name<span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control form-control-dark" name="name" value="{{ $customer->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Customer Email</label>
                                        <input type="email" name="email" class="form-control form-control-dark" value="{{ $customer->email }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Select A Role</label>
                                        <select name="role" class="form-control form-control-dark" id="">
                                            <option value="" hidden>Please Select Role</option>
                                            <option value="1" @if($customer->role == 1) selected @endif >Admin</option>
                                            <option value="2" @if($customer->role == 2) selected @endif >Customer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select A Status<span class="tx-danger">*</span></label>
                                        <select name="status" class="form-control form-control-dark" id="">
                                            <option value="" hidden>Please Select Status</option>
                                            <option value="1" @if($customer->status == 1) selected @endif >Active</option>
                                            <option value="0" @if($customer->status == 0) selected @endif >Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="editCustomer" class="btn btn-teal float-right">Update Customer</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div>
        </div>
    </div>
@endsection