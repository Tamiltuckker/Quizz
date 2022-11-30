@extends('layouts.app')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                {!! Breadcrumbs::render() !!}
                <div class="card">
                    <div class="card-header pb-0">
                        @include('flash-message')      
                        @yield('content')  
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Category</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.categories.index') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Edit-Category Information</p>
                        <div class="row">
                            <form method="POST" name="categories" enctype="multipart/form-data" action="{{ route('admin.categories.update', $category->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12 shadow">
                                    <div class="form-group">
                                        @if ($category->image != null)
                                            <img src="{{ asset('/storage/image/' . $category->image->image) }}" class="rounded-circle img-fluid border border-2 border-red" style="width: 100px; height:100px;"> 
                                        @elseif ($category->image == null)
                                            <img src="{{ asset('assets/img/team-2.jpg') }}" class="rounded-circle img-fluid border border-2 border-red"  style="width: 100px; height:100px;">
                                        @endif
                                        <span class="file-input btn-file edit-img-btn">
                                            <i class="ni ni-camera-compact"></i> 
                                        </span>
                                    </div> 
                                    <input type="file" name="image"  class="form-control form-group" accept="image/*">       
                                </div>
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
