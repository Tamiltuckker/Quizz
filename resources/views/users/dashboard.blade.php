@extends('layouts.frontend')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
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

            </div>

        </div>
    </section>
    @include('sweetalert');
    <!-- End Services Section -->
@endsection
