@extends('backend.layout.template')

@section('title', 'All Cars')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-list-outline tx-70 lh-0"></i>
        <div>
        <h4>Cars</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="row row-sm mg-b-20">
            <div class="col-sm-12">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white">
                        Manage All Cars
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        
                        @if ($cars->count() == 0)
                            <div class="alert alert-info">No Cars Have Been Uploaded Yet!</div>
                        @else
                            <table id="data" class="table table-striped table-hover table-bordered table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th scope="col">#SL.</th>
                                        <th scope="col">Car Model</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Features</th>
                                        <th scope="col">Rent Rate</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($cars as $car)
                                        <tr>
                                            <th scope="row">{{ $serial }}</th>
                                            <td>{{ $car->name }}</td>
                                            <td>
                                                <span class="badge badge-warning">{{ $car->brand->name ?? 'N/A' }}</span>
                                            </td>
                                            <td>
                                                @foreach (explode(",", $car->features) as $feature)
                                                <span class="badge badge-pill badge-dark">{{ $feature }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $car->rent }} /Day</td>
                                            <td>@if ($car->status == 0)
                                                <span class="badge badge-secondary">Not Available</span>
                                            @elseif ($car->status == 1)
                                                <span class="badge badge-primary">Available</span>
                                            @endif</td>
                                            <td>
                                                <div class="btn-group action-bar" role="group">
                                                    <a href="" data-toggle="modal" data-target="#description-{{ $car->id }}"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('car.edit', $car->id) }}"><i class="fas fa-edit"></i></a>
                                                    <a href="" data-toggle="modal" data-target="#softdelete-{{ $car->id }}"><i class="fas fa-trash"></i></a>
                                                </div>
                                                <!-- View Modal -->
                                                <div class="modal fade effect-scale modal-dark" id="description-{{ $car->id }}" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content bd-0">
                                                        <div class="modal-header pd-x-20">
                                                        <h5 class="modal-title" id="viewModalLabel">Category Descripton</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body pd-20">
                                                            <p class="mg-b-5">
                                                                @if (! $car->description)
                                                                    No Description Added
                                                                @else
                                                                    {!! $car->description !!}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Delete Modal -->
                                                <div class="modal fade effect-scale modal-dark" id="softdelete-{{ $car->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content bd-0">
                                                        <div class="modal-header pd-x-20">
                                                        <h5 class="modal-title" id="deleteModalLabel">Delete Car</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body pd-20">
                                                            <p class="mg-b-5">
                                                                Are You Sure You Want To Delete This Car Listing Permanently!
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('car.destroy', $car->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" name="delete" class="btn btn-danger btn-sm" >Delete Car</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $serial++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div><!-- card-body -->
                </div><!-- card -->
            </div>
        </div>
    </div>
@endsection