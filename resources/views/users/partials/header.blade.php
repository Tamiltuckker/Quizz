<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="{{ route('user.dashboard.index') }}">Quiz<span>.</span></a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @if(@$route)
                @foreach ($categories as $category)
                  @auth
                    @php $userEmailVerfication = \App\Models\User::where('id', Auth::user()->id)->first();@endphp
                    @if ($userEmailVerfication->email_verified_at !== null)
                        <h4 class="useremail"><a href="{{ route('user.dashboard.gettemplates',$category->slug) }}">{{$category->name  }}</a></h4>
                    @else
                        <h4 onclick="userEmail()"><a href="#">{{ $category->name }}</a></h4>
                    @endif
                  @endauth
                  @guest
                      <li><a href="{{ route('login') }}">{{$category->name}}</a></li>
                  @endguest
                @endforeach
              @endif
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li> 
          @auth
            <li class="dropdown"><a href="#"><span>My Account</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{ route('user.profiles.index') }}">Profile</a></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="#"><form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                              this.closest('form').submit();">
                        <span class="d-sm-inline d-none">Log out</span>
                    </x-responsive-nav-link>
                  </form>
                  </a>
                </li>
              </ul>
            </li>
          @endauth
        </ul> 
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      @guest
        <a href="{{ route('login') }}" class="get-started-btn scrollto">Login/Register</a>
      @endguest
      @auth
        <a href="{{ route('user.profiles.index') }}" class="get-started-btn scrollto">My Profile</a>
      @endauth
    </div>
  </header><!-- End Header -->