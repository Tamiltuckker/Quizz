@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                {!! Breadcrumbs::render() !!}
                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['admin.users.update', $user->id], 'files' => true]) !!}
                <div class="card">
                    <div class="card-header pb-0">
                        @include('flash-message')
                        @yield('content')
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Profile</p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.users.index') }}">Back</a>                            
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Information</p>
                        <div class="row">
                            <div class="col-md-12 shadow">
                                <div class="form-group">
                                    @if ($user->image != null)
                                        <img src="{{ asset('/storage/image/' . $user->image->image) }}"
                                            class="rounded-circle img-fluid border border-2 border-red"
                                            style="width: 100px; height:100px;">
                                    @elseif ($user->image == null)
                                        <img src="{{ asset('assets/img/team-2.jpg') }}"
                                            class="rounded-circle img-fluid border border-2 border-red"
                                            style="width: 100px; height:100px;">
                                    @endif
                                    <span class="file-input btn-file edit-img-btn">
                                        <i class="ni ni-camera-compact"></i>
                                    </span>
                                </div>                           
                                <div class="col-md-12">
                                    <div class="form-group" style="width:640px;">
                                        <input name="image" type="file" class="dropify" data-height="100" />
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Name</label>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email address</label>
                                    {!! Form::text('email', old('email'), ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Password</label>
                                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Confirm Password</label>
                                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name='active'
                                            id="flexSwitchCheckDefault" checked="">
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
                        </div>
                        <hr class="horizontal dark">
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="{{ asset('assets/img/bg-profile.jpg') }}" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                @if ($user->image != null)
                                    <img src="{{ asset('/storage/image/' . $user->image->image) }}"
                                        class="rounded-circle img-fluid border border-2 border-white" alt="user1">
                                @elseif ($user->image == null)
                                    <img src="{{ asset('assets/img/team-2.jpg') }}"
                                        class="rounded-circle img-fluid border border-2 border-white" alt="user1">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                    class="ni ni-collection"></i></a>
                            <a href="javascript:;"
                                class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                    class="ni ni-email-83"></i></a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        @php $total = 0; @endphp
                                        @php
                                        foreach ($categoryAnsCounts as $key => $categoryAnsCount) {
                                                $anscategoryCount = \App\Models\QuizAnswer::where('category_id', $key)
                                                    ->get()
                                                    ->groupBy('quiz_template_id')
                                                    ->count();
                                            
                                                $totalCategorycount = \App\Models\QuizTemplate::where('category_id', '=', $key)
                                                    ->get()
                                                    ->count();
                                            
                                                if ($anscategoryCount === $totalCategorycount) {
                                                    $total++;
                                                }
                                            }
                                        @endphp
                                        <span class="heading"> {{ $total }}</span>
                                        <span class="description">categories</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ count($quizAnsweredTemplates) }}</span>
                                        <span class="description">templates</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ count($quizpoints) }}</span>
                                        <span class="description">Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                                   
                        <div class="text-center mt-4">
                            <h5>
                                {{ $user->name }}
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $user->email }}
                            </div>                                                  
                        </div>
                    </div>
                </div>
                <hr class="my-4">    
            </div>
        </div>
    </div>
    @push('css')
        <link href="{{ asset('assets/css/userprofile.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">        
    @endpush
    @push('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
        <script type="text/javascript">
            $('.dropify').dropify();
        </script> 
    @endpush 
@endsection
