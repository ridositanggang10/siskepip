<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>siskepip | dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ asset('admin/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{ asset('admin/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('admin/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('admin/dist/img/Logo-F.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('admin/dist/img/Logo-F.png')}}">

    <link href="{{ asset('user/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('user/circle.css') }}" rel="stylesheet">
</head>

<body class="skin-green">
    <div class="wrapper">
        @include('components.admin-header')
        @include('components.admin-sidebar')
          {{ $slot }}
        @include('components.admin-footer')
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('admin/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/app.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    
    <!-- iCheck -->
    <script src="{{ asset('admin/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('admin/plugins/chartjs/Chart.min.js')}}" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('admin/plugins/morris/morris.min.js" type="text/javascript')}}"></script>

    <!-- page script -->
    <script type="text/javascript">
        $(function () {
          "use strict";
  
          //BAR CHART
          var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: [
              {y: '2006', a: 100, b: 90, c:50, d:70},
              {y: '2007', a: 75, b: 65, c:50, d:70},
              {y: '2008', a: 50, b: 40, c:50, d:70},
              {y: '2009', a: 75, b: 65, c:50, d:70},
              {y: '2010', a: 50, b: 40, c:50, d:70},
              {y: '2011', a: 75, b: 65, c:50, d:70},
              {y: '2012', a: 100, b: 90, c:50, d:70}
            ],
            barColors: ['#00a65a', '#f56954', '#3c8dbc', '#F39C12'],
            xkey: 'y',
            ykeys: ['a', 'b', 'c', 'd'],
            labels: ['Sekda', 'Sek-dprd', 'Badan', 'Dinas'],
            hideHover: 'auto'
          });
        });
      </script>
</body>

</html>