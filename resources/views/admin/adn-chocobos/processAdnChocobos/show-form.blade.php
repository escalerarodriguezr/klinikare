@extends('layouts.master')

@section('title')
    Procesar ADN Chocobos
@endsection

@section('page-css')

@endsection

@section('content')

    @include(
    'admin.shared.includes.breadcrumb',
    [
        'title' => "Procesar ADN Chocobos",
        'level_1_title' => "Procesar ADN Chocobos"
    ]
    )

    <form id="process-adn-chocobos"
          action="{{route(\App\Http\Controllers\Admin\AdnChocobos\ProcessAdnChocobos\PostProcessAdnChocobosController::ROUTE_NAME)}}"
          method="post"
          enctype="multipart/form-data">
        @csrf

        @include('admin.adn-chocobos.processAdnChocobos.include.form')


    </form>








@endsection

@section('script-bottom')

    <script src="{{ URL::asset('admin/js/adn-chocobos/process-adn-chocobos/show-form.js')}}"></script>
@endsection
