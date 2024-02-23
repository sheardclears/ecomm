@extends('slider.index')

@section('ecom')
  <div class="owl-carousel owl-1" style="size: 80%"> {{-- bagian slider pada halaman homepage --}}
    <div><img src="{{ asset('template/dist/img/pharmez.png') }}" alt="Image"></div>
    <div><img src="{{ asset('template/dist/img/phone.png') }}" alt="Image"></div>
    <div><img src="{{ asset('template/dist/img/wealth.png') }}" alt="Image"></div>
  </div>

<div class="py-5 justify-content-center">
  <div class="container">
    <div class="row">
      <h1>Popular Products</h1>
      <div class="owl-carousel owl-1 featured-carousel owl-theme">
        @foreach ($featured as $item)
        <a href="{{ 'category/'.$item->category->slug.'/'.$item->slug }}">
          <div class="item">
            <div class="card" style="width: 200px">
              <img src="{{ asset('productimage/'.$item->image) }}" alt="Product Image">
              <div class="card-body justify-content-center"> 
                <h6>{{ $item->name }}</h6>
                <small>{{ $item->sellprice }}</small>
              </div>
            </div>
          </div>  
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>

<div class="py-2">
  <div class="container">
    <div class="row">
      <h1>Popular Categories</h1>
      <div class="owl-carousel owl-1 featured-carousel owl-theme">
        @foreach ($popular as $pop)
        <div class="item">
          <a href="{{ 'category/'.$pop->slug }}">
          <div class="card align-self-sm-stretch" style="width: 200px">
            <img src="{{ asset('categoryimage/'.$pop->image) }}" alt="Category Image">
            <div class="card-body justify-content-center"> 
              <h6>{{ $pop->name }}</h6>
              <p>{{ $pop->desc }}</p>
            </div>
          </div>
          </a>
        </div>    
      @endforeach
      </div>
    </div>
  </div>
</div>
@endsection