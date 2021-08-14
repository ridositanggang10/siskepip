<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('user/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ asset('user/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('user/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{ asset('user/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('user/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('user/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('user/circle.css') }}" rel="stylesheet">

    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('/images/logos/Logo-F.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('/images/logos/Logo-F.png') }}">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-green">
    <div class="wrapper">
        @include('components.user-header')
        @include('components.user-sidebar')
            {{ $slot }}
        @include('components.user-footer')
    </div>

    <!-- jQuery 2.1.3 -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('user/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('user/plugins/fastclick/fastclick.min.js') }}"  type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('user/dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{ asset('user/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ asset('user/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('user/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{ asset('user/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset('user/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset('user/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('user/plugins/chartjs/Chart.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('user/dist/js/pages/dashboard2.js') }}" type="text/javascript"></script>


    <script src="{{ asset('user/main.js') }}" type="text/javascript"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
        <script>
            $(function(){
            $('#foto').on('change', function(e) {
                let size = this.files[0].size;
                
                $('#size').text(size);
                
                if (size > 2000000) {
                    alert('Ukuran file tidak boleh lebih dari 2mb');
                }
            });
        })
        </script>
        <script>
            $(function(){
            $('#file').on('change', function(e) {
                let size = this.files[0].size;
                
                $('#size_file').text(size);
                
                if (size > 10485760) {
                    alert('Ukuran file tidak boleh lebih dari 10mb');
                }
            });
        })
    </script>

</body>

</html>
