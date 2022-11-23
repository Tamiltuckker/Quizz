@extends('layouts.frontend')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>
            @foreach ($quizQuestions as $quizQuestion)
               @php $options = $quizQuestion->quiz_options @endphp
                <h4> Q{{ $quizQuestion->id }}. {{ $quizQuestion->question }}</h4>
               <br>
                @foreach ($options as $option)
                    <input type="radio" name="question1">&nbsp;&nbsp;{{ $option->option }}<br>
                <br>
                @endforeach
            @endforeach

            <input type="submit" name="submit" value="submitQuiz" onclick="result()" />
        </div>

    </section><!-- End Services Section -->
@endsection
