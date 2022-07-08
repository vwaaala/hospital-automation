<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    @yield('style')
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" />
</head>
<body>
<div class="container-scroller">
    @include('admin.partials.sidebar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.partials.topbar')
        <div class="main-panel">
            @include('layouts.partials.session')
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('layouts.partials.footer')
        </div>
    </div>
</div>
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset('assets/js/off-canvas.js')}}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('assets/js/misc.js')}}"></script>
<script src="{{ asset('assets/js/settings.js')}}"></script>
<script src="{{ asset('assets/js/todolist.js')}}"></script>
@yield('script')
</body>
</html>