<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/ixcoders.png') }}" type="image/x-icon" />
    {{-- <link rel="stylesheet" href="{{ asset('vendor/mckenziearts/laravel-notify/js/notify.js') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>IXCoders | @yield('title')</title>
</head>

<body>

    @include('layouts.navbar')

    @yield('index')

    @yield('room_form')

    @yield('room')

    @yield('room_edit')

    @yield('delete_room')

    @yield('topics')

    @yield('profile')


    <script src="{{ asset('js/script.js') }}"></script>
    {{-- <script src="{{ asset('vendor/mckenziearts/laravel-notify/js/notify.js') }}"></script> --}}
</body>

</html>
