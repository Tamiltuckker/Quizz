@extends('layouts.frontend')

@section('content')
@include('users.partials.herosection')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                @if($category->active === 1)
                    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box mt-3 bg-light border border-white">
                            <div>
                            @if($category->image !== null)
                                <img src="{{ asset('/storage/image/' . $category->image->image) }}" width="50" height="50">
                            @else
                                <img src="{{ asset('assets/img/dummy.png') }}" width="50" height="50">
                            @endif
                            </div>
                            <br>
                            @php 
                                $attendUsersCount = \App\Models\QuizAnswer::where('category_id',$category->id)->get()
                                                      ->groupBy('user_id')->count();
                            @endphp
                            @auth
                                @php $userEmailVerfication = \App\Models\User::where('id', Auth::user()->id)->first();@endphp
                                @if ($userEmailVerfication->email_verified_at !== null)
                                    <h4 class="useremail"><a href="{{ route('user.dashboard.gettemplates',$category->slug) }}">{{$category->name  }}</a></h4>
                                @else
                                    <h4 onclick="userEmail()"><a href="#">{{ $category->name }}</a></h4>
                                @endif
                            @endauth
                            @guest
                                <h4><a href="{{ route('login') }}">{{ $category->name }}</a></h4> 
                            @endguest
                            <p> Attend Users :{{ $attendUsersCount }} </p>
                            <p> Total Templates:{{count($category->quiz_templates)}}</p>
                            <p> Total Question:{{ count($category->quiz_questions()->get()) }}</p>
                        </div> 
                    </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @include('sweetalert');
@endsection
