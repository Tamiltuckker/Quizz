@extends('layouts.frontend')

@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Quiz Section</h2>
                <p>Check Your Brain</p>
            </div>
            <form method="POST" name="quizanswer" action="{{ route('user.dashboard.store') }}">
              @foreach ($quizQuestions as $questionKey => $quizQuestion)
                @php $questionId = $quizQuestion->id @endphp
                {{-- <input type="hidden" name="quizQuestionId[]" value={{ $quizQuestion->id }}> --}}
                    @csrf
                    @php $options = $quizQuestion->quiz_options @endphp
                    <h4> Q{{ $quizQuestion->id }}.{{ $quizQuestion->question }}</h4>
                    <br>
                    @foreach ($options as $key => $option)
                        <input type="radio" name={{ "quizanswers[$questionId]"}}  value="{{ $option->id }}"> &nbsp;&nbsp;{{ $option->option }} <br>
                    @endforeach 
              @endforeach
                <input type="hidden" name="quizTemplateId" value="{{ $quizTemplateId }}">
              <div class="mt-2">
                <button type="submit" class="btn btn-md btn-info font-weight-bold text-xs">Save</button>
              </div>
            </form>
        </div>
    </section>
@endsection
