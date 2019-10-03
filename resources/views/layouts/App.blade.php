<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/favicon.png">
    <title>Aplikasi Manajemen Sekolah</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('assets') }}/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('assets') }}/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets') }}/dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('assets') }}/dist/css/pages/dashboard1.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="{{ asset('assets') }}/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!--DataTables CSS -->
    <link href="{{ asset('assets') }}/node_modules/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="horizontal-nav boxed skin-megna fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layouts.includes._header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layouts.includes._side')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Modal -->
        <!-- ============================================================== -->
        @include('layouts.includes._modal')
        <!-- ============================================================== -->
        <!-- End Modal -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('layouts.includes._footer')
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets') }}/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('assets') }}/node_modules/popper/popper.min.js"></script>
    <script src="{{ asset('assets') }}/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets') }}/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets') }}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets') }}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets') }}/dist/js/custom.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="{{ asset('assets') }}/node_modules/sweetalert/sweetalert.min.js"></script>
    <script src="{{ asset('assets') }}/node_modules/sweetalert/jquery.sweet-alert.custom.js"></script>
    @include('sweetalert::alert')
    <!-- This is data table -->
    <script src="{{ asset('assets') }}/node_modules/datatables/datatables.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('assets') }}/node_modules/raphael/raphael-min.js"></script>
    <script src="{{ asset('assets') }}/node_modules/morrisjs/morris.min.js"></script>
    <script src="{{ asset('assets') }}/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- ============================================================== -->
    <!--Form Script modal -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Popup message jquery -->
    {{-- <script src="{{ asset('assets') }}/node_modules/toast-master/js/jquery.toast.js"></script> --}}
    <!-- Chart JS -->
    <script src="{{ asset('assets') }}/dist/js/dashboard1.js"></script>
    {{-- <script src="{{ asset('assets') }}/node_modules/toast-master/js/jquery.toast.js"></script> --}}
    @stack('scripts')
    <script>
        $(function(){
            $('#chat, #msg, #comment, #todo').perfectScrollbar();
        });
    </script>
</body>

</html>