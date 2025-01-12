
@extends("layouts.main")
 
@section('admin')

<div class="container mt-5 ">
  <div class="card w-50 mx-auto">
    <div class="card-header">
        <h3 class="text-center">Register</h3>
    </div>
    <div class="card-body">
      <form action={{ url('register') }} method="POST">
        @csrf
        <div class="form-group mt-3">
          <label for="UserName">UserName</label>
          <input name="name" type="text" class="form-control" id="UserName" placeholder="Enter User name">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="email">email</label>
          <input name="email" type="email" class="form-control" id="email" placeholder="Enter User name">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="password">Password</label>
          <input name="password" type="password" class="form-control" id="password" placeholder="Password">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <button type="submit"  class="btn btn-primary mt-3">Register</button>
    </form>
    </div>
  </div>
 
</div>

       
@endsection