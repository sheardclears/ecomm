@extends('slider.index')

@section('ecom')
<ol class="breadcrumb accent-blue">
    <li class="breadcrumb-item"><a href="/">Collections</a></li>
    <li class="breadcrumb-item"><a href="/category">List of Categories</a></li>
  </ol>
    <div class="py-2">
        <div class="container">
            <div class="row">
                        {{-- Menampilkan macam-macam kategori yang tersedia --}}
                        @foreach ($category as $cate)
                        <div class=" col-auto">
                            <a href="{{ 'category/'.$cate->slug }}">
                            <div class="card" style="width: 200px">
                            <img src="{{ asset('categoryimage/'.$cate->image) }}" alt="Category Image">
                            <div class="card-body text-center"> 
                                <h6>{{ $cate->name }}</h6>
                            </div>
                            </div>
                            </a>
                        </div>   
                        @endforeach

                
            </div>
        </div>
    </div>
@endsection