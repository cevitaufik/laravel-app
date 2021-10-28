@extends('layouts.main')
@section('container')

<body class="my-bg-main">
  <div class="row justify-content-center">
    <div class="col-sm-5 my-bg-element text-white mt-5 rounded my-shadow p-3">
      <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <form class="p-3" action="/login" method="POST">
        @csrf
        <div class="form-floating text-black">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating text-black">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
      <small class="d-block text-center">
        Belum registrasi ?
        <a href="/register">registrasi disini</a>
      </small>
    </div>
  </div>
  @endsection