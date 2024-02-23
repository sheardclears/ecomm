@extends('slider.index')

@section('ecom')
<ol class="breadcrumb accent-blue">
  <li class="breadcrumb-item"><a href="/">Collections</a></li>
  <li class="breadcrumb-item"><a href="/category">{{ $category->name }}</a></li>
</ol>
<div class="py-5 justify-content-center">
    <div class="container">
      <div class="row mb-3">
        @foreach ($product as $pd)
        <div class="col-md-3 mb-2">
            <a href="{{ $category->slug.'/'.$pd->slug }}">
            <div class="card" style="width: 250px">
                <img src="{{ asset('productimage/'.$pd->image) }}" alt="">
                <div class="card-body justify-content-center"> 
              <h6>{{ $pd->name }}</h6>
              <small>{{ $pd->sellprice }}</small>
            </div>
          </div>
        </a>
        </div>    
      @endforeach
      </div>
    </div>
  </div>
@endsection