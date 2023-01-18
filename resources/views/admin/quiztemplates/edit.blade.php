@extends('layouts.app')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                {{ Breadcrumbs::render('quiztemplate', $quizTemplate->id) }}
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
                        {!! Form::model($quizTemplate, ['method' => 'PATCH', 'route' => ['admin.quiztemplates.update', $quizTemplate->id]]) !!}
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="inputAddress">Categories *</label>
                                        {{ Form::select('category_id',@$categories, old('category_id'), ['class' => 'form-control form-control-solid form-select mb-2', 'placeholder' => 'Select Category']) }}
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Template name</label>
                                        <input class="form-control" name="name" type="text"
                                            value="{{ old('name', $quizTemplate->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Published date</label>
                                        <input class="form-control" name="date" type="date"
                                            value="{{ old('date', $quizTemplate->date) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-gradient-success font-weight-bold text-xs">Save</button>
                                        <button type="submit" class="btn bg-gradient-danger font-weight-bold text-xs">Cancel</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
