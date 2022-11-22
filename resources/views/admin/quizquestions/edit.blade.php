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
                            <p class="mb-0">Edit Questions</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.quizquestions.index',$quizTemplate->id) }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Edit Question Information</p>
                        <div class="row">
                            <form method="POST" name="questions" enctype="multipart/form-data"
                                action="{{ route('admin.quizquestions.update', [$quizTemplate->id , $quizQuestion->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="inputAddress">Choose Template *</label>
                                        <h4><b> {{ $quizTemplate->name }} </b></h4>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Question</label>
                                        <input class="form-control" name="question" value = "{{$quizQuestion->question}}"  type="text" placeholder="question">
                                    </div>
                                </div>                                
                               
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-textarea-input" class="form-control-label">Description</label>                                       
                                        <textarea class="form-control" name="description" rows="4" cols="50" placeholder="Description"> {{$quizQuestion->description}} </textarea>
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
                                    @foreach($quizOptions as $key => $option)   
                                        <div class="row mt-2">
                                            {{ Form::hidden("quiz_option[$key][option_id]", @$option->id) }}
                                            <div class = "col-sm-2">
                                                {{ Form::hidden("quiz_option[$key][is_correct]", '0') }}
                                                {{ Form::radio("quiz_option[$key][is_correct]", '1',@$option->is_correct, ['class' => 'custom-control-input single-type', 'id' => $key.'-single-type']) }}
                                            </div>
                                            <div class = "col-sm-8">
                                                {{ Form::text("quiz_option[$key][option]", @$option->option, ['class' => 'form-control custom-text-box']) }}
                                            </div>
                                        </div>
                                    @endforeach
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

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
            $('body').on('change', '.single-type', function(){
                $(".single-type").prop('checked', false);
                $(this).prop('checked', true);
            });
        });
    </script>
@endpush
@endsection 

