<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('theme/assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('theme/assets/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('theme/css/fontastic.css')}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('theme/css/style.blue.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('theme/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <div class="page">
        <!-- Main Navbar-->
        @include('layouts.navbar')
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            @auth
            @include('layouts.sidebar')
            @endauth

            <div class="content-inner" @guest style="width: 100%" @endguest>
                <!-- Page Footer-->
                @yield('content')
                @include('layouts.footer')
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('theme/assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('theme/assets/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('theme/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/assets/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('theme/assets/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <!-- Main File-->
    <script src="{{asset('theme/js/front.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": "{{csrf_token()}}"
            }
        })
        $(".logout").click(function(){
            event.preventDefault()
            $.ajax({
                url: "/logout",
                method: "POST",
                success: function(data){
                    location.reload()
                }
            })
        })
        $(".payment").click(function(event){
            event.preventDefault()
            $("#modal-payment").find("form").attr("action", $(this).attr("href"));
            $("#modal-payment").find("input[name='payment']").attr("max", $(this).attr("data-max"));
            $("#modal-payment").modal("toggle")
        })
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        })
    </script>
</body>

</html>