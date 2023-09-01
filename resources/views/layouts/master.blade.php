<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Laravel Default</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('admin/images/favicon.ico') }}">
    @include('layouts.include.head-css')
</head>

@section('body')
    <body data-sidebar="light">
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.include.topbar')
        @include('layouts.include.sidebar')
        @include('admin.shared.includes.notification')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.include.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    @include('layouts.include.vendor-scripts')
</body>

</html>
