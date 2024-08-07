<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ Vite::asset('resources/assets/img/favicon.png') }}">
@vite([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/plugins/fontawesome/css/fontawesome.min.css',
    'resources/assets/plugins/fontawesome/css/all.min.css',
    'resources/assets/css/line-awesome.min.css',
    'resources/assets/css/material.css',
    'resources/assets/css/bootstrap-datetimepicker.min.css',
    'resources/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css',
    'resources/assets/css/style.css',
    'resources/css/app.scss',
])
<!-- Vendor CSS -->
@stack('vendor-styles')
@yield('vendor-styles')
<!-- Custom CSS -->
@livewireStyles
@stack('page-styles')
@stack('style')