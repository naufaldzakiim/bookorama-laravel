@extends('layouts.app')

@section('content')
<div class="card mt-3">
  <div class="card-header">Books Data</div>
  <div class="card-body">
    <a href="" class="btn btn-primary">+ Add New Book</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ISBN</th>
          <th>Title</th>
          <th>Author</th>
          <th>Category</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($books as $book)
        <tr>
          <td>{{ $book->isbn }}</td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->category }}</td>
          <td>{{ $book->price }}</td>
          <td>{{ $book->stock }}</td>
          <td>
            <a href="" class="btn btn-info">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection