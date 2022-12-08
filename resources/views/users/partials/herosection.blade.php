<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
                <h1>Powerful Programmers<span>.</span></h1>
                <h2>Most Popular Categories</h2>
            </div>
        </div>

        <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
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

                @if ($userCounts === $quizcounts && $category->active === 1)
                    <div class="col-xl-2 col-md-4">
                        <div class="icon-box">
                            @if ($category->image !== null)
                                <img src="{{ asset('/storage/image/' . $category->image->image) }}" width="50"
                                    height="50">
                            @else
                                <img src="{{ asset('assets/img/dummy.png') }}" width="50" height="50">
                            @endif
                            @guest
                                <h3><a href="{{ route('login') }}">{{ $category->name }}</a></h3>
                            @endguest
                            @auth
                               <h3><a href="{{ route('user.dashboard.gettemplates', $category->slug) }}">{{ $category->name }}</a></h3>
                            @endauth
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section><!-- End Hero -->
