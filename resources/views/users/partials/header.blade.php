<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="{{ route('user.dashboard.index') }}">Quiz<span>.</span></a></h1>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('user.home') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ route('user.about') }}">About</a></li>
                <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @if (@$route)
                            @foreach ($categories as $category)
                                @php
                                    $attendUsersCount = \App\Models\QuizAnswer::where('category_id', $category->id)
                                                        ->get()
                                                        ->groupBy('user_id')
                                                        ->count();
                                    
                                    $attendUsersCounts[] = $attendUsersCount;
                                    $userCounts = array_slice($attendUsersCounts, 0, 5);
                                    $quizcounts[] = $attendUsersCount;
                                @endphp
                                @auth
                                    @php $userEmailVerfication = \App\Models\User::where('id', Auth::user()->id)->first();@endphp
                                    @if ($userCounts === $quizcounts && $category->active === 1)
                                        @if ($userEmailVerfication->email_verified_at !== null)
                                            <h4 class="useremail"><a
                                                    href="{{ route('user.dashboard.gettemplates', $category->slug) }}">{{ $category->name }}</a>
                                            </h4>
                                        @else
                                            <h4 onclick="userEmail()"><a href="#">{{ $category->name }}</a></h4>
                                        @endif
                                    @endif
                                @endauth
                                @guest
                                    @if ($userCounts === $quizcounts && $category->active === 1)
                                        <li><a href="{{ route('login') }}">{{ $category->name }}</a></li>
                                    @endif
                                @endguest
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('user.contact') }}">Contact</a></li>
                @auth
                    <li class="dropdown"><a href="#"><span>My Account</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('user.profiles.index') }}">Profile</a></li>
                            <li><a href="#">Change Password</a></li>
                            @if (session('impersonated_by'))
                                <li><a href="{{ route('leave-impersonate') }}">Leave Impersonation</a></li>
                            @endif
                            <li><a href="#">
                                    <form method="POST" action="{{ route('logout') }}">
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
