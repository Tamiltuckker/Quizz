@extends('layouts.frontend')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>
            <div class="container mb-5">
                <div class="row">
                    <div class="col-12">
                        @foreach ($quizAnswers as $answerKey => $quizAnswer)
                            @php
                                $quizQuestion = \App\Models\QuizQuestion::where('id', '=', $quizAnswer->quiz_question_id)->first();
                                $quizOptions = \App\Models\QuizOption::where('quiz_question_id', '=', $quizAnswer->quiz_question_id)->get();
                            @endphp
                            <p class="fw-bold">Q{{ $loop->iteration }}.{{ $quizQuestion->question }}</p>
                            <div>
                                @foreach ($quizOptions as $key => $quizOption)
                                    @php
                                        $quizpoint = \App\Models\QuizAnswer::where('quiz_option_id', '=', $quizOption->id)
                                            ->where('user_id', Auth::user()->id)
                                            ->first();
                                        
                                        $bgcolour = " ";
                                        
                                        if ($quizpoint === null) {
                                            $bgcolour =" ";
                                        } elseif ($quizpoint->point === 1) {
                                            $bgcolour = "bg-success";
                                        } else {
                                            $bgcolour ="bg-danger";
                                        }
                                    @endphp

                                    <input type="radio" name="" value="">
                                    <label for="one" class="box first {{ $bgcolour }} text-white">
                                        <div class="course">
                                            <span class="circle"></span>
                                            <span class=" subject">{{ $quizOption->option }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link href="{{ asset('assets/css/frontend-quiz.css') }}" rel="stylesheet" />
@endsection
