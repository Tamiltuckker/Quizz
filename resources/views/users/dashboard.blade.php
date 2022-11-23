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
                    @php $totalTemplates = $category->quiz_templates @endphp 
                    @foreach ($totalTemplates as $totalTemplate)
                    @php $totals = $totalTemplate->quiz_questions @endphp 
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div><img src="{{ asset('/storage/image/' . $category->image->image) }}" width="50" height="50"></div>
                                <br>
                                <h4><a href="{{ route('user.dashboard.gettemplates', $category->id) }}">{{ $category->name }}</a></h4>
                                <p> TotalCount :{{ count($totals) }}</p>
                                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section><!-- End Services Section -->
@endsection
