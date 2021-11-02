@extends('dashboard.layouts.main')
@section('container')

<h1 class="mb-5 mt-3">Selamat datang {{ auth()->user()->name }}</h1>

@if (session()->has('success'))    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p class="m-0 p-0">{{ session('success') }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
<div class="table-responsive mb-5">
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

          <a href="/dashboard/posts/{{ $item->slug }}" class="badge bg-success text-decoration-none">detail</a> |
          <a href="/dashboard/posts/{{ $item->slug }}/edit" class="border-0 badge bg-warning">edit</a> |

          <form action="/dashboard/posts/{{ $item->slug }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="border-0 badge bg-danger" onclick="return confirm('Apakah anda yakin?')">delete</button>
          </form>

        </td>
      </tr>                
      @endforeach            
    </tbody>
  </table>
</div>
    
@endsection

