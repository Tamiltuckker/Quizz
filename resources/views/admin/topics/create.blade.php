@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Create Topic</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('topics.index') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body"> 
                        <p class="text-uppercase text-sm">Topic Information</p>
                        <div class="row">
                            <form method="POST" name="topics" action="{{ route('topics.store') }}">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Categories *</label>
                                        {{ Form::select('category_id', @$categories, NULL, ['class' => 'form-control form-control-solid form-select mb-2', 'placeholder' => 'Select Category']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Topi Name</label>
                                        <input class="form-control" name="name" type="text" placeholder="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                        <div class="form-check form-switch ">
                                            <input class="form-check-input" type="checkbox" name="active"
                                                id="flexSwitchCheckDefault" checked data-toggle="toggle" data-on="1"
                                                data-off="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="submit" class="btn btn-danger">Cancel</button>
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