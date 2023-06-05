@extends('layouts.dashboard.app')

@section('content')

  
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@lang('site.users')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}"> @lang('site.users')</a></li>
                <li class="breadcrumb-item active">@lang('site.edit')</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">@lang('site.users')</h3>
               
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                
                  <div class="card-body">

                    @include('partials._errors')

                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">

                      {{ csrf_field() }}
                      {{ method_field('put') }}

                      <div class="form-group">
                          <label>@lang('site.first_name')</label>
                          <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
                      </div>

                      <div class="form-group">
                          <label>@lang('site.last_name')</label>
                          <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                      </div>

                      <div class="form-group">
                          <label>@lang('site.email')</label>
                          <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                      </div>
                      <div class="form-group">
                        <label>@lang('site.image')</label>
                        <input type="file" name="image" class="form-control image">
                    </div>
                    <div class="form-group">
                      <img src="{{ $user->image_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                  </div>

                    
                    <div class="form-group">
                      <label>@lang('site.permissions')</label>
                          <div class="row">
                            <div class="col-12">
                              <!-- Custom Tabs -->
                              <div class="card">
                                <div class="card-header d-flex p-0">
                                  @php
                                      $models = ['users', 'categories', 'products', 'clients', 'orders'];
                                      $maps = ['create', 'read', 'update', 'delete'];
                                 @endphp
                                  <ul class="nav nav-pills ml-auto p-2">
                                    @foreach ($models as $index=>$model)
                                    <li class="nav-item"><a class="nav-link {{ $index == 0 ? 'active' : '' }}" href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>
                                    @endforeach
                                  </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                  <div class="tab-content">
                                    @foreach ($models as $index=>$model)

                                    <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                      @foreach ($maps as $map)
                                      {{--create_users--}}
                                      <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission($model . '_' . $map) ? 'checked' : '' }} value="{{ $model . '_' . $map }}"> @lang('site.' . $map)</label>
                                  @endforeach


                                    </div>

                                @endforeach
                                  
                                  <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                              </div>
                              <!-- ./card -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                          <!-- END CUSTOM TABS -->
                      





                  </div>

                      

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                      </div>

                  </form><!-- end of form -->
                   



                  </div>
                  <!-- /.card-body -->
  
                </form>
              </div>
              <!-- /.card -->
      </section>
    </div><!--End of content-wrappe -->

      
@endsection
