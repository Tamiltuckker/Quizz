@extends('layouts.frontend')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>
        <form method="POST" name="quiztemplates" action="{{ route('admin.quiztemplates.store') }}">
                @csrf
            @foreach ($quizQuestions as $quizQuestion)
               @php $options = $quizQuestion->quiz_options @endphp
                <h4> Q{{ $quizQuestion->id }}. {{ $quizQuestion->question }}</h4>
               <br>
                @foreach ($options as $option)
                    <input type="radio" name={{ $option->option }}>&nbsp;&nbsp;{{ $option->option }}<br>
                <br>
                @endforeach
            @endforeach
            <button type="submit" class="btn bg-gradient-success font-weight-bold text-xs">Save</button>
            <button type="submit" class="btn bg-gradient-danger font-weight-bold text-xs">Cancel</button>
        </form>
        </div>
    </section><!-- End Services Section -->
@endsection
