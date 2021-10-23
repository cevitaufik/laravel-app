@extends('layouts.main')
@section('container')

<div class="container my-bg-element text-white mt-5 rounded my-shadow p-3">
  <h1 class="text-center">Halaman category {{ $category }}</h1>
  <br>
  @if (count($data) === 0)
      <h2>Belum ada postingan</h2>
  @else
    @foreach ($data as $item)
    <div class="mb-3 my-hover">
      <a href="/posts/{{ $item->id }}" class="text-decoration-none text-white">
        <h2>{{ $item->tittle }}</h2>
      </a>
      <hr>
    </div>        
    @endforeach      
  @endif  
</div>

@endsection