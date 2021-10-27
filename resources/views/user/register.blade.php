<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <title>{{ $tittle }} | Laravel app</title>
</head>

<body class="my-bg-main">
  <div class="row justify-content-center">
    <div class="col-sm-5 my-bg-element text-white mt-5 rounded my-shadow p-3">
      <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
      <form action="/register" method="POST" class="p-3">
        @csrf
        <div class="form-floating text-black">
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" required value="{{ old('name') }}"> 
          <label for="name">Name</label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror          
        </div>
        <div class="form-floating text-black">
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating text-black">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
          <label for="emil">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating text-black">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me" name="remember"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">register</button>
      </form>
      <small class="d-block text-center">
        Sudah registrasi ?
        <a href="/login">login disini</a>
      </small>
    </div>
  </div>
  <script src="/js/script.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>