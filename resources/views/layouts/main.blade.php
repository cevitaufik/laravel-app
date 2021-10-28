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

  <div class="container mb-5">
    @yield('container')
  </div>

  <script src="/js/script.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>