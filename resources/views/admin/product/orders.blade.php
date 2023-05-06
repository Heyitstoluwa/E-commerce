@extends('layouts/dashboard/app')
@section('content')
    <div class="main-container container-fluid px-0">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card border-10">
                    <div class="card-header border-bottom-0">
                        <div class="d-flex">
                            <div class="media mt-4">
                                <div class="media-body">
                                    <h6 class="mb-1 mt-1 font-weight-bold h3">Order List</h6>
                                    <small class="h5"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table
                                            class="table table-bordere card-table table-vcenter text-nowrap dataTable no-footer"
                                            id="datatable" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" style="">No</th>
                                                    <th scope="row" class="sorting" style="">Order ID</th>
                                                    <th class="sorting" tabindex="0" style="">User</th>
                                                    <th class="sorting" tabindex="0" style="">Amount</th>
                                                    <th class="sorting" tabindex="0" style="">Date</th>
                                                    <th class="sorting" tabindex="0" style="">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($orders)
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $sn++ }}</td>
                                                            <td>
                                                                <a onclick="shiNew(event)" data-type="dark" data-size="l"
                                                                    data-title="{{ $order->unique_id }}"
                                                                    href="{{ route('admin.order', $order->unique_id) }}"><b
                                                                        class="text-uppercase">{{ $order->unique_id }}</b></a>
                                                            </td>
                                                            <td>{{ $order->user->name ?? '' }}</td>
                                                            <td>
                                                                <b
                                                                    class="text-success">₦{{ number_format($order->amount, 2) }}</b>
                                                            </td>
                                                            <td>{{ $order->created_at->format('D, M j, Y h:i a') ?? '-' }}</td>
                                                            <td>
                                                                <a onclick="shiNew(event)" data-type="dark" data-size="l"
                                                                    data-title="{{ $order->unique_id }}"
                                                                    href="{{ route('admin.order', $order->unique_id) }}"
                                                                    class="btn btn-sm btn-primary">View</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
