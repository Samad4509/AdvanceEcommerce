@foreach($products as $product)
    <a href="{{ route('product.details', $product->id) }}" class="text-decoration-none text-dark mb-2 d-block">
        <div class="card p-3 border-0">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" height="50" width="50" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <h5 class="mb-0">{{ $product->name }}</h5>
                </div>
                <div class="col-md-4">
                    <span class="fw-bold">
                        <span class="currency-symbol">&#2547;</span>{{ $product->selling_price }}
                    </span>
                </div>
            </div>
        </div>
    </a>
@endforeach
