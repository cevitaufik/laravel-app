@extends('dashboard.layouts.main')
@section('container')

<h1 class="mb-5 mt-3">Selamat datang {{ auth()->user()->name }}</h1>
<a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tittle</th>
        <th scope="col">Category</th>
        <th scope="col">Updated at</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->tittle }}</td>
        <td>{{ $item->category->name }}</td>
        <td>{{ $item->updated_at }}</td>
        <td>

          <a href="/dashboard/posts/{{ $item->slug }}">detail</a> |
          <a href="">edit</a> |
          <a href="/dashboard/posts/delete/{{ $item->slug }}">delete</a>

        </td>
      </tr>                
      @endforeach            
    </tbody>
  </table>
</div>
    
@endsection

