<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card border-10 pt-2 card-primary">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('products_images/' . $product->img->name) }}" width="100%" id="ProductImg">
                </div>
                <div class="col-6">
                    <h3 class="mt-2"> {{ $product->name }}</h3>
                    <h4><b>₦{{ number_format($product->amount, 2) }}</b>
                    </h4>
                    <select class="form-control select" id="select" style="width: fit-content">
                        <option value="none">Select Product Size </option>
                        @isset($product->size)
                            @foreach ($product->size as $size)
                                <option>{{ $size }}</option>
                            @endforeach
                        @endisset
                    </select>
                    <h3 class="mt-1">Product Details</h3>
                    <p>
                        {{ $product->details }}
                    </p>
                </div>
                <div class="row">
                    <div class="d-md-flex">
                        @isset($images)
                            @foreach ($images as $image)
                        <img src="{{ asset('products_images/' . $image->name) }}" alt="img" class="w-30 m-1">
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
