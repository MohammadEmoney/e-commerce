@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
    <h2 class="my-4"> 
        {{$category_name->category}}
    </h2>

    <div class="row">
    @foreach($category as $cat)
    <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
        <a href="{{ route('show-page', ['id' => $cat->id]) }}"><img class="card-img-top" src="{{ Voyager::image($cat->image) }}" width="100px"></a>
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('show-page', ['id' => $cat->id]) }}">{{ substr($cat->name, 0, 30). '...' }}</a></h5>
            <p class="card-text"><!-- {!! $cat->body !!} --></p>
            <a href="#" class="btn btn-primary">${{ $cat->price }}</a>
        </div>
        <div class="card-footer text-muted">
            Posted on <span class="text-success">{{$cat->created_at->toFormattedDateString()}}</span> by
        </div>
    </div>

@endforeach
    </div>
    <!-- /.row -->

    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>


    <div class="container">
    
    </div>

@endsection