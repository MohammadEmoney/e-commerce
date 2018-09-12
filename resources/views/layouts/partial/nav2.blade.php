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
        <form action="" method="post" accept-charset="utf-8">
            <div class="form-row align-items-center">
                <ul>
                    <li>
                       <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">Name</label>
                            <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
                        </div>
                    </li>
                    <li>
                        <div class="col-auto">
                        <label for="inlineFormInput" class="sr-only">Email</label>
                          <input type="email" class="form-control mb-2" id="inputEmail3" placeholder="Email">
                      </div>
                    </li>
                    <li>
                        <div class="col-auto">
                        <label for="inlineFormInput" class="sr-only">Password</label>
                          <input type="password" class="form-control mb-2" id="inputPassword3" placeholder="Password">
                      </div>
                    </li>
                    <li>
                        <div class="col-auto">
                        <label for="inlineFormInput" class="sr-only">Confirm Password</label>
                          <input type="password" class="form-control mb-2" id="inputPassword3" placeholder="Password">
                      </div>
                    </li>
                </ul>
            </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Sign up</button>
      </div>
        </form>
    </div>
  </div>
</div>