@extends('layouts.main')

@section('content')
@if(session()->has('success_message'))
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
@endif
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Subscribing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{session()->get('success_message')}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!-- Page Heading -->
    <h1 class="my-4 display-2 text-center">Products
        <small></small>
    </h1>

    <!-- Slide Show -->
    <div class="container justify-content-center">
        <div id="carouselExampleIndicators" class="carousel slide carousel_aling" data-ride="carousel" style="width: 640px">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner align-self-center">
        <div class="carousel-item active" style="text-align:center">
          <img class="d-block w-100 align-self-center" src="{{Voyager::image($products->get(1)->image)}}" alt="First slide" >
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 align-self-center" src="{{Voyager::image($products->get(2)->image)}}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 align-self-center" src="{{Voyager::image($products->get(3)->image)}}" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br>
    </div>
    
    <!-- end of slideshow -->

  {{-- var_dump($products->get(1)->id) --}}
    <div class="row">
    @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="{{ route('show-page', ['id' => $product->id]) }}"><img class="card-img-top" src="{{ Voyager::image( $product->image ) }}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('show-page', ['id' => $product->id]) }}">{{ $product->name }}</a>
                    </h4>
                    <span class="badge badge-primary">${{ $product->price }}</span>
                    <p class="card-text">
                        {{--{{ substr($product->body, 0, 20). '...' }}--}}

                    </p>
                </div>
                <div class="card-footer text-muted">
                    Posted on <span class="
                    ">{{$product->created_at->toFormattedDateString()}}</span> by
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <!-- /.row -->

    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        <li class="page-item  {{$products->previousPageUrl() == true ?  "" :  "disabled"}}">
            <a class="page-link" href="{{$products->previousPageUrl()}}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item {{$products->currentPage() == 1 ?  "disabled" :  ""}}">
            <a class="page-link" href="{{ url('/?page=1') }}">1</a>
        </li>
        <li class="page-item {{$products->currentPage() == 2  ?  "disabled" :  ""}}">
            <a class="page-link" href="{{ url('/?page=2') }}">2</a>
        </li>
        <li class="page-item {{$products->currentPage() == 3  ?  "disabled" :  ""}}">
            <a class="page-link" href="{{ url('/?page=3') }}">3</a>
        </li>
        <li class="page-item {{$products->nextPageUrl() == true ?  "" :  "disabled"}}">
            <a class="page-link" href="{{$products->nextPageUrl()}}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>

@endsection