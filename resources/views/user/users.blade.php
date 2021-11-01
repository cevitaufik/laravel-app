@extends('layouts.main')
@include('partials.navbar')
@section('container')

<div class="container my-bg-element text-white mt-5 rounded my-shadow p-3">
  <h1 class="text-center">Halaman users</h1>
  <br>

  @foreach ($data as $item)

  <div class="mb-3 my-hover">
    <a href="/users/{{ $item['username'] }}/posts" class="text-decoration-none text-white">
      <h2>{{ $item['name'] }}</h2>
    </a>
    <p>Jumlah artikel : {{ $item['numberOfArticles'] }}</p>
    <hr>
  </div>

  @endforeach
</div>

@endsection