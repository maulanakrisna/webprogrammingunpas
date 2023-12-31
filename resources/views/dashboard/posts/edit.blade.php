@extends('dashboard.layouts.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
        <p>{{ auth()->user()->name }}</p>
      </div>
      <div class="col-lg-8">
        <form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title')
                  is-invalid
              @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" autofocus required>
              @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug')
                  is-invalid
              @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required>
              @error('slug')
                  {{ $message }}
              @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if ( (old('category_id', $post->category_id)) == $category->id )
                            <option value={{ $category->id }} selected>{{ $category->name }}</option>
                        @else
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endif

                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label ">Image</label>
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="d-block img-preview img-fluid mb-3 col-sm-5" id="img-preview">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview">
                @endif
                <input type="hidden" value="{{ $post->image }}" name="oldImage" id="oldImage">
                <input class="form-control @error('image')
                    is-invalid
                @enderror" type="file" id="image" name="image" onchange="previewImage()">
            </div>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}" required>
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
          </form>
      </div>
      <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function () {
            fetch('/dashboard/posts/makeslug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage(){
            const inputImage = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            const fileReader = new FileReader();
            fileReader.readAsDataURL(inputImage.files[0]);

            fileReader.onload = function (event) {
                imgPreview.src = event.target.result;
            }
        }
      </script>

@endsection
