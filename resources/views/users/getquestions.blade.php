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
                @csrf
                <div class="container mb-5">
                    <div class="row">
                        <div class="col-12">
                            @foreach ($quizQuestions as $questionKey => $quizQuestion)
                                <p class="fw-bold">Q{{ $loop->iteration }}.{{ $quizQuestion->question }}</p>
                                <div>
                                    @php $questionId = $quizQuestion->id @endphp
                                    @csrf
                                    @php $options = $quizQuestion->quiz_options @endphp
                                    @foreach ($options as $key => $option)
                                    <div>
                                        <input type="radio" name={{ "quizanswers[$questionId]" }}
                                            value="{{ $option->id }}" required>{{ $option->option }}<br>
                                        <label for="one" class="box first">
                                            <div class="course">
                                                <span class="circle"></span>
                                                {{-- <span class="subject"> {{ $option->option }}</span><br> --}}
                                            </div>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <input type="hidden" name="quizTemplateId" value="{{ $quizTemplateId }}">
                <div class="mt-2">
                    <button type="submit" class="btn btn-md btn-info font-weight-bold text-xs">
                        <h4 id="add_to_me"><input class="quizTemplateId" type="hidden" value="{{ $quizTemplateId }}">Save
                        </h4>
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
