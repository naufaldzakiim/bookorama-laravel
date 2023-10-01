@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach($errors->all() as $error)
    <li>
      {{ $error }}
    </li>
    @endforeach
  </ul>
</div>
@endif
<div class="card mt-4">
  <div class="card-header">Edit Book Data</div>
  <div class="card-body">
    <form action="{{route('books.update',['id'=> $book->isbn])}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="isbn">ISBN:</label>
        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}">
      </div>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
      </div>
      <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
      </div>
      <div class="form-group">
        <label for="category">Category:</label>
        <select name="categoryid" id="category" class="form-control" required>
          <option value="{{ $book->categoryid}}">{{$book->category}} </option>
          @foreach($categories as $category)
          <option value="{{ $category->categoryid }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ $book->price }}">
      </div>
      <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="text" class="form-control" id="stock" name="stock" value="{{ $book->stock }}">
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection