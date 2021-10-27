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
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <form class="p-3">              
          <div class="form-floating text-black">
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <label for="email">Email address</label>
          </div>
          <div class="form-floating text-black">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
  <script src="/js/script.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>