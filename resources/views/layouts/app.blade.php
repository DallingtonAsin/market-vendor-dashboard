<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="">
    <link rel="icon" type="image/png" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@include('components.company-name')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <link href="{{ asset('vendors/css/tailwind.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/fonts/montserrat/css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link href="{{ asset('vendors/jquery-confirm/jquery-confirm.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/paper-dashboard.css?v=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('css/quill.css') }}">
    <link rel="stylesheet" href="{{ asset('demo/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    @livewireStyles


    
    
    <!-- Scripts -->
    <script defer src="{{ asset('vendors/js/cdn.min.js') }}"></script>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    <script src="{{ asset('vendors/jquery-confirm/jquery-confirm.min.js') }}"></script>
    
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/quill.js') }}"></script>
    <script src="{{ asset('demo/demo.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>

    <script src="{{ asset('vendors/datatables/dtables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vendors/custom/js.js') }}"></script>
    <script src="{{ asset('assets/js/default.js') }}"></script> 

</head>
<body>

    @include('layouts.header')  
    @include('layouts.sidebar')

    {{ $slot }}

    @include('layouts.footer')  

    @livewire('livewire-ui-modal')
    @livewireScripts
    <script>
        $(document).ready(function() {
            demo.initChartsPages();
        });
    </script>
</body>
</html>