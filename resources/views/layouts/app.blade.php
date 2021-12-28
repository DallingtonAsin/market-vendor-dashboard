<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  
  <link rel="shortcut icon" href="{{ asset('images/icons/office1.ico') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="{{ asset('vendors/fonts/montserrat/css.css') }}" rel="stylesheet">
   {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;1,200" rel="stylesheet"> --}}
  
  @livewireStyles
  
  
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> 
  <script src="{{ asset('js/jquery-confirm.min.js') }}"></script> 
  
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
  <script src="{{ asset('vendors/notify/notify.js') }}"></script>
  <script src="{{ asset('vendors/js/bootstrap3-typeahead.min.js') }}"></script>
  
  <script src="{{ asset('vendors/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('vendors/jquery-tabledit/jquery.tabledit.min.js') }}"></script>
  <script src="{{ asset ('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script  src="{{ asset ('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript" ></script>
  <script  src="{{ asset ('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript" ></script>
  <script  src="{{ asset ('bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript" ></script>
  <script  src="{{ asset ('bower_components/AdminLTE/plugins/fastclick/fastclick.js') }}" type="text/javascript" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script  src="{{ asset ('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript" ></script>
  <script  src="{{ asset ('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript" ></script>
  <script  src="{{ asset ('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript" ></script>
  <script  src="{{ asset ('bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript" ></script>
  <script  src="{{ asset ('bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript" ></script>
  <script src="{{ asset ('bower_components/AdminLTE/dist/js/app.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset ('bower_components/AdminLTE/dist/js/demo.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendors/js/Chart.bundle.min.js') }}"></script>
  <script src="{{ asset('vendors/js/chart.flot.sampledata.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
  <script src="{{ asset('js/Chart.min.js') }}"></script>
  
  <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
  <link href="{{ asset('vendors/css/notification.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables/dtables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables/dtables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css') }}" type="text/css"/>
  <link href="{{ asset('vendors/jquery-confirm/jquery-confirm.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('vendors/js/dataTables.jqueryui.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/js/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/bootstrap3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('vendors/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('bower_components/AdminLTE/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('bower_components/AdminLTE/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('bower_components/AdminLTE/dist/css/skins/_all-skins.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/app-template.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @livewireStyles
  
</head>


<!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
-->


<body class="hold-transition skin-blue sidebar-boxed">
  <div class="wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')
    
    <div>
    {{$slot}}
    </div>
    @include('layouts.footer')
    
    @livewireScripts
    
    <script>
      
      
      $(document).ready(function() {


        $('#assignee').multiselect();
        // $('#assigneee').multiselect();



        
        //Date picker
        $('#birthDate').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#hiredDate').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#from').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#to').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
      });
    </script>
    <script src="{{ asset('js/site.js') }}"></script>
  </body>
  </html>