@extends('admin.index')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div>
      <h2 class="text-center mb-3">Products List</h2>
    
      <div class="container">
          <a href="/addproducts" class="btn btn-success mb-2">Create +</a>
    
          <div class="row">
            @if ($message=Session::get('success'))
                <div class="alert alert-success" role="alert">
                  {{ $message }}
                </div>
            @endif
            
            {{-- <div class="col-auto">
              <a href="/exportpdf" class="btn btn-outline-warning mb-2">Export PDF</a>
            </div>
    
            <div class="col-auto">
              <a href="/exportexcel" class="btn btn-outline-danger">Export Excel</a>
            </div> --}}
    
              <table class="table">
                  <thead>
                      <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $index => $pd) 
                        <tr>
                          <th scope="row" class="text-center">{{ $index + $data ->firstItem() }}.</th>
                          <td>{{ $pd->name }}</td>
                          <td>{{ $pd->author }}</td>
                          <td>{{ $pd->category->name }}</td>
                          <td align="center"> 
                            <img src="{{ asset('productimage/'.$pd->image) }}" alt="" style="width: 70px">
                          </td>
                          <td>{{ $pd->sellprice }}</td>
                          <td>{{ $pd->qty }}</td>
                          <td class="text-center">
                            <a href="/showproducts/{{ $pd->id }}" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $pd->id }}">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
          </div>
      </div>
    
      <!-- Optional JavaScript; choose one of the two! -->
    
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      -->
    
      <!-- Sweetalert JS -->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
      <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script>
      $('.delete').click(function(){
        var productid=$(this).attr('data-id');
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location="/deleteproducts/"+productid+""
          swal("Your file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("File is safe");
        }
      });
      });
      
    </script>
      </div>
  </div>

  
@endsection
