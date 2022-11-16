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
                            <p class="mb-0">Edit Quiz</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.quiztemplates.index') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Edit-Quiz Information</p>
                        <div class="row">
                            <form method="POST" name="quiztemplates" action="{{ route('admin.quiztemplates.update', $quiztemplate->id) }}">
                                @csrf
                                @method('PUT')
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Quiz
                                            name</label>
                                        <input class="form-control" name="name" type="text"
                                            value="{{ old('name', $quiztemplate->name) }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-gradient-success font-weight-bold text-xs">Save</button>
                                        <button type="submit" class="btn bg-gradient-danger font-weight-bold text-xs">Cancel</button>
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
