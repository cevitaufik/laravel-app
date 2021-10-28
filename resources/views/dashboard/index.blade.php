@extends('dashboard.layouts.main')
@section('container')

<h1 class="mb-5 mt-3">Selamat datang {{ auth()->user()->name }}</h1>
   
@endsection

