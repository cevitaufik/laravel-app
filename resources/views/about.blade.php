@extends('layouts.main')
@section('container')

<div class="container my-bg-element text-white mt-5 rounded my-shadow">
  <h1>Halaman About</h1>
  <P>{{ $name }}</P>
  <P>{{ $date }}</P>
  <P>{{ $no }}</P>
</div>

@endsection