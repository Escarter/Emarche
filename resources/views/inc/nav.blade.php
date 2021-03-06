<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">CleBea Inc Ecommerce</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="/products">Products</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
       @if(Auth::guest())
          <li><a href="{{route('auth.login.view')}}">Login</a></li>
          <li><a href="{{route('auth.register.view')}}">Register</a></li>
     @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username}} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Discounts</a></li>
              <li><a href="/plans">Plans</a></li>
              <li><a href="#">Settings</a></li>
              <li><a href="/auth/logout">Logout</a></li>
            </ul>
          </li>
      @endif
      </ul>
    </div>
  </div>
</nav>