@extends('layouts.main')
@section('container')

<div class="container my-bg-element text-white mt-5 rounded my-shadow p-3">
  <h1>{{ $data['tittle'] }}</h1>
  <h4>{{ $data['author'] }}</h4>
  <h6>{{ $data->created_at }}</h6>
  <hr>
  <p>{{ $data['article'] }}</p>
</div>

@endsection