<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Librería</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="http://localhost/libreria/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/libreria/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="http://localhost/libreria/Vistas/sweetalert2/sweetalert2.all.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>

<body class="hold-transition skin-green sidebar-mini login-page">

  <?php
  if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {
    echo '<div class="wrapper">';
    include "modulos/cabecera.php";
    include "modulos/menu.php";

    $url = isset($_GET["url"]) ? $_GET["url"] : "Inicio";
    $url = explode("/", $url);

    if ($url[0] == "Inicio" || $url[0] == "Salir" || $url[0] == "Mis-Datos" || $url[0] == "Usuarios" || $url[0] == "Clientes" || $url[0] == "Generos") {
      include "modulos/".$url[0].".php";
    } else {
      include "modulos/Inicio.php";
    }

    echo '</div>';
  } elseif (isset($_GET["url"]) && $_GET["url"] == "Ingresar") {
    include "modulos/Ingresar.php";
  } else {
    include "modulos/Ingresar.php";
  }
  ?>

  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="http://localhost/libreria/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="http://localhost/libreria/Vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="http://localhost/libreria/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="http://localhost/libreria/Vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="http://localhost/libreria/Vistas/bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="http://localhost/libreria/Vistas/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <!-- <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
  <!-- jQuery Knob Chart -->
  <script src="http://localhost/libreria/Vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="http://localhost/libreria/Vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="http://localhost/libreria/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="http://localhost/libreria/Vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
  <!-- Slimscroll -->
  <script src="http://localhost/libreria/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="http://localhost/libreria/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="http://localhost/libreria/Vistas/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="http://localhost/libreria/Vistas/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="http://localhost/libreria/Vistas/dist/js/demo.js"></script>

  <script src="http://localhost/libreria/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="http://localhost/libreria/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="http://localhost/libreria/Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="http://localhost/libreria/Vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <script src="http://localhost/libreria/Vistas/bower_components/input-mask/jquery.inputmask.js"></script>
  <script src="http://localhost/libreria/Vistas/bower_components/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="http://localhost/libreria/Vistas/bower_components/input-mask/jquery.inputmask.extensions.js"></script>

  <script src="http://localhost/libreria/Vistas/js/usuarios.js"></script>
  <script src="http://localhost/libreria/Vistas/js/clientes.js"></script>
  <script src="http://localhost/libreria/Vistas/js/generos.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidebar-menu').tree();
    })
  </script>

</body>

</html>