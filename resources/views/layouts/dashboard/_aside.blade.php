 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img class="brand-image img-circle elevation-3" style="opacity: .8" src="{{asset('uploads/app_logo/logo.jpeg')}}">
      <span class="brand-text font-weight-light">@lang('site.nomApplication')</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar"  >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img class="img-circle elevation-2" alt="User Image" src="{{auth()->user()->image_path}}">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->first_name }} {{auth()->user()->last_name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
-->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                @lang('site.dashboard')
              </p>
            </a>
          
          </li>
          @if (auth()->user()->hasPermission('users_delete'))
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="fa fa-users"></i>
              <p>
                @lang('site.users')
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>