@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        @include('flash-message')      
                        @yield('content')  
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Create Questions</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.quizquestions.index',$quizTemplate->id) }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Question Information</p>
                        <div class="row">
                            <form method="POST" name="questions" enctype="multipart/form-data"
                                action="{{ route('admin.quizquestions.store', $quizTemplate->id) }}">
                                @csrf
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="inputAddress">Template Name *</label>
                                        <h4><b> {{ $quizTemplate->name }} </b></h4>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Question</label>
                                        <input class="form-control" name="question" type="text" placeholder="question">
                                    </div>
                                </div>                                
                               
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-textarea-input" class="form-control-label">Description</label>                                       
                                        <textarea class="form-control" name="description" rows="4" cols="50" placeholder="Description"></textarea>
                                    </div>
                                </div>

                                <div class>
                                    <div>
                                        <label for="example-text-input" class="form-control-label">Options</label>
                                    </div>
                                <div class="container">   
                                    <div class="row">
                                        <div class = "col-sm-2"><label for="example-text-input" class="form-control-label">Correct</label></div>
                                        <div class = "col-sm-8"><label for="example-text-input" class="form-control-label">Options</label> </div>
                                    </div>                                
                                    <div class="row">
                                        <div class = "col-sm-2">
                                            {{ Form::hidden("quiz_option[0][is_correct]", '0') }}
                                            {{ Form::radio("quiz_option[0][is_correct]", '1',null, ['class' => 'custom-control-input', 'id' => '0']) }}
                                        </div>
                                        <div class = "col-sm-8">
                                             {{ Form::text("quiz_option[0][option]", null, ['class' => 'form-control custom-text-box']) }}
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class = "col-sm-2">
                                            {{ Form::hidden("quiz_option[1][is_correct]", '0') }}
                                            {{ Form::radio("quiz_option[1][is_correct]", '1',null, ['class' => 'custom-control-input', 'id' => '1']) }}
                                       </div>
                                        <div class = "col-sm-8">
                                            {{ Form::text("quiz_option[1][option]", null, ['class' => 'form-control custom-text-box']) }}
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class = "col-sm-2">
                                            {{ Form::hidden("quiz_option[2][is_correct]", '0') }}
                                            {{ Form::radio("quiz_option[2][is_correct]", '1',null, ['class' => 'custom-control-input', 'id' => '2']) }}
                                        </div>
                                        <div class = "col-sm-8">
                                             {{ Form::text("quiz_option[2][option]", null, ['class' => 'form-control custom-text-box']) }}
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn bg-gradient-success font-weight-bold text-xs">Save</button>
                                        <button type="submit"
                                            class="btn bg-gradient-danger font-weight-bold text-xs">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
@endsection 
