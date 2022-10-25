@extends('layouts.app')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger text-white" role="alert">{{ $error }}</p>
                            @endforeach
                        @endif
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Category</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('categories.index') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Edit-Category Information</p>
                        <div class="row">
                            <form method="POST" name="categories" action="{{ route('categories.update', $category->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Category
                                            name</label>
                                        <input class="form-control" name="name" type="text"
                                            value="{{ old('name', $category->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                        <div class="form-check form-switch ">
                                            <input type="hidden" value="{{ $category->id }}" name="categoryid">
                                            @if ($category->active ==  \App\Models\Category::ACTIVE)
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                        </div>
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
