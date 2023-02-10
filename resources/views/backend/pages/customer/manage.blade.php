@extends('backend.layout.template')

@section('title', 'All Customers')
@section('body-content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-people-outline tx-70 lh-0"></i>
        <div>
        <h4>Customers</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="row row-sm mg-b-20">
            <div class="col-sm-12">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white">
                        Manage All Customers
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        
                        @if ($customers->count() == 0)
                            <div class="alert alert-info">No Customers Have Been Uploaded Yet!</div>
                        @else
                            @if (Auth::check())
                                <table id="data" class="table table-striped table-hover table-bordered table-responsive-xl">
                                    <thead>
                                        <tr>
                                            <th scope="col">#SL.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $serial = 1;
                                        @endphp
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <th scope="row">{{ $serial }}</th>
                                                <td>{{ $customer->name }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>
                                                    @if ($customer->role == 2)
                                                        <span class="badge badge-dark">Customer</span>
                                                    @endif  
                                                </td>
                                                <td>
                                                    @if ($customer->status == 0)
                                                        <span class="badge badge-secondary">Inactive</span>
                                                    @elseif ($customer->status == 1)
                                                        <span class="badge badge-primary">Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group action-bar" role="group">
                                                        <a href="" data-toggle="modal" data-target="#description-{{ $customer->id }}"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ route('customer.edit', $customer->id) }}"><i class="fas fa-edit"></i></a>
                                                        <a href="" data-toggle="modal" data-target="#softdelete-{{ $customer->id }}"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                    <!-- View Modal -->
                                                    <div class="modal fade effect-scale modal-dark" id="description-{{ $customer->id }}" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
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
                                                                    @if (! $customer->description)
                                                                        No Description Added
                                                                    @else
                                                                        {!! $customer->description !!}
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
                                                    <div class="modal fade effect-scale modal-dark" id="softdelete-{{ $customer->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                                            <div class="modal-content bd-0">
                                                                <div class="modal-header pd-x-20">
                                                                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body pd-20">
                                                                    <p class="mg-b-5">
                                                                        Are You Sure You Want To Delete This Category Permanently!
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" name="delete" class="btn btn-danger btn-sm" >Delete Customer</button>
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
                            
                        @endif
                    </div><!-- card-body -->
                </div><!-- card -->
            </div>
        </div>
    </div>
@endsection