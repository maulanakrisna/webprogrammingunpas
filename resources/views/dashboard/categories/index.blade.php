@extends('dashboard.layouts.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        <p>{{ auth()->user()->name }}</p>
      </div>
      @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
      @endif
      <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create Post Category</a>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-success"><i class="bi bi-eye"></i></a>
                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection
