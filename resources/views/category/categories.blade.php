@extends('layouts.main')
@include('partials.navbar')
@section('container')

<div class="container my-bg-element text-white mt-5 rounded my-shadow p-3">
  <h1 class="text-center">Halaman categories</h1>
  <br>

  @foreach ($data as $item)

  <div class="mb-3 my-hover">
    <a href="/posts/categories/{{ $item->slug }}" class="text-decoration-none text-white">
      <h2>{{ $item->name }}</h2>
    </a>
    <hr>
  </div>
      
  @endforeach
</div>

@endsection