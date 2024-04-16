@extends('layout/master')

@section('title', 'Login/Register')


@section('content')


<div class="content" style="max-width: 75rem; margin-left: auto; margin-right: auto; margin-top: 5%;">
  <div>
    <h1>Login</h1>
    <form action="/login" method="POST">
      @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="loginEmail">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" required name="loginPassword">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
  
  <hr class="border-bottom border-3 border-dark">

  <div>
    <h1>Register</h1>
    <form action="/register" method="POST">
      @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="email">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</div>

@endsection