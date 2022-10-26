@extends('layouts.app')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                {!! Form::model($topic, ['method' => 'PATCH', 'route' => ['topics.update', $topic->id],'files' => true ]) !!}
                    <div class="card">
                        <div class="card-header pb-0">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-white" role="alert">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <a class="btn btn-primary btn-sm ms-auto" href="{{ route('topics.index') }}">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Topic Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputAddress">Categories *</label>
                                        {{ Form::select('category_id', @$categories, NULL, ['class' => 'form-control form-control-solid form-select mb-2', 'placeholder' => 'Select Category']) }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                        <div class="form-check form-switch ">
                                            <input type="hidden" value="{{ $topic->id }}" name="topicid">
                                            @if ($topic->active ==  \App\Models\Topic::ACTIVE)
                                                <input class="form-check-input" type="checkbox" name="active"
                                                    id="flexSwitchCheckDefault" checked data-toggle="toggle" data-on="1"
                                                    data-off="0">
                                            @else
                                                <input class="form-check-input" type="checkbox" name="active"
                                                    id="flexSwitchCheckDefault" data-toggle="toggle" data-on="1"
                                                    data-off="0">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Save</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href="{{ route('topics.index') }}"
                                            class="btn btn-sm btn-danger float-right mb-0 d-none d-lg-block">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
