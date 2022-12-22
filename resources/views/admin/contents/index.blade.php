@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            {!! Breadcrumbs::render() !!}  
            <div class="card mb-4">
                <div class="card-header pb-0">                   
                    <h6>Content Management Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('flash-message')
                        @yield('content')
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Slug</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contents as $content)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $content->slug }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $content->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($content->active == \App\Models\Content::ACTIVE)
                                                <span class="badge badge-sm bg-gradient-success">active </span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-danger">inactive</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <a href="{{ route('admin.contents.edit', $content->id) }}" class="btn bg-gradient-info font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit content" style="width: 0.5x; height:32px">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>                                                
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('script')
@endsection
