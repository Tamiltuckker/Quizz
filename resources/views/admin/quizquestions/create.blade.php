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
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.quizquestions.index') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <p class="text-uppercase text-sm">Question Information</p> --}}
                        <div class="row">
                            <form method="POST" name="questions" enctype="multipart/form-data"
                                action="{{ route('admin.quizquestions.store') }}">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Choose Template *</label>
                                        {{ Form::select('quiztemplate_id', @$quiztemplates , null, ['class' => 'form-control form-control-solid form-select mb-2', 'placeholder' => 'Select Template']) }}                                        
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
                                        <div class = "col-sm-2"><input type="radio"> </div>
                                        <div class = "col-sm-8"><input class="form-control" name="option[]" type="text" placeholder="option1"> </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-sm-2"><input type="radio"> </div>
                                        <div class = "col-sm-8"><input class="form-control" name="option[]" type="text" placeholder="option1"> </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-sm-2"><input type="radio"> </div>
                                        <div class = "col-sm-8"><input class="form-control" name="option[]" type="text" placeholder="option1"> </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-sm-2"><input type="radio"> </div>
                                        <div class = "col-sm-8"><input class="form-control" name="option[]" type="text" placeholder="option1"> </div>
                                    </div>
                                </div>
                               
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Question
                                            image</label>
                                        <input type="file" name="image" class="form-control form-group"
                                            accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6">
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
