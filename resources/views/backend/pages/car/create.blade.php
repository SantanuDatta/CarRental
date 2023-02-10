@extends('backend.layout.template')

@section('title', 'Add A Car')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-plus-outline tx-70 lh-0"></i>
        <div>
        <h4>Add New Car</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="row row-sm mg-b-20">
            <div class="col-sm-12">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white">
                        Add A Car
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Car Name<span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Please Input Car Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Car Description</label>
                                        <textarea id="short_desc" name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Select A Brand </label>
                                        <select name="brand_id" class="form-control" id="">
                                            <option value="0" hidden>Please Select Brand If Needed</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rent Rate</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">৳</span>
                                            </div>
                                            <input type="number" name="rent" class="form-control" placeholder="Input Rent Price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Per Day</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Features</label><br>
                                        <input type="text" name="features" class="form-control" data-role="tagsinput" placeholder="Features Included With The Car Like AC, Seats">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select Available Status<span class="tx-danger">*</span></label>
                                        <select name="status" class="form-control" id="">
                                            <option value="" hidden>Please Select Status</option>
                                            <option value="1">Available</option>
                                            <option value="0">Not Available</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Upload Car Image</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" id="file" class="custom-file-input">
                                            <label class="custom-file-label custom-file-label-primary">Upload Image</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="addCar" class="btn btn-teal float-right">Add This Car</button>
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