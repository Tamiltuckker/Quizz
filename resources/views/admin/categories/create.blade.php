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
                            <p class="mb-0">Create Category</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('categories.index') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Category Information</p>
                        <div class="row">
                            <form method="POST" name="categories" enctype="multipart/form-data" action="{{ route('categories.store') }}">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Category
                                            image</label>                                       
                                        <input type="file" name="image"  class="form-control form-group" accept="image/*">  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Category
                                            name</label>
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
