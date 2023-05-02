<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<style>

    .bootstrap-tagsinput .tag {
        /* margin-right: 2px; */
        color: #ffffff;
        background: var(--primary-bg-color);
        /* margin-bottom: 108px; */
        /* padding: 3px 7px; */
        border-radius: 3px;
        */
    }

    .bootstrap-tagsinput {
        height: 55px;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        color: gray !important;
        font-weight: 600;
        background-color: #f0f4f9;
        border: 1px solid #eee;
        border-radius: 3px;
    }

    .avatar-md {
        width: 5rem;
        height: 5rem;
    }
</style>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card border-10 pt-2 card-primary">
            <div class="card-body">
                <div class="row pt-1 mt-1">
                    <form class="validate-form" action="{{ route('admin.edit_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row settings">
                            <div class="col-lg-12 col-xl-12 mb-4">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Product Name</label>
                                        <input name="name" type="text" class="form-control" required=""
                                            data-parsley-required-message="Product name is required"
                                            placeholder="Product Name" value="{{ $product->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Amount</label>
                                        <input name="amount" type="number" class="form-control" placeholder="₦5,000"
                                            required="" data-parsley-required-message="Amount is required"
                                            value="{{ $product->amount }}">
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Product Quantity</label>
                                        <input name="quantity" type="number" min="1" class="form-control" placeholder="20"
                                            required="" data-parsley-required-message="Product Quantity is required"
                                            value="{{ $product->quantity }}">
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

{{-- 
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Product Size <span>*<span></label>
                                        <input type="text" data-role="tagsinput"
                                            class="form-control tm-input tm-input-inf" placeholder="ML XXL XL"
                                            required="" name="size" value="{{ old('size') }}"
                                            data-parsley-required-message="Product Size is required" placeholder="">
                                        @error('size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                  <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Product Feature Image</label>
                                        <input name="image" type="file" accept="image/*" class="form-control" placeholder="20"
                                            required="" data-parsley-required-message="Product Feature Image is required"
                                            value="{{ old('image') }}">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                  <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Product Images</label>
                                        <input name="images[]" type="file" multiple accept="image/*" class="form-control" placeholder="20"
                                            required="" data-parsley-required-message="Product Image is required"
                                            value="{{ old('images') }}">
                                        @error('images')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}


                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Product Details</label>
                                        <textarea name="details" required class="form-control" data-parsley-required-message="Product details is required">{{ $product->details }}</textarea>
                                        @error('details')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-12 col-xl-12 text-center">
                                <button class="btn btn-primary p-3 pt-2 pt-2" style="font-size: 18px">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.validate-form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
    });

</script>
