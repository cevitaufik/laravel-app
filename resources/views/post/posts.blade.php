@extends('layouts.main')
@include('partials.navbar')
@section('container')

<div class="container my-bg-element text-white mt-5 rounded my-shadow p-3">
  <h1 class="text-center">{{ $header }}</h1>
  <br>

  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/posts">
        <div class="input-group mb-3">
          <input type="text" class="form-control my-bg-element" placeholder="Search" name="search">
          <button class="btn btn-outline-secondary" type="submit">search</button>
        </div>
      </form>
    </div>
  </div>

  @if (count($data) == 0)
      <h2 class="text-center">Belum ada postingan</h2>
  @else       
    <div class="mb-3 my-hover container">
      <a href="/posts/{{ $data[0]->slug }}" class="text-decoration-none text-white">
        <div class="container overflow-hidden post post-hero-container-img position-relative">
          <img src="/img/{{ $data[0]->category->name . '.jpg'}}" alt="{{ $data[0][" tittle"] }}" class="post-hero-img">
          <div class="position-absolute bottom-0 block w-100 text-center pb-2">
            <h2>{{ $data[0]["tittle"] }}</h2>
            <h5>Category : {{ $data[0]->category->name }}</h5>
            <h5>By : {{ $data[0]->user->name }}</h5>
          </div>
        </div>
      </a>
      <hr>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($data as $key => $post)
      @if ($key > 0)  
        <div class="col">
          <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-white">
            <div class="card h-100">
              <img src="/img/{{ $post->category->name . '.jpg'}}" class="card-img-top" alt="{{ $post["tittle"] }}">
              <div class="card-body my-bg-element my-hover">
                <h5 class="card-title">{{ $post["tittle"] }}</h5>
                <p class="card-text">Category : {{ $post->category->name }} </p>
                <p class="card-text">By : {{ $post->user->name }}</p>
              </div>
            </div>
          </a>
        </div>    
      @endif
      @endforeach
    </div>
  @endif
</div>

@endsection