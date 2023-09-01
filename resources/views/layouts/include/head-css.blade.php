@yield('css')

<!-- Bootstrap Css -->
<link href="{{ URL::asset('admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

{{--Plugins--}}
<link href="{{ URL::asset('admin/vendor/vanila-toast/toast.css') }}" id="app-style" rel="stylesheet" type="text/css" />

{{--<!-- App Css-->--}}
<link href="{{ URL::asset('admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('admin/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />

@yield('page-css')
