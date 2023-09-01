@extends('layouts.master')

@section('title')
    Hola amigos
@endsection

@section('page-css')

@endsection

@section('content')

    @include(
    'admin.shared.includes.breadcrumb',
    [
        'title' => 'Dashboard'
    ]
    )

{{--    @component('components.breadcrumb')--}}
{{--        @slot('li_1') Utility @endslot--}}
{{--        @slot('title') Starter Page @endslot--}}
{{--    @endcomponent--}}

@endsection
