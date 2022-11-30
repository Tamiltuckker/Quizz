@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('flash-message')
                        @yield('content')
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        User</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users['users'] as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if ($user->image != null)
                                                        <img src="{{ asset('/storage/image/' . $user->image->image) }}"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    @elseif ($user->image == null)
                                                        <img src="../assets/img/user.png" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{ $user->name }} </h6>
                                                    <p class="text-xs text-secondary mb-0"> {{ $user->email }} </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($user->active == \App\Models\User::ACTIVE)
                                                <span class="badge badge-sm bg-gradient-success">Active</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ date('d-m-Y', strtotime($user->created_at)) }} </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                                <a class="btn bg-gradient-warning font-weight-bold text-xs" href="{{ route('admin.getansweredtemplates',$user->id) }}">Quiz Answered Templates</a>
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="btn bg-gradient-info font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
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
