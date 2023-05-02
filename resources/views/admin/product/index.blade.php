@extends('layouts/dashboard/app')
@section('content')
    <div class="main-container container-fluid px-0">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card border-10">
                    <div class="card-header border-bottom-0 mb-4 mt-3">
                        <h6 class="mb-1 mt-1 font-weight-bold h3">Products</h6>
                        <div class="card-options" style="margin-right:2.5%">
                            <a onclick="shiSubAdmin(event)" data-type="dark" data-size="m" data-title="Add New Product"
                                href="{{ route('admin.add_product') }}" class="btn btn-bg btn-primary p-3"><b>Add
                                    New</b></a>
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
                                                    <th scope="row" class="sorting" style="">Image</th>
                                                    <th scope="row" class="sorting" style="">Name</th>
                                                    <th class="sorting" tabindex="0" style="">Amount</th>
                                                    <th class="sorting" tabindex="0" style="">Quantity</th>
                                                    <th class="sorting" tabindex="0" style="">Added</th>
                                                    <th class="sorting" tabindex="0" style="">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($products)
                                                    @foreach ($products as $product)
                                                        <tr class="">
                                                            <td class="sorting_1">{{ $sn++ }}</td>
                                                            <td class="sorting_1"><img
                                                                    src="{{ asset('products_images/' . $product->img->name) }}"
                                                                    alt="{{ $product->name }}" style="width: 50px"></td>
                                                            <td class="sorting_1">
                                                                <a class="font-weight-bold"
                                                                    href="{{ route('admin.user', $product->id) }}"></a>
                                                                {{ $product->name }}
                                                            </td>
                                                            <td>₦{{ number_format($product->amount, 2) }}</td>
                                                            <td>{{ $product->quantity }}</td>
                                                            <td>
                                                                {{-- {{ $product->created_at->diffForHumans() }} --}}
                                                                {{ $product->created_at->format('D, M j, Y h:i a') ?? '-' }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.view_product', $product->id) }}" onclick="shiNew(event)" data-type="dark" data-size="m"
                                                                    data-title="{{ $product->name }}"
                                                                    class="btn btn-sm btn-primary">View</i></a>
                                                                <a onclick="shiNew(event)" data-type="dark" data-size="m"
                                                                    data-title="{{ $product->name }}"
                                                                    href="{{ route('admin.edit_product', $product->id) }}"
                                                                    class="btn btn-sm m-1 btn-secondary">Edit</a>
                                                                    <a href="{{ route('admin.view_product', $product->id) }}" onclick="shiNew(event)" data-type="dark" data-size="m"
                                                                    data-title="{{ $product->name }}"
                                                                    class="btn btn-sm btn-primary">Orders</i></a>
                                                                <a href="{{ route('admin.delete_product', $product->id) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this user?')"
                                                                    class="btn btn-sm btn-danger">Delete</i></a>
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
