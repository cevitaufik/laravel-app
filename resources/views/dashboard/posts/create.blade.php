@extends('dashboard.layouts.main')
@section('container')

<h1 class="mb-5 mt-3">Create new post</h1>

<div class="col-lg-8">
  <form action="/dashboard/posts/create" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div class="mb-3">
      <label for="tittle" class="form-label">Title</label>
      <input type="text" class="form-control" id="tittle" name="tittle">
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug">
    </div>
    <div class="mb-5">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" name="category_id">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach        
    </div>
    <div class="mb-3">
      <input id="article" type="hidden" class="mt-3" name="article">
      <trix-editor input="article"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>  
</div>

<script>
  const tittle = document.querySelector('#tittle');
  const slug = document.querySelector('#slug');

  tittle.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?tittle=' + tittle.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>

@endsection