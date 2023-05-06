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
                                    <h6 class="mb-1 mt-1 font-weight-bold h3">Welcome Admin,</h6>
                                    <small class="h4">Take a look at the overview </small>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-options" style="margin-right:2.5%">
                            <form method="GET" action="">
                            <select onchange="submitForm(this)" name="date" class="form-control select" style="min-width: 120% !important">
                                <option value="all" @selected(request()->get('date') == "all" )>All</option>
                                <option value="7" @selected(request()->get('date') == "7" )>Last 7 Days</option>
                                <option value="30" @selected(request()->get('date') == "30" )>Last 30 Days</option>
                                <option value="12" @selected(request()->get('date') == "12" )>Last 12 Month</option>
                            </select>
                            </form>
                        </div> --}}
                    </div>
                    <div class="card-body pt-0">
                        <div class="row admin-stat">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 big-col">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Product</h4>
                                        <p>Number of Products: {{ $product_count ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 big-col">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Number of Users</h4>
                                        <p>Number of Users: {{$user_count ?? 0}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row admin-stat">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 big-col">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Transactions</h4>
                                        <p>Total Number: {{$trans_count}}</p>
                                        <p>Total Amount: ₦{{ number_format($trans_sum ?? 0, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 big-col">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Orders</h4>
                                        <p>Total Orders: {{$orders_count ?? 0}}</p>
                                        <p>Total Amount: ₦{{ number_format($orders_sum ?? 0, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script>
      function submitForm(elem) {
          if (elem.value) {
              elem.form.submit();
          }
      }
  </script>
@endsection
