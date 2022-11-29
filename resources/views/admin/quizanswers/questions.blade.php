@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Answered Questions Information</p>
                        @foreach ($answeredQuestions as $key => $answeredQuestion)
                            @php 
                                $answeredQuestionId = $answeredQuestion->id; 
                                $options            = $answeredQuestion->quiz_options;
                            @endphp
                            <div class="container mb-5">
                                <div class="col-12">
                                    <p class="fw-bold"> {{ $loop->iteration }}. {{ $answeredQuestion->question }}</p>
                                    @foreach ($options as $key => $option)
                                        @php
                                            $getSelectedAnsweres    = \App\Models\QuizAnswer::where('quiz_option_id', $option->id)
                                                                    ->where('user_id', $userId)
                                                                    ->first();
                                                $bg_color = '';
                                                if ($getSelectedAnsweres === null) {
                                                     $bg_color = " ";
                                                } elseif ($getSelectedAnsweres->point === 1) {
                                                     $bg_color = "bg-success";
                                                } else {
                                                     $bg_color = "bg-danger";
                                                }
                                        @endphp
                                            <div class ={{ $bg_color }} > 
                                                <input type="radio" name={{ "quizanswers[$answeredQuestionId]"}}  value="{{ $option->id }}"> 
                                                <label for="one" class="box first">
                                                    <div class="course">
                                                        <span class="circle"></span>
                                                            <span class="">
                                                                {{ $option->option }}   
                                                            </span>
                                                    </div>
                                                </label>
                                            </div>
                                    @endforeach 
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('css')
        <link href="{{ asset('assets/css/radio-options.css') }}" rel="stylesheet" />
    @endpush
    @include('script')
@endsection
