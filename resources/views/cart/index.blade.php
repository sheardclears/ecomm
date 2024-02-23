@extends('slider.index')

@section('ecom')
<div class="container mb-3">
    <div class="card shadow w-auto">
        <div class="card-body mb-3">
            @php
                $total=0;
            @endphp
            @foreach ($carts as $c)
            <div class="row product_data mb-3">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('productimage/'.$c->products->image) }}" alt="Product Image" style="width: 100px;">
                </div>
                <div class="col-md-8" style="-ms-text-size-adjust: auto">
                    <h5 class="mb-0">
                        {{ $c->products->name }}
                    </h5>

                    <label class="fw-bold"> Price: Rp{{ $c->products->sellprice }}</label>

                    <input type="hidden" name="id" value="{{ $c->prod_id }}" class="prod_id">
                    @if ($c->products->qty > $c->prod_qty)
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <div class="input-group text-center mb-3" style="width:110px;">
                                <button class="input-group-text changeqty decrement-btn">-</button>
                                <input type="text" name="qty" value="{{ $c->prod_qty }}" class="form-control qty-input text-center">
                                <button class="input-group-text changeqty increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger delete-cart">Delete <i class="fa-solid fa-trash-can"></i></button>
                        </div>
                       
                    </div> 
                    @else
                        <h6 class="text-center">stok habis</h6>
                    @endif
                    
                </div>
            </div>
            @php
                $total += $c->products->sellprice * $c->prod_qty;
            @endphp
            @endforeach
    </div>
    <div class="card-footer">
        <h5>Total Harga: Rp{{ $total }},00
        <a href="/checkout" type="button" class="btn btn-primary float-end">Checkout <i class="fa-solid fa-cash-register"></i></a>        
        <a href="/" type="button" class="btn btn-outline-dark float-end mr-2">Back to Store<i class="fa-solid fa-shopping-basket"></i></a>        
        </h5>
    </div>
</div>    
@endsection