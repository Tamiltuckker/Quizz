@extends('layouts.frontend')
@section('content')

  <div class="main-content">
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 300px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ asset('/storage/image/' . $user->image->image) }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                    {{ $user->name }} <span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i> {{ $user->email }} 
                </div>
                <hr class="my-4">
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user.profiles.update', $user->id], 'files' => true]) !!}
            <h6 class="heading-small text-muted mb-4">profile</h6>
            <div class="row">
              <div class="col-lg-6">
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
                <input type="file" name="image" class="form-control form-group" accept="image/*">
            </div>
              </div>
            </div>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" id="input-name" name="name" class="form-control form-control-alternative" placeholder="Name" value="{{ $user->name }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" name="email" class="form-control form-control-alternative" placeholder="Email" value="{{ $user->email }}">
                      </div>
                    </div>
                  </div>
                  <h6 class="heading-small text-muted mb-4">Change Password</h6>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Password</label>
                        <input type="password" id="input-first-name" name="password" class="form-control form-control-alternative" placeholder="Password">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-confirm-password">Confirm Password</label>
                        <input type="password" id="input-confirm-password" name="confirm-password"  class="form-control form-control-alternative" placeholder="Confirm Password">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <button type="submit" class="btn btn-info font-weight-bold text-xs">Update</button>
                    <a href="#!" class="btn btn-secondary">Back</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@push('css')
    <link href="{{ asset('assets/css/userprofile.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
@endpush

@endsection