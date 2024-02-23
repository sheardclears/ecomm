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
            <form action="/editcategories/{{ $data->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="categoryname" class="form-label">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
              </div>
              <div class="mb-3">
                <label for="categoryslug" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $data->slug }}">
              </div>
              <div class="mb-3">
                <label for="categorydesc" class="form-label">Description:</label>
                <textarea rows="4" class="form-control" id="desc" name="desc">{{ $data->desc }}</textarea>
              </div>
              <div class="mb-3">
                <label for="categorystatus" class="form-label">Status:</label>
                <input type="checkbox" id="status" value="1" name="status">
              </div>
              <div class="mb-3">
                <label for="categorypopular" class="form-label">Popular:</label>
                <input type="checkbox" id="popular" value="1" name="popular">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  -->
@endsection