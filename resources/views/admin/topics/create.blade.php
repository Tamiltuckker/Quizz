@extends('layouts.app')

@section('content')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />        
@endpush
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        @include('flash-message')
                        @yield('content')
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Create Topic</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.topics.index') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Topic Information</p>
                        <div class="row">
                            <form method="POST" name="topics" enctype="multipart/form-data"
                                action="{{ route('admin.topics.store') }}">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Topic
                                            image</label>
                                        <input type="file" name="image" class="form-control form-group"
                                            accept="image/*">
                                    </div>
                                </div>                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Categories *</label>
                                        {{ Form::select('category_id', @$categories, null, ['class' => 'form-control form-control-solid form-select mb-2 single-select2', 'placeholder' => 'Select Category']) }}
                                    </div>
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Topic Name</label>
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
    @include('script')     
@endsection
