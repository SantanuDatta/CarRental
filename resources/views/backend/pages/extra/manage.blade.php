@extends('backend.layout.template')

@section('title', 'All Extras')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-plus-outline tx-70 lh-0"></i>
        <div>
        <h4>All Extras</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="row row-sm mg-b-20">
            <div class="col-sm-12">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white">
                        Manage All Extras
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        @if ($extras->count() == 0)
                            <div class="alert alert-info">No Brand Have Been Uploaded Yet!</div>
                        @else
                            <table id="data" class="table table-striped table-hover table-bordered table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th scope="col">#SL.</th>
                                        <th scope="col">Car Model</th>
                                        <th scope="col">Driver</th>
                                        <th scope="col">Gps</th>
                                        <th scope="col">Bike Rack</th>
                                        <th scope="col">Music</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($extras as $extra)
                                        <tr>
                                            <th scope="row">{{ $serial }}</th>
                                            <td><span class="badge badge-warning">{{ $extra->car->name }}</span></td>
                                            <td>{{ $extra->additional_driver }} /Per Rental</td>
                                            <td>{{ $extra->gps }} /Per Day</td>
                                            <td>{{ $extra->bicycle_rack }} /Per Rental</td>
                                            <td>{{ $extra->music }} /Per Rental</td>
                                            <td>
                                                <div class="btn-group action-bar" role="group">
                                                    <a href="{{ route('extra.edit', $extra->id) }}"><i class="fas fa-edit"></i></a>
                                                    <a href="" data-toggle="modal" data-target="#softdelete-{{ $extra->id }}"><i class="fas fa-trash"></i></a>
                                                </div>
                                                
                                                <!-- Delete Modal -->
                                                <div class="modal fade effect-scale modal-dark" id="softdelete-{{ $extra->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content bd-0">
                                                        <div class="modal-header pd-x-20">
                                                        <h5 class="modal-title" id="deleteModalLabel">Delete Brand</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body pd-20">
                                                            <p class="mg-b-5">
                                                                Are You Sure You Want To Delete This Brand Listing Permanently!
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('extra.destroy', $extra->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" name="delete" class="btn btn-danger btn-sm" >Delete Extra</button>
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