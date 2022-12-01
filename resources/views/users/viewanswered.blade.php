@extends('layouts.frontend')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>

            @foreach ($quizAnswers as $answerKey => $quizAnswer)
                @php
                    $quizQuestion = \App\Models\QuizQuestion::where('id', '=', $quizAnswer->quiz_question_id)->first();
                    $quizOptions = \App\Models\QuizOption::where('quiz_question_id', '=', $quizAnswer->quiz_question_id)->get();
                @endphp

                <h4> Q{{$loop->iteration}}.{{ $quizQuestion->question }}</h4>
                <br>

                @foreach ($quizOptions as $key => $quizOption)
                    @php
                        $quizpoint = \App\Models\QuizAnswer::where('quiz_option_id', '=', $quizOption->id)
                            ->where('user_id', Auth::user()->id)
                            ->first();
                    @endphp

                    @if ($quizpoint === null)
                    <input type="radio" name="" value="">{{ $quizOption->option }}<br>
                    @elseif($quizpoint->point === 1)
                    <span class="bg-success text-white"><input type="radio" name=""
                            value="">{{ $quizOption->option }}</span><br>
                    @else
                    <span class="bg-danger text-white"><input type="radio" name=""
                            value="">{{ $quizOption->option }} </span><br>
                    @endif
                @endforeach
            @endforeach

        </div>
    </section>
@endsection
