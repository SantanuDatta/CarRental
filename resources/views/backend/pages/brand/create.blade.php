@extends('backend.layout.template')

@section('title', 'Add A Brand')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-plus-outline tx-70 lh-0"></i>
        <div>
        <h4>Add New Brand</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="row row-sm mg-b-20">
            <div class="col-sm-12">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white">
                        Add Brand
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Brand Name<span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Please Input Brand Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Brand Description</label>
                                        <textarea id="short_desc" name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Select Available Status<span class="tx-danger">*</span></label>
                                        <select name="status" class="form-control" id="">
                                            <option value="" hidden>Please Select Status</option>
                                            <option value="1">Available</option>
                                            <option value="0">Not Available</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Upload Brand Image (Must Be 300X300 & 1MB)</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" id="file" class="custom-file-input">
                                            <label class="custom-file-label custom-file-label-primary">Upload Image</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="addBrand" class="btn btn-teal float-right">Add This Brand</button>
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