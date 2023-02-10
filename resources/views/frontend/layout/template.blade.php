<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Header --}}
        @include('frontend.includes.header')
        {{-- Css --}}
        @include('frontend.includes.css')
    </head>
    <body class="">
        <!-- MAIN -->
        <div class="load-wrap">
            <div class="wheel-load">
                <img src="{{ asset('frontend/assets/images/loader.gif') }}" alt="" class="image">
            </div>
        </div>
        {{-- Navbar --}}
        @include('frontend.includes.navbar')
        <!-- MAIN -->
        @yield('body-content')
        <!-- FOOTER -->
        <!-- ///////////////// -->
        @include('frontend.includes.footer')
        {{-- Script --}}
        @include('frontend.includes.script')
        @yield('pageScripts')
    </body>
</html>