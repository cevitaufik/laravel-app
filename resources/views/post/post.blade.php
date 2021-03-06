@extends('layouts.main')
@include('partials.navbar')
@section('container')

<div class="container my-bg-element text-white mt-5 rounded my-shadow p-3">
  <div class="container overflow-hidden post post-hero-container-img position-relative mb-2">
    @if ($data->image)
      <img src="{{ asset('storage/'.$data->image) }}" alt="{{ $data->category->name }}" class="post-hero-img">
    @else
      <img src="/img/{{ $data->category->name . '.jpg'}}" alt="{{ $data->category->name }}" class="post-hero-img">
    @endif
  </div>
  <h1>{{ $data['tittle'] }}</h1>
  <h4><a href="/users/{{ $data->user->username }}/posts" class="text-decoration-none text-white">By: {{ $data->user->name }}</a></h4>
  <h6>Category <a href="/posts/categories/{{ $data->category->slug }}"> {{ $data->category->name }}</a></h6>

  <h6>{{ $data->created_at->diffForHumans() }}</h6>
  <hr>
  <p>{!! $data['article'] !!}</p>
</div>

@endsection