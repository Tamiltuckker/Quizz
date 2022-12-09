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
                            <p class="mb-0">Edit CMS</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.contents.index') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Edit-CMS Information</p>
                        <div class="row">
                            <form method="POST" name="categories" enctype="multipart/form-data"
                                action="{{ route('admin.contents.update', $content->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">CMS
                                            Slug</label>
                                        <input class="form-control" name="slug" type="text" disabled
                                            value="{{ old('slug', $content->slug) }}">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">CMS
                                            Title</label>
                                        <input class="form-control" name="title" type="text"
                                            value="{{ old('title', $content->title) }}">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-textarea-input" class="form-control-label">
                                            Description</label>
                                        <textarea class="form-control" name="description" rows="10" cols="70">
                                        {{ old('description', $content->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                        <div class="form-check form-switch ">
                                            <input type="hidden" value="{{ $content->id }}" name="contentid">
                                            @if ($content->active == \App\Models\Content::ACTIVE)
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
