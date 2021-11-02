@extends('dashboard.layouts.main')
@section('container')

<h1 class="mb-5 mt-3">Edit post</h1>

<div class="col-lg-8 mb-5">
  <form action="/dashboard/posts/{{ $post->slug }}/edit" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="tittle" class="form-label">Title</label>
      <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle" name="tittle" value="{{ old('tittle', $post->tittle) }}" required>
      @error('tittle')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required>
      @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" name="category_id">
        @foreach ($categories as $category)
          @if (old('category_id', $post->category->id) == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="article" class="form-label">Article</label>
      @error('article')
          <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="article" type="hidden" name="article" value="{{ old('article', $post->article) }}" required>
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