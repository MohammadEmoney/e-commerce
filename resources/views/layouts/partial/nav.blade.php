<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('m-logo.png')}}" width="30" height="30" alt="logo image" class="logo">
         </a>
        <a class="navbar-brand" href="{{route('home')}}">Online Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    {{--<a class="nav-link" href="#">About</a>--}}
                    <div class="dropdown">
                        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach($categories as $cat)
                            <a class="dropdown-item" href="{{ route('show-category', ['id' => $cat->id]) }}">{{ $cat->category }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart.index')}}">Cart 
                        @if(Cart::count() >0)
                            <span class="badge badge-light text-dark">
                                {{Cart::instance('default')->count()}}
                            </span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#footer">Contact</a>
                </li>
                @guest
                <li>
                    <a class="nav-link" href="{{ route('register')}}">Register</a>
                    <!-- Button trigger modal -->
                   <!--  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                      Register/Login
                    </button> -->
                </li>
                <li>
                    <a href="{{route('login')}}" class="nav-link" title="">Login</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
                <li>
                    <a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Search
                  </a>
                <div class="collapse" id="collapseExample">
                <form action="{{route('search')}}" method="get" accept-charset="utf-8">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><ion-icon name="search"></ion-icon></div>
                    </div>
                        <input type="text" name="query" id="query" class="class="form-control""  value="{{request()->input('query')}}" placeholder="Search for product">
                    </div>
                </form>
             </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration/Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('register') }}" method="post" accept-charset="utf-8">
            @csrf
            <div class="form-row align-items-center">
                <ul>
                    <li>
                       <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">{{ __('Name') }}</label>
                            <input type="text" class="form-control mb-2 {{ $errors->has('name') ? ' is-invalid' : '' }}" id="inlineFormInput" placeholder="Jane Doe" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="col-auto">
                        <label for="inlineFormInput" class="sr-only">Email</label>
                          <input type="email" class="form-control mb-2 {{ $errors->has('email') ? ' is-invalid' : '' }}" id="inputEmail3" placeholder="Email" value="{{ old('email') }}" required>

                           @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                      </div>
                    </li>
                    <li>
                        <div class="col-auto">
                        <label for="inlineFormInput" class="sr-only">Password</label>
                          <input type="password" class="form-control mb-2 {{ $errors->has('password') ? ' is-invalid' : '' }}"" id="inputPassword3" name="password" placeholder="Password" required>

                          @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                      </div>
                    </li>
                    <li>
                        <div class="col-auto">
                        <label for="inlineFormInput" class="sr-only">Confirm Password</label>
                          <input type="password" class="form-control mb-2" name="password_confirmation" id="inputPassword3" placeholder="Password" required>
                      </div>
                    </li>
                </ul>
            </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
        </form>
    </div>
  </div>
</div>