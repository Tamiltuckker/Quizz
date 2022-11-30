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
                            <div class="col-md-8">
                                <h4 class="mt-2">{{ $quizTemplate->name }} </h4>
                            </div>
                            <div class="col-md-2">
                                <p class="mt-2"> Questions - {{ count($quizTemplate->quiz_questions) }} </p>
                            </div>
                            @php
                                $quizAnswers = \App\Models\QuizAnswer::where('user_id', Auth::user()->id)
                                    ->where('quiz_template_id', '=', $quizTemplate->id)
                                    ->get();
                            @endphp
                            @if (count($quizAnswers) > 0)
                                <div class="col-md-2">
                                    <a class="btn btn-warning btn-md mt-1"
                                        href="{{ route('user.dashboard.view', $quizTemplate->id) }}">View Answer</a>
                                </div>
                            @else
                                <div class="col-md-2">
                                    <a class="btn btn-warning btn-md mt-1"
                                        href="{{ route('user.dashboard.getquestions', $quizTemplate->slug) }}">start
                                        Quiz</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
