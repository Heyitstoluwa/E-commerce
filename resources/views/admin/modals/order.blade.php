<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card border-10 pt-2 card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Order Details</h4>
                        <p>Order ID: <b>{{ $order->unique_id ?? "" }}</b></p>
                        <p>Amount: <b class="text-success">₦{{ number_format($order->amount ?? 0, 2) }}</b></p>
                    </div>
                    <div class="col-md-4">
                        <h4>Transaction Details</h4>
                        <p>Status: <button class="btn btn-sm btn-success p-1">
                            <b class="text-capitalize">{{ $transaction->status ?? "" }}</b></button></p>
                        <p>Reference: <b>{{ $transaction->reference ?? "" }}</b></p>
                    </div>
                    <div class="col-md-4">
                        <h4>User Details</h4>
                        <p>Name: <b class="text-capitalize">{{ $user->name ?? "" }}</b></p>
                        <p>Email: {{ $user->email ?? "" }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordere card-table table-vcenter text-nowrap dataTable no-footer"
                            id="datatable" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" style="">No</th>
                                    <th scope="row" class="sorting" style="">Image</th>
                                    <th scope="row" class="sorting" style="">Name</th>
                                    <th class="sorting" tabindex="0" style="">Amount</th>
                                    <th class="sorting" tabindex="0" style="">Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($order_products)
                                    @foreach ($order_products as $product)
                                        <tr class="">
                                            <td class="sorting_1">{{ $sn++ }}</td>
                                            <td class="sorting_1"><img
                                                    src="{{ asset('products_images/' . $product->product->img->name) }}"
                                                    alt="{{ $product->product->name }}" style="width: 50px"></td>
                                            <td class="sorting_1 text-capitalize font-weight-bold">
                                                {{ $product->product->name }}
                                            </td>
                                            <td><b class="text-success">₦{{ number_format($product->amount, 2) }}</b></td>
                                            <td>
                                                {{ $product->size }}
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
