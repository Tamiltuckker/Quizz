@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div>
                        <a class="btn bg-gradient-primary font-weight-bold text-xs float-end" href="{{ route('admin.topics.create') }}">Create</a>
                    </div>
                    <h6>Topics Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Topic Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">topic
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $topic)
                                    <tr>
                                        <td>
                                            <div>
                                                @if ($topic->image != null)
                                                    <img src="{{ asset('/storage/image/' . $topic->image->image) }}"
                                                        class="avatar avatar-sm me-3" alt="topic1">
                                                @elseif ($topic->image == null)
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                        alt="topic1">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{ $topic->name }} </h6>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($topic->active == \App\Models\Topic::ACTIVE)
                                                <span class="badge badge-sm bg-gradient-success">Active</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <form method="POST" action="{{ route('admin.topics.destroy', $topic->id) }}">
                                                <a href="{{ route('admin.topics.edit', $topic->id) }}"
                                                    class="btn bg-gradient-info font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit topic">
                                                    Edit
                                                </a>
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn bg-gradient-danger font-weight-bold text-xs show-alert-delete-box"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>
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
