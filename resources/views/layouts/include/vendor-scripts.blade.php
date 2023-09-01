<!-- JAVASCRIPT -->
<script src="{{ URL::asset('admin/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('admin/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{ URL::asset('admin/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('admin/libs/node-waves/waves.min.js')}}"></script>

{{--Publins--}}
<script src="{{ URL::asset('admin/vendor/vanila-toast/toast.js')}}"></script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('admin/js/framework.js')}}"></script>
<script src="{{ URL::asset('admin/js/app.js')}}"></script>

@yield('script-bottom')
