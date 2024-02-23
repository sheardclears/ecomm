@extends('slider.index')

@section('ecom')
        <ol class="breadcrumb accent-blue">
        <li class="breadcrumb-item"><a href="/">Collections</a></li>
        <li class="breadcrumb-item"><a href="/category">{{ $products->category->name }}</a></li>
        <li class="breadcrumb-item active">{{ $products->name }}</li>
      </ol>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                <div class="col-md-4 border-right text-center" style="width: 300px; height: 424px;">
                    <img src="{{ asset('productimage/'.$products->image) }}" alt="Product Image" style="width: 300px;">
                </div>
                <div class="col-md-8" style="-ms-text-size-adjust: auto">
                    <h1 class="mb-0">
                        {{ $products->name }}
                    </h1>
                    <h6>By {{ $products->author }}</h6>

                    <hr>
                    <label class="fw-bold"> Price: Rp{{ $products->sellprice }}</label>
                    <p class="mt-3 text-black text-justify">
                        {!! $products->desc !!}
                    </p>

                    <hr>
                    @if ($products->qty > 0)
                        <label class="badge-pill bg-success">In Stock</label>
                    @else
                        <label class="badge-pill bg-danger">Out of Stock</label>   
                    @endif
                    <input type="hidden" name="id" value="{{ $products->id }}" class="prod_id">
                    <div class="row mt-2">
                        @if ($products->qty > 0)
                        <div class="col-md-3">
                            <label for="Quantity">Buy</label>
                            <div class="input-group text-center mb-3" style="width:110px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="qty" value="1" class="form-control qty-input text-center">
                                <button class="input-group-text increment-btn">+</button>
                                
                            </div>
                                <button type="button" class="btn btn-success addtoCartbtn mb-2">Add to Cart</i></button>                                    
                        </div>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>    

@endsection


