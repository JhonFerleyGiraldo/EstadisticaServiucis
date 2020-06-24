<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Terapia Respiratoria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/ico" href="<?=BASEURL?>app/img/logoEstadistica.ico" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=BASEURL?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- DataTables -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="<?=BASEURL?>app/img/logout.png"></img>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?=BASEURL?>Login/CerrarSesion" class="dropdown-item">
            <i class="fas"></i> Cerrar Sesión
          </a>

          
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

<!-- AGREGAMOS EL ASIDE-->
<?php require_once("app/Views/Shared/ViewAside.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Menú terapia respiratoria</h1>
            
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 
    <!-- /.content-header -->
    
    <br>
    <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado pacientes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Documento</th>
                    <th>Paciente</th>
                    <th>Ingreso</th>
                    <th>Fecha Ingreso</th>
                    <th>N° cama</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $nombreCompleto="";
                    foreach($pacientes as $dato): ?>
                  <tr>
                    <?php $nombreCompleto = $dato["primerNombre"] . " " . $dato["segundoNombre"] . " " . $dato["primerApellido"] . " " . $dato["segundoApellido"]; ?>
                    <td><?=$dato["documento"];?></td>
                    <td><?=$dato["primerNombre"] . " " . $dato["segundoNombre"] . " " . $dato["primerApellido"] . " " . $dato["segundoApellido"];?></td>
                    <td><?=$dato["ingreso"];?></td>
                    <td><?=$dato["fechaIngreso"];?></td>
                    <td><?=$dato["cama"];?></td>
                    <td>
                      <?php if($dato["estado"]=="ABIERTO"): ?>
                        <a href="<?=BASEURL?>EstadisticaTerapiaRespiratoria/GetVistaEstadisticaTerapiaRespiratoria&documento=<?=$dato['documento'];?>&numIngreso=<?=$dato["ingreso"];?>"><button type="button" class="btn btn-block btn-primary ">Abrir</button></a>
                      <?php elseif($dato["estado"]=="CERRADO"): ?>
                        <a href="<?=BASEURL?>EstadisticaTerapiaRespiratoria/GetVistaEstadisticaTerapiaRespiratoria&documento=<?=$dato['documento'];?>&numIngreso=<?=$dato["ingreso"];?>"><button type="button"  class="btn btn-block btn-success ">Consultar</button></a>
                    <?php elseif($dato["estado"]==NULL): ?>
                        <?php if($_SESSION["perfilUsuario"]=="TERAPIA" || $_SESSION["perfilUsuario"]=="TERAPIARESPIRATORIA" || $_SESSION["perfilUsuario"]=="ADMINISTRADOR"): ?>
                          <button type="button" id="btnnuevaestadistica" onclick="pasarDatosModal('<?=$dato['documento'];?>','<?=$dato['ingreso'];?>','<?= $nombreCompleto; ?>');" class="btn btn-block btn btn-info " data-toggle="modal" data-target="#registrarEstadistica">Nueva Esta.</button>
                          <!--<a href="<?=BASEURL?>EstadisticaTerapiaRespiratoria/GetVistaAgregarNuevaEstadistica&documento=<?=$dato['documento'];?>&numIngreso=<?=$dato["ingreso"];?>"><button type="button"  class="btn btn-block btn btn-info " data-toggle="modal" data-target="#registrarEstadistica">Nueva Esta.</button></a>-->
                        <?php else: ?>
                          <a href="#"><button type="button"  class="btn btn-block btn btn-info" disabled>Nueva Esta.</button></a>
                        <?php endif; ?>
                      <?php endif; ?>    
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->



<!-- VENTANA MODAL DE CONFIRMACION -->

<!-- Modal -->
<div class="modal fade" id="registrarEstadistica" tabindex="-1" role="dialog" aria-labelledby="registrarEstadisticaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registrarEstadisticaLabel">Nueva Estadistica Respiratoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>¿Desea registrar una estadistica nueva para paciente <span id="nombrePaciente"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="guardarEstadistica" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- fin ventana modal-->

          <!-- right col -->
        </div>

     
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- AGREGAMOS EL FOOTER-->
<?php require_once("app/Views/Shared/ViewFooter.php");?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=BASEURL?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=BASEURL?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=BASEURL?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=BASEURL?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=BASEURL?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!--
<script src="<?=BASEURL?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=BASEURL?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
                      -->
<!-- jQuery Knob Chart -->
<script src="<?=BASEURL?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=BASEURL?>plugins/moment/moment.min.js"></script>
<script src="<?=BASEURL?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=BASEURL?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=BASEURL?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=BASEURL?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=BASEURL?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?=BASEURL?>dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?=BASEURL?>dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?=BASEURL?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=BASEURL?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?=BASEURL?>dist/js/adminlte.min.js"></script>





<script src="<?=BASEURL?>dist/js/adminlte.js"></script>










<!-- page script -->
<script>
  /*
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });*/


  $( document ).ready(function() {
    //quitamos el ordenamiento automatico
    $("#example1").DataTable({
      "aaSorting": []
    });
  });


var documento;
var numIngreso;
var nombre;

//funcion encargada de pasar la informacion a la ventana modal
function pasarDatosModal(_documento,_numIngreso,_nombre){

  $("#nombrePaciente").text(_nombre);
  documento=_documento;
  numIngreso=_numIngreso;
  nombre=_nombre;

}

$("#guardarEstadistica").on('click', function () {

  location.href = "<?= BASEURL ?>EstadisticaTerapiaRespiratoria/GetVistaEstadisticaTerapiaRespiratoria&documento=" + documento + "&numIngreso=" + numIngreso;

});

</script>

</body>
</html>