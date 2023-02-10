@extends('backend.layout.template')

@section('title', 'Add A Protections')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-plus-outline tx-70 lh-0"></i>
        <div>
        <h4>Add New Protection</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="row row-sm mg-b-20">
            <div class="col-sm-12">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white">
                        Add An Protection
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <form action="{{ route('protection.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Car Model</label>
                                        <select name="car_id" id="" class="form-control">
                                            <option value="" hidden>Select Car Model</option>
                                            @foreach ($cars as $car)
                                                <option value="{{ $car->id }}">{{ $car->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Collisions Damage Waiver</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">৳</span>
                                            </div>
                                            <input type="number" name="collision_damage_waiver" class="form-control" placeholder="Input Damage Price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Per Rental</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Theft Protection</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">৳</span>
                                            </div>
                                            <input type="number" name="theft_protection" class="form-control" placeholder="Input Theft Protection Price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Per Day</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Rental Contact Fee</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">৳</span>
                                            </div>
                                            <input type="number" name="rental_contact_fee" class="form-control" placeholder="Input Rental Contact Price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Per Rental</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">First Aid Service</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">৳</span>
                                            </div>
                                            <input type="number" name="personal_first_aid_service" class="form-control" placeholder="Input First Aid Price" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Per Rental</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="addProtection" class="btn btn-teal float-right">Add This Protection</button>
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