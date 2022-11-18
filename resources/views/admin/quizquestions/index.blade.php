@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="float-right">
                        <a class="btn bg-gradient-info font-weight-bold text-xs"
                            href="{{ route('admin.quizquestions.create') }}">Create</a>
                    </div>
                    <h6>Questions table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('flash-message')
                        @yield('content')
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Template</th>
                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Question</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Description</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Options</th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Category Image</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                          <tbody>
                                {{-- @foreach ($questions as $question) --}}
                                    <tr>
                                        
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    {{-- <h6 class="mb-0 text-sm">{{ $question->question }}</h6> --}}
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    {{-- <h6 class="mb-0 text-sm">{{ $question->description }}</h6> --}}
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    {{-- <h6 class="mb-0 text-sm">{{ $question->options }}</h6> --}}
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                {{-- @if ($question->image != null) --}}
                                                    {{-- <img src="{{ asset('/storage/image/' . $question->image->image) }}" --}}
                                                        {{-- class="avatar avatar-sm me-3" alt="question1"> --}}
                                                {{-- @elseif ($question->image == null) --}}
                                                    {{-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                        alt="question1"> --}}
                                                {{-- @endif --}}
                                            </div>
                                        </td>
                                        
                                        <td class="align-middle text-center text-sm">
                                            {{-- <form method="POST" action="{{ route('admin.questions.destroy', $question->id) }}">
                                                <a href="{{ route('admin.questions.edit', $question->id) }}"
                                                    class="btn bg-gradient-info font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit question">
                                                    Edit
                                                </a>
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn bg-gradient-danger font-weight-bold text-xs show-alert-delete-box"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('script')  
@endsection
