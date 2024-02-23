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
              <li class="breadcrumb-item active">To Do</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div>
      <h2 class="text-center mb-3">To Do List</h2>
    
      <div class="container">
            <div class="float-end" style="text-align: right">
                <a href="/addtodo" class="btn bg-gradient-white m-3">Create +</a>
            </div>
            <div class="clearfix"></div>

        @foreach ($tasks as $task)
        <div class="card" style="justify-content: center">
            <div class="card-header">
                {{ $task->title }} 
                <span class="badge rounded bg-warning text-darker">
                    {{ $task->created_at->diffForHumans() }} 
                </span>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <div class="float-start">
                        {{ $task->desc }}
                    <br>
                    @if ($task->status === "General")
                        <span class="badge rounded bg-gradient-blue text-darker">
                            General
                        </span> 

                    @elseif ($task->status === "Urgent")
                        <span class="badge rounded bg-gradient-danger text-darker">
                            Urgent
                        </span>

                        @elseif ($task->status === "Important")
                        <span class="badge rounded bg-gradient-teal text-darker">
                            Important
                        </span> 
                    
                    @endif
                    
                    <small>  Last Updated - {{ $task->updated_at->diffForHumans() }}</small>
                    </div>
                    </div>
                <div class="float-end" style="text-align: right">
                    <a href="/edittodo/{{ $task->id }}" class="btn bg-gradient-success">Edit</a>
                    <a href="/deletetodo/{{ $task->id }}" class="btn bg-gradient-danger">Delete</a>
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>

  
@endsection