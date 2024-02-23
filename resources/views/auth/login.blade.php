@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-5">
            <div class="card">

                {{-- Form login  --}}
                <div class="card-body">
                    <form action="/login" method="post">
                        @csrf
      
                        <div class="mb-1">
                          <img src="{{ asset('template/dist/img/logopm.png') }}" style="justify-content: left" alt="Logo">
                          <h1 class="m-auto my-3 text-center" style="letter-spacing: 1px;">Login</h1>
                        </div>
      
                        <div class="form-outline mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" size="100000" />
                        
                        </div>
      
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                        </div>
      
                        <div class="pt-2 mb-3">
                          <button class="btn btn-dark btn-block" type="submit">Login</button>
                        </div>
                            <p class="mb-3" style="color: #393f81;">Don't have an account? <a href="/register" style="color: #393f81;">Register here</a></p>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
