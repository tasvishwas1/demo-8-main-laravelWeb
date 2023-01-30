<link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
      rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
<link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css')}}">
<!-- Datatable Css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropify-min.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">

<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/admin')) !!};
    var JS_URL = '{{url('/')}}';
    var is_admin_open = 1;
</script>

@yield('style')
