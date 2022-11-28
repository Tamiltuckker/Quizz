@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="float-right">
                        {{-- <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.getansweredtemplates',$quizTemplateId) }}">Back</a> --}}
                    </div>
                    <h6>Answered Questions table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('flash-message')
                        @yield('content')
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       Answered Questions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($answeredQuestions as $answeredQuestion)
                                    <tr>                                      
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $answeredQuestion->question }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('script')  
@endsection
