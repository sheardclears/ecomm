@extends('slider.index')

@section('ecom')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div>
      <h1 class="text-center mb-3">My Order</h1>
    
      <div class="container mb-3">
        @foreach ($order as $ord)
        <div class="card" style="justify-content: center">
            <div class="card-header">
                Total Pembayaran: Rp{{ $ord->total_price }} 
                <span class="badge rounded bg-warning text-darker">
                    {{ $ord->created_at->diffForHumans() }} 
                </span>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <div class="float-start text-black">
                        {{ $ord->Keterangan }}
                    <br>

                    <small class="badge bg-success text-white">
                        Tracking No.: {{ $ord->notracking }}
                    </small> 
                    
                    </div>
                    </div>
                <div class="float-end" style="text-align: right">
                    <a href="/vieworder/{{ $ord->id }}" class="btn bg-maroon">View</a>
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection