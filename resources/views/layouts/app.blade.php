<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
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
    <!--Toastr-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--DataTables-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('theme/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
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
    <script src="{{asset('js/datepicker.es.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
        $(".destroy").click(function(event){
            event.preventDefault()
            if(confirm("¿Desea eliminar?")){
                $.ajax({
                    url: $(this).attr("href"),
                    method: "DELETE",
                    success: function(data){
                        location.reload()
                    },
                    error: function(data){
                        toastr.error("<strong>Error: </strong>Consulte al administrador")
                        new Audio("{{asset('sounds/error.mp3')}}").play()
                    }
                })
            }
        })
        $(".payment").click(function(event){
            event.preventDefault()
            $("#modal-payment").find("form").attr("action", $(this).attr("href"));
            $("#modal-payment").find("input[name='payment']").attr("max", $(this).attr("data-max"));
            $("#modal-payment").modal("toggle")
        })
        $(".payments").click(function(event){
            event.preventDefault()
            $(".loading").show()
            $("#modal-payments").modal("toggle")
            $("#modal-payments").find(".table").hide()
            $("#modal-payments").find("tbody").empty()
            $.ajax({
                url: $(this).attr("href"),
                success: function(data){
                    $(".loading").hide()
                    data.payments.forEach(payment => {
                        $("#modal-payments").find(".table").show()
                        $("#modal-payments").find("tbody").append($("<tr>").append([
                            $("<td>").html(Number.parseFloat(payment.payment).toFixed(2)),
                            $("<td>").html(new Date(payment.created_at).toDateString()),
                            $("<td>").html(payment.creator.name)
                        ]))
                    })
                },
            })
        })
        $(".status").click(function(event){
            event.preventDefault()
            $("#modal-status").find("form").attr("action", $(this).attr("href"));
            $("#modal-status").find("select").val($(this).attr("data-status"));
            $("#modal-status").modal("toggle")
        })
        $(".exam").click(function(event){
            event.preventDefault()
            $(".loading").show()
            $("#modal-exam .table").hide()
            $("#modal-exam").find("tbody").empty()
            $("#modal-exam").modal("toggle")
            $.ajax({
                url: $(this).attr("href"),
                success: function(data){
                    $(".loading").hide()
                    $("#modal-exam .table").show()
                    $("#modal-exam").find("tbody").append([
                        $("<tr>").append([
                            $("<th>", {attr:{scope: "row"}}).html("Derecho"),
                            $("<td>").html(signedNumber(data.exam.od_sphere)),
                            $("<td>").html(signedNumber(data.exam.od_cylinder)),
                            $("<td>").html(signedNumber(data.exam.od_axis))
                        ]),
                        $("<tr>").append([
                            $("<th>", {attr:{scope: "row"}}).html("Izquierdo"),
                            $("<td>").html(signedNumber(data.exam.os_sphere)),
                            $("<td>").html(signedNumber(data.exam.os_cylinder)),
                            $("<td>").html(signedNumber(data.exam.os_axis))
                        ]),
                        $("<tr>").append([
                            $("<th>", {attr:{scope: "row"}}).html("Ambos"),
                            $("<td>").html(signedNumber(data.exam.ou_sphere)),
                            $("<td>").html(signedNumber(data.exam.ou_cylinder)),
                            $("<td>").html(signedNumber(data.exam.ou_axis))
                        ]),
                        $("<tr>").append([
                            $("<th>", {attr:{scope: "row"}}),
                            $("<td>").append([
                                $("<strong>").html("Adición: "),
                                signedNumber(data.exam.addition)
                            ]),
                            $("<td>").append([
                                $("<strong>").html("Alt: "),
                                signedNumber(data.exam.alt)
                            ]),
                            $("<td>").append([
                                $("<strong>").html("Distancia pupilar: "),
                                signedNumber(data.exam.pupilary_distance)
                            ]),
                        ]),
                    ])
                }
            })
        })
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            maxDate: 0
        })
        $(".table").not(".modal .table").not('.table-exam').DataTable({
            paging: false,
            order: [[0, "asc"], [1, "asc"]]
        })
        function signedNumber($param){
            if($param > 0) return "+" + Number.parseFloat($param).toFixed(2)
            if($param == 0) return $param
            if($param < 0) return parseFloat($param).toFixed(2)
        }
        toastr.options = {
            positionClass: "toast-bottom-right",
        }
    </script>
    @if(Session::has('success'))
    <script>
        toastr.success("{{Session::get('success')}}")
        new Audio("{{asset('sounds/success.mp3')}}").play()
    </script>
    @endif
    @yield('js')
</body>

</html>