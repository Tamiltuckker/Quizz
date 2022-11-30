<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
      <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Quiz Program</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{Request::is('admin/dashboard')?'active':''}}" href="{{route('admin.dashboard.index')}}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::is('admin/users')?'active':''}}" href="{{route('admin.users.index')}}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-user-run text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Users</span>
        </a>
      </li>
    <li class="nav-item">         
        <a class="nav-link {{Request::is('admin/categories')?'active':''}}" href="{{ route('admin.categories.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Categories</span>          
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::is('admin/topics')?'active':''}}" href="{{ route('admin.topics.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Topics</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::is('admin/quiz templates')?'active':''}}" href="{{ route('admin.quiztemplates.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-app text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Quiz Templates</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="sidenav-footer mt-3 ">
    <div class="card card-plain shadow-none" id="sidenavCard">
      <img class="w-50 mx-auto" src="{{ asset('assets/img/illustrations/icon-documentation.svg') }}" alt="sidebar_illustration">
      <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
          <h6 class="mb-0">Users </h6>
          <p class="text-xs font-weight-bold mb-0">Quiz</p>
        </div>
      </div>
    </div>
  </div>
</aside>