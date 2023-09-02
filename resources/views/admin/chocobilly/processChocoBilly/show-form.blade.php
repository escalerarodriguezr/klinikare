@extends('layouts.master')

@section('title')
    Procesar Choco Billy
@endsection

@section('page-css')

@endsection

@section('content')

    @include(
    'admin.shared.includes.breadcrumb',
    [
        'title' => "Procesa Choco Billy",
        'level_1_title' => "Procesar Choco Billy"
    ]
    )

    <form id="process-chocobilly"
          action="{{route(\App\Http\Controllers\Admin\ChocoBilly\ProcessChocoBilly\PostProcessChocoBillyController::ROUTE_NAME)}}"
          method="post"
          enctype="multipart/form-data">
        @csrf

        @include('admin.chocobilly.processChocoBilly.include.form')


    </form>








@endsection

@section('script-bottom')

    <script src="{{ URL::asset('admin/js/chocobilly/process-chocobilly/show-form.js')}}"></script>
@endsection
