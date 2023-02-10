    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jewel Theme">
    <meta name="description" content="Wheel - Responsive and Modern Car Rental Website Template">
    <meta name="keywords" content="">
    <title>@section('site-title')@foreach ($settings as $setting)
        {{ $setting->site_title }}
    @endforeach - @yield('title')</title>