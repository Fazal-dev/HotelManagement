
@extends("layouts.main")
 
@section('admin')

<div class="container">

  <div class="card mt-5 w-50 mx-auto">
    <div class="card-header">
      <h3 class="text-center">login</h3>
    </div>
    <div class="card-body">
      @session('status')
      <div class="alert alert-warning text-center" role="alert">
        {{ $value }}
      </div>
      @endsession
      
      <form action={{ url('login') }} method="POST">
        @csrf
        <div class="form-group mt-3">
          <label for="UserName">UserName</label>
          <input name="email" type="email" class="form-control" id="UserName" placeholder="Enter email as User name">
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
        <div class="row">
         
          <div class="col text-center"> 
            <button type="submit"  class="btn btn-primary mt-3 w-50">Login</button>
            <div class="">
              <a class="mt-3 d-block" href={{ url('register') }}>You dont have account</a>
            </div>
          </div>
          
        </div>
    </form>

   
    </div>
  </div>

</div>


@endsection
           
    