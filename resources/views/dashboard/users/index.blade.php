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
                <li class="breadcrumb-item active">@lang('site.users')</li>
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
               
                  <form action="{{ route('users.index') }}" method="get">
                  <div class="row">
                    <div class="col-md-4">

                        <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
 
                    </div>
                    
                    <div class="col-md-4">
                      <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> @lang('site.search')</button>
                      @if (auth()->user()->hasPermission('users_create'))
                          <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                      @else
                          <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                      @endif

                       

                    </div>
                  </div>
            
                  </form>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                
                  <div class="card-body">
                    @if ($users->count() > 0)
                    <table id="example" class="display table-bordered nowrap" style="width:100%">
                      <thead>
                          <tr>
                            <th>#</th>
                            <th>@lang('site.first_name')</th>
                            <th>@lang('site.last_name')</th>
                            <th>@lang('site.email')</th>
                            <th>@lang('site.action')</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $index=>$user)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ $user->first_name }}</td>
                          <td>{{ $user->last_name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                          @if (auth()->user()->hasPermission('users_update'))
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                            @else
                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                          @endif
                          @if (auth()->user()->hasPermission('users_delete'))
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline-block">
                              {{ csrf_field() }}
                              {{ method_field('delete') }}
                              <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                            </form><!-- end of form -->
                          @else
                              <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                          @endif
                        
                          </td>
                        </tr>
                       
                      </tbody>
                  @endforeach
                  </table>
                      <div >
                        
                      </div>
                     
                      @else
                        
                      <h2>@lang('site.no_data_found')</h2>
                      
                  @endif
                  </div>
                  <!-- /.card-body -->
  
                </form>
              </div>
              
              <!-- /.card -->
      </section>
    </div><!--End of content-wrappe -->

      
@endsection
