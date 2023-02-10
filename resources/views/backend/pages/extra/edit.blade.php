@extends('backend.layout.template')

@section('title', 'Edit Extras')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-plus-outline tx-70 lh-0"></i>
        <div>
        <h4>Edit This Extra</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="row row-sm mg-b-20">
            <div class="col-sm-12">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white">
                        Edit Extra
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <form action="{{ route('extra.update', $extra->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Car Model</label>
                                        <select name="car_id" id="" class="form-control">
                                            <option value="" hidden>Select Car Model</option>
                                            @foreach ($cars as $car)
                                                <option value="{{ $car->id }}" @if ($extra->car_id == $car->id) selected @endif>{{ $car->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Additional Driver</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">৳</span>
                                            </div>
                                            <input type="number" name="additional_driver" class="form-control" value="{{ $extra->additional_driver }}" placeholder="Input Driver Price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Per Rental</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">GPS</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">৳</span>
                                            </div>
                                            <input type="number" name="gps" class="form-control" value="{{ $extra->gps }}" placeholder="Input Gps Price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Per Day</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Biycicle Rack</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">৳</span>
                                            </div>
                                            <input type="number" name="bicycle_rack" class="form-control" value="{{ $extra->bicycle_rack }}" placeholder="Input Rack Price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Per Rental</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Music</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">৳</span>
                                            </div>
                                            <input type="number" name="music" class="form-control" value="{{ $extra->music }}" placeholder="Input Music Price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Per Rental</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="editExtra" class="btn btn-teal float-right">Edit This Extra</button>
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