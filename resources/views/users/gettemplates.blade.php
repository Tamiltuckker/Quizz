@extends('layouts.frontend')

@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
                <div align="right">
                    <a class="btn btn-warning btn-md ms-auto" href="{{ route('user.dashboard.index') }}">Back</a>
                </div>
            </div>
            @foreach ($quizTemplates as $quizTemplate)
                <div class="row mt-2 ">
                    <div class="card mx-auto text-left col-md-8">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="mt-2">{{ $quizTemplate->name }} &nbsp;&nbsp;&nbsp;&nbsp; TotalQuestions:{{ count($quizTemplate->quiz_questions) }}</h4>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-warning btn-md mt-1"
                                    href="{{ route('user.dashboard.getquestions', $quizTemplate->slug) }}">Start
                                    Quiz</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
