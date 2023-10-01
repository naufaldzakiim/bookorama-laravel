@extends('layouts.app')

@section('content')
<div class="card mt-3">
  <div class="card-header">Book Details</div>
  <div class="card-body">

  </div>
</div>

<div class="card mt-3">
  <div class="card-header">Book Reviews</div>
  <div class="card-body">

  </div>
</div>

<div class="card mt-3">
  <div class="card-header">Add a Review</div>
  <div class="card-body">
    <form action="" method="POST">
      <textarea name="review" class="form-control" rows="5" placeholder="Leave a review here" id="floatingTextarea"></textarea>
      <button class="btn btn-primary mt-3" type="submit" name="submit">Submit</button>
    </form>
  </div>
</div>
</div>
@endsection