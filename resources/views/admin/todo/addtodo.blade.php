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
        <div>
            <div class="float-start text-center">
                <h2 class="pb-5">Create Task</h2>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="container">
            <form action="/inserttodo" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title </label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description </label>
                    <textarea type="text" class="form-control" id="desc" name="desc" rows="7"></textarea>
                  </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status </label>
                    <select class="form-control" id="status" name="status">
                        @foreach ($statuses as $status)
                            <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
@endsection