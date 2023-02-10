@foreach ($settings as $setting)
<link rel="shortcut icon" href="{{ asset('backend/img/settings/favicon/'. $setting->favicon) }}" type="image/x-icon">
@endforeach
<!-- reset css -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/css_reset.css') }}">
<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/jquery.datetimepicker.min.css') }}">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">
{{-- Toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- preload -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/loaders.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/index.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/custom.css') }}">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->