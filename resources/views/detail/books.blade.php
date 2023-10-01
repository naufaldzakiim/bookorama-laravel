@extends('layouts.app')

@section('content')
<div class="card mt-3">
  <div class="card-header">Book Details</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">
        <table class="table">
          <tr>
            <th>ISBN</th>
            <td>{{ $book->isbn }}</td>
          </tr>
          <tr>
            <th>Title</th>
            <td>{{ $book->title }}</td>
          </tr>
          <tr>
            <th>Author</th>
            <td>{{ $book->author }}</td>
          </tr>
          <tr>
            <th>Category</th>
            <td>{{ $book->category }}</td>
          </tr>
          <tr>
            <th>Price</th>
            <td>{{ $book->price }}</td>
          </tr>
          <tr>
            <th>Stock</th>
            <td>{{ $book->stock }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header">Book Reviews</div>
  <div class="card-body">
    {{$book_review? $book_review->review : ''}}
  </div>
</div>

<div class="card mt-3">
  <div class="card-header">Add a Review</div>
  <div class="card-body">
    <form action="{{route('books.review',['id'=> $book->isbn])}}" method="POST">
      @csrf
      <textarea name="review" class="form-control" rows="5" placeholder="Leave a review here" id="floatingTextarea">
      </textarea>
      <button class="btn btn-primary mt-3" type="submit" name="submit">Submit</button>
    </form>
  </div>
</div>
</div>
@endsection