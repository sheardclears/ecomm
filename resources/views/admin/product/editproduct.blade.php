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
           </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-9">
        <div class="card">
          <div class="card-body">
            <form action="/editproducts/{{ $data->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="productname" class="form-label">ID:</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $data->id }}">
              </div>
              <div class="mb-3">
                <label for="productname" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
              </div>
              <div class="mb-3">
                <label for="productslug" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $data->slug }}">
              </div>
              <div class="mb-3">
                <label for="productprice" class="form-label">Price:</label>
                <input type="text" class="form-control" id="sellprice" name="sellprice" value="{{ $data->sellprice }}">
              </div>
              <div class="mb-3">
                <label for="productqty" class="form-label">Quantity:</label>
                <input type="text" class="form-control" id="qty" name="qty" value="{{ $data->qty }}">
              </div>
              <div class="mb-3">
                <label for="productdesc" class="form-label">Description:</label>
                <textarea rows="4" class="form-control" id="desc" name="desc">{{ $data->desc }}</textarea>
              </div>
              <div class="mb-3">
                <label for="productstatus" class="form-label">Status:</label>
                <input type="checkbox" id="status" name="status">{{ $data->status == "1" ? 'checked' : '' }}
              </div>
              <div class="mb-3">
                <label for="producttrending" class="form-label">Trending:</label>
                <input type="checkbox" id="trending" name="trending">{{ $data->trending == "1" ? 'checked' : '' }}
              </div>
              @if ($data->image)
              <img src="{{ asset('productimage/').$data->image }}" alt="product Image">
              @endif
              {{-- <div class="mb-3">
                <label for="productpic" class="form-label">Product Image:</label>
                <input type="file" class="form-control" name="image">
              </div> --}}
              <div class="mb-3">
                <label for="productname" class="form-label">Category:</label>
                <select class="form-select">
                  <option value="">{{ $data->category->name }}</option>
                </select>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection