@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Breadcrumbs::render('quizquestion', $quizTemplateId) }}
            <div class="card mb-4">
                <div class="card-header pb-0">                    
                    <div class="d-flex align-items-center">                        
                        <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.quiztemplates.index') }}">Back</a>&NonBreakingSpace;&NonBreakingSpace;                         
                        <a class="btn bg-gradient-info font-weight-bold text-xs"
                        href="{{ route('admin.quizquestions.create',$quizTemplateId) }}">Create</a>
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
                                        No.qn</th>                                
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Question</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizQuestions as  $quizQuestion)
                                    <tr>   
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                                </div>
                                            </div>
                                        </td>                                   
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $quizQuestion->question }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <form method="POST"
                                                action="{{ route('admin.quizquestions.destroy', [$quizTemplateId, $quizQuestion->id]) }}">
                                                <a href="{{ route('admin.quizquestions.edit',  [$quizTemplateId, $quizQuestion->id]) }}"
                                                    class="btn bg-gradient-info font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit question">
                                                    Edit
                                                </a>
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn bg-gradient-danger font-weight-bold text-xs show-alert-delete-box"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>
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
