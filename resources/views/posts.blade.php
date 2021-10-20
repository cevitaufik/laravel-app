@extends('layouts.main')
@section('container')

<div class="container my-bg-element text-white mt-5 rounded my-shadow p-3">
  <h1>Halaman Blog</h1>
  <br>
  @foreach ($data as $item)

  <div class="mb-3 my-hover">
    <a href="posts/{{ $item->id }}" class="text-decoration-none text-white">
      <h2>{{ $item["tittle"] }}</h2>
      <h5>By : {{ $item["author"] }}</h5>
    </a>
    <hr>
  </div>
      
  @endforeach
</div>

@endsection