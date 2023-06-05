<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@lang('site.nomApplication') | @lang('site.dashboard')</title>

 {{--noty--}}
 <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
 <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

 
  @if (app()->getLocale() == 'ar')

<!-- RTL -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/rtl/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrapp.min.css') }}">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/rtl/css/custom.css') }}">
  @else
   
<!-- LTE -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/summernote/summernote-bs4.min.css') }}">
  @endif

  <link rel="stylesheet" href="{{ asset('dashboard_files/css/datatable/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard_files/css/datatable/rowReorder.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard_files/css/datatable/responsive.dataTables.min.css') }}">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @if (!app()->getLocale() == 'ar')

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" style="height:60px;width:60px" src="{{ asset('dashboard_files/img/AdminLTELogo.png  ') }}">
  </div>
  @endif
  
  @include('layouts.dashboard._navbar')
  @include('layouts.dashboard._aside')

  @yield('content')

  @include('partials._session')
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {

       
        //delete
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('site.confirm_delete')",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete

        // // image preview
        // $(".image").change(function () {
        //
        //     if (this.files && this.files[0]) {
        //         var reader = new FileReader();
        //
        //         reader.onload = function (e) {
        //             $('.image-preview').attr('src', e.target.result);
        //         }
        //
        //         reader.readAsDataURL(this.files[0]);
        //     }
        //
        // });

      

    });//end of ready
    
</script>
@stack('scripts')
  @include('layouts.dashboard._footer')

 