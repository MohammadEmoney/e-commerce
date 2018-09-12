@extends('layouts.main')

@section('content')
    {{--{{var_dump($products)}}--}}
    <!-- Product -->
    <div class="card mb-4">
        <img class="d-block w-50" src="{{ Voyager::image($products->image) }}" alt="Card image cap">
        <div class="card-body">
            <h3 class="card-title">{{ $products->name }}</h3>
            <p class="card-text">{!! $products->body !!}</p>
            <ul>
              <li>
                <button type="button" class="btn btn-outline-primary" style="height: 53px">${{ $products->price }}</button>
              </li>
              <li>
                <form action="{{route('cart.store')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$products->id}}">
                  <input type="hidden" name="name" value="{{$products->name}}">
                  <input type="hidden" name="price" value="{{$products->price}}">
                  <button type="submit" class="btn btn-outline-success"><ion-icon name="cart"></ion-icon></button>
                </form>
              </li>
            </ul>
        </div>
        <div class="card-footer text-muted">
            Posted on <span class="text-success">{{$products->created_at->toFormattedDateString()}} </span> 
        </div>
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="{{ URL::previous() }}">&larr; Back</a>
                </li>
            </ul>
    </div>

    <!-- Related --> 
    <h2>Related</h2>
    <div class="card-group">
     @foreach($category as $cat)
        @if($cat->id != $products->id)
          <div class="card">
            <a href="{{ route('show-page', ['id' => $cat->id]) }}" title=""><img class="img-thumbnail" src="{{ Voyager::image($cat->image) }}" alt="Card image cap" width="350px"></a>
            <div class="card-body">
              <h5 class="card-title">{{$cat->name}}</h5>
              <span class="badge badge-primary">${{ $cat->price }}</span>
            </div>
           </div>  
        @endif 
    @endforeach

  </div>
  <div class="pagination justify-content-center">
    {{ $category->links()}}
  </div>
 
  <!-- Comments -->
 
 <br>
  <h4 class="text-secondary">Comments:</h4>
  <div class="mw-100 p-3 border border-dark" style="max-width: 18rem;">
      @if(count($comments)== 0)
      <div class="text-primary">
        No comments yet
      </div>
      @else
     @foreach($comments as $comment)
  <div class="card-header">{{$comment->name}}</div>
  <div class="card-body text-dark">
    <p class="card-text">{{ $comment->body }}</p>
  </div>
  @endforeach
  @endif
</div>

  <!-- Comments Form -->
  <br>
  <h4 class="">Leave a comment:</h4>
  <form action="{{ route('comment', ['product_id' => $products->id]) }}" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Your Name" value="{{ old('name') }}">
    <small class="text-danger">{{$errors->first('name')}}</small>
    <br>
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ old('email') }}">
    <small class="text-danger">{{$errors->first('email')}}</small>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
    <small class="text-danger">{{$errors->first('body')}}</small>
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
</form>
@endsection