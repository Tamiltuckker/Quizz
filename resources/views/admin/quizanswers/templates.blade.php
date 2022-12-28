@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            {!! Breadcrumbs::render() !!}
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <a class="btn btn-primary btn-sm ms-auto float-end" href="{{ route('admin.users.index') }}">Back
                    </a>
                    <h6>Quiz Answered Templates Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('flash-message')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    @foreach ($answeredTemplates as $answeredTemplate)
                        <div class="col-md-3 mt-3">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div class="icon icon-shape icon-lg bg-gradient- text-center border-radius-lg">
                                        @if ($answeredTemplate->category->image !== null)
                                            <img src="{{ asset('/storage/image/' . $answeredTemplate->category->image->image) }}"
                                                height=50 width=50>
                                        @else
                                            <img src="{{ asset('assets/img/theme/dribbble.png') }}" height=50 width=50>
                                        @endif

                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">{{ $answeredTemplate->category->name }}</h6>
                                    <span class="text-xs">{{ $answeredTemplate->name }}</span><br>
                                    <span class="text-xs">No Of
                                        Questions:{{ $answeredTemplate->quiz_questions->count() }}</span>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0">
                                        <a class="btn bg-gradient-warning font-weight-bold text-xs"
                                            href="{{ route('admin.getansweredquestions', [$userId, $answeredTemplate->id]) }}">Answered
                                            Questions</a>
                                        @csrf
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('script')
@endsection
