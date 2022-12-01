@extends('layouts.frontend')

@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>
            <div class="row">
            @guest
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="{{ route('login') }}">HTML</a></h4>
                        <p>HTML Quiz templates with Question. Register your account and explore the Quiz</p>
                    </div>
                </div> 
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="{{ route('login') }}">CSS</a></h4>
                        <p>CSS Quiz templates with Question. Register your account and explore the Quiz</p>
                    </div>
                </div> 
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="{{ route('login') }}">PHP</a></h4>
                        <p>PHP Quiz templates with Question. Register your account and explore the Quiz</p>
                    </div>
                </div> 
            @endguest

            @auth
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div><img src="{{ asset('/storage/image/' . $category->image->image) }}" width="50" height="50"></div>
                            <br>
                            <h4><a href="{{ route('user.dashboard.gettemplates',$category->slug) }}">{{ $category->name }}</a></h4>
                            <p> Total Templates:{{count($category->quiz_templates)}}</p>
                            <br>
                            <p> Total Question:{{ count($category->quiz_questions()->get()) }}</p>
                            <br>
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            @php $userEmailVerfication = \App\Models\User::where('id', Auth::user()->id)->first();@endphp
                            
                            @if ($userEmailVerfication->email_verified_at !== null)
                                <h4 class="useremail"><a
                                        href="{{ route('user.dashboard.gettemplates') }}">{{ $category }}</a></h4>
                            @else
                                <h4 onclick="userEmail()"><a href="#">{{ $category }}</a></h4>
                            @endif

                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div>
                @endforeach
                @endauth

            </div>
        </div>
    </section>
    @include('sweetalert');
    <!-- End Services Section -->
@endsection
