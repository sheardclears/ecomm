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
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container p-5">
    <div class="row justify-content-center">
      <div class="col-9">
        <div class="card">
          <div class="card-body">
            <form action="/insertproducts" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="productname" class="form-label">ID:</label>
                <input type="text" class="form-control" id="id" name="id">
              </div>
              <div class="mb-3">
                <label for="productname" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="mb-3">
                <label for="productauthor" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author">
              </div>
              <div class="mb-3">
                <label for="productslug" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="slug" name="slug">
              </div>
              <div class="mb-3">
                <label for="productprice" class="form-label">Price:</label>
                <input type="text" class="form-control" id="sellprice" name="sellprice">
              </div>              
              <div class="mb-3">
                <label for="productqty" class="form-label">Quantity:</label>
                <input type="text" class="form-control" id="qty" name="qty">
              </div>              
              <div class="mb-3">
                <label for="productdesc" class="form-label">Description:</label>
                <textarea rows="4" class="form-control" id="desc" name="desc"></textarea>
              </div>
              <div class="mb-3">
                <label for="productstatus" class="form-label">Status:</label>
                <input type="checkbox" id="status" value="1" name="status">
              </div>
              <div class="mb-3">
                <label for="producttrending" class="form-label">Trending:</label>
                <input type="checkbox" id="trending" value="1" name="trending">
              </div>
              <div class="mb-3">
                <label for="producttitle" class="form-label">Meta Title:</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title">
              </div>
              <div class="mb-3">
                <label for="productkeyw" class="form-label">Keywords:</label>
                <textarea rows="4" class="form-control" id="meta_keywords" name="meta_keywords"></textarea>
              </div>
              <div class="mb-3">
                <label for="productmetadesc" class="form-label">Meta Description:</label>
                <textarea rows="4" class="form-control" id="meta_desc" name="meta_desc"></textarea>
              </div>
              <div class="mb-3">
                <label for="productpic" class="form-label">Product Image:</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="mb-3">
                <label for="productname" class="form-label">Category:</label>
                <select class="form-select" name="cate_id">
                  <option value="">Select a Category</option>
                  @foreach ($category as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
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
@endsection