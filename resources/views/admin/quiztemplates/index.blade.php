@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            {!! Breadcrumbs::render() !!}
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div>
                        <form method="GET" action="{{ route('admin.quiztemplates.index') }}">
                             <div class="py-2 flex">
                                 <div class="overflow-hidden flex pl-4">
                                    <p>Advance Category Filter:</p>
                                    <div class ="row">
                                     <div class="col-md-6">                                          
                                         {{ Form::select('category_id',@$categories,request()->input('category_id'), ['class' => 'form-control form-control-solid form-select mb-2 single-select2', 'placeholder' => 'Select Category']) }}
                                     </div>
                                     <div class="col-md-3">
                                        <button type='submit' class='btn bg-gradient-success ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                            {{ __('Search') }}
                                        </button>
                                        <a class="btn bg-gradient-secondary font-weight-bold text-xs" href="{{ route('admin.quiztemplates.index') }}"> Clear </a>
                                     </div>
                                    </div>
                                 </div>
                             </div>
                         </form>
                     </div>                   
                    <div class="float-right">
                        <a class="btn bg-gradient-info font-weight-bold text-xs" href="{{ route('admin.quiztemplates.create') }}">Create</a>
                    </div>
                    <h6>Quiz Templates Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('flash-message')
                        @yield('content')
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.tmp</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Template</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. of Questions</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizTemplates as $quizTemplate)
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
                                                    <h6 class="mb-0 text-sm">{{ $quizTemplate->name }}</h6>
                                                </div>
                                            </div>
                                        </td>                                     
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ @$quizTemplate->category->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ @$quizTemplate->quiz_questions->count() }}</h6>
                                                </div>
                                            </div>
                                        </td>             
                                        <td class="align-middle text-center text-sm">
                                            <form method="POST" action="{{ route('admin.quiztemplates.destroy', $quizTemplate->id) }}">
                                                <a class="btn bg-gradient-warning font-weight-bold text-xs" href="{{ route('admin.quizquestions.index',$quizTemplate->id) }}">Manage Questions</a>&nbsp;
                                                <a href="{{ route('admin.quiztemplates.edit', $quizTemplate->id) }}"
                                                    class="btn bg-gradient-info font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit category" style="width: 0.5x; height:32px">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>                                                    
                                                </a> &nbsp;
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn bg-gradient-danger font-weight-bold text-xs show-alert-delete-box"
                                                    data-toggle="tooltip" title='Delete' style="width: 0.5x; height:32px">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>                                                    
                                                </button>
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
