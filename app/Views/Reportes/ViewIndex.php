<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Reportes</title>
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
            <h1 class="m-0 text-dark">Reportes Estadística</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Reportes Enfermería General</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                          <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalIngresoGeneral"><img src="<?=BASEURL?>app/img/grupo.png"></img> Ingreso General</button>
                      </div>    
                      <div class="col-md-3">
                          <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalControlCateter"><img src="<?=BASEURL?>app/img/report1.png"></img> Control Catéteres</button>
                      </div>
                      <div class="col-md-3">
                          <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalControlSondasV"><img src="<?=BASEURL?>app/img/report2.png"></img> Control Sondas Vesicales</button>
                      </div>	
                      <div class="col-md-3">
                          <button  type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#modalRegistroDipositivos"><img src="<?=BASEURL?>app/img/report.png"></img>Registro Dispositivos</button>
                      </div>					
                    </div> 
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Reportes Terapia Física</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3">
                         
                      </div>  
                      <div class="col-md-6">
                          <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalEstadMensuTerFisica"><img src="<?=BASEURL?>app/img/report3.png"></img> Estadística Mensual</button>
                      </div>  
                      <div class="col-md-3">
                         
                      </div>  					
                    </div> 
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	
    <!-- /.content -->
  </div>





<!-- MODALES PARA REPORTES-->


<!-- Modal para registro dispositivos -->
<div class="modal fade" id="modalRegistroDipositivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro Dispositivos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Reporte</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="card-body"> 
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-2">
                                            <label for="fechaInicioRegDispo">Fecha Inicial</label>
                                        </div>
                                        <div class="col-md-2">
                                        <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaInicioRegDispo">
                                        </div> 
                                                        <div class="col-md-2">
                                            <label for="fechaFinRegDispo">Fecha Final</label>
                                        </div>
                                        <div class="col-md-2">
                                        <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaFinRegDispo">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sede1">Sede</label>
                                        </div>
                                        <div class="col-md-2">    
                                        <select class="form-control select2" id="sede1" style="width: 100%;">
                                            <?php foreach( $sedes as $item): ?>    
                                                <option value="<?= $item["codigo"]; ?>"><?= $item["nombre"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                        </div> 
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
            
                </div>
            </div>
           
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="reporteRegistroDispo"><img src="<?=BASEURL?>app/img/excel.png"></img>&nbsp; Exportar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal registro dispositivos-->


<!-- Modal para control cateteres -->
<div class="modal fade" id="modalControlCateter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Control Catéteres</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Reporte</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="card-body"> 
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-2">
                                            <label for="fechaInicioCateter">Fecha Inicial</label>
                                        </div>
                                        <div class="col-md-2">
                                        <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaInicioCateter">
                                        </div> 
                                                        <div class="col-md-2">
                                            <label for="fechaFinCateter">Fecha Final</label>
                                        </div>
                                        <div class="col-md-2">
                                        <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaFinCateter">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sede2">Sede</label>
                                        </div>
                                        <div class="col-md-2">    
                                        <select class="form-control select2" id="sede2" style="width: 100%;">
                                            <?php foreach( $sedes as $item): ?>    
                                                <option value="<?= $item["codigo"]; ?>"><?= $item["nombre"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                        </div> 
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
            
                </div>
            </div>
           
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="reporteCateteres"><img src="<?=BASEURL?>app/img/excel.png"></img>&nbsp; Exportar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal control cateteres-->


<!-- Modal para control sondas vesicales -->
<div class="modal fade" id="modalControlSondasV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Control Sondas Vesicales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Reporte</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="card-body"> 
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-2">
                                            <label for="fechaInicioSondav">Fecha Inicial</label>
                                        </div>
                                        <div class="col-md-2">
                                        <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaInicioSondav">
                                        </div> 
                                                        <div class="col-md-2">
                                            <label for="fechaFinSondav">Fecha Final</label>
                                        </div>
                                        <div class="col-md-2">
                                        <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaFinSondav">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sede3">Sede</label>
                                        </div>
                                        <div class="col-md-2">    
                                        <select class="form-control select2" id="sede3" style="width: 100%;">
                                            <?php foreach( $sedes as $item): ?>    
                                                <option value="<?= $item["codigo"]; ?>"><?= $item["nombre"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                        </div> 
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
            
                </div>
            </div>
           
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="reporteSondasVesicales"><img src="<?=BASEURL?>app/img/excel.png"></img>&nbsp; Exportar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal control sondas vesicales-->




<!-- Modal para ingreso general -->
<div class="modal fade" id="modalIngresoGeneral" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingreso General</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Reporte</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="card-body"> 
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-2">
                                            <label for="fechaInicioIngreso">Fecha Inicial</label>
                                        </div>
                                        <div class="col-md-2">
                                        <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaInicioIngreso">
                                        </div> 
                                                        <div class="col-md-2">
                                            <label for="fechaFinIngreso">Fecha Final</label>
                                        </div>
                                        <div class="col-md-2">
                                        <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaFinIngreso">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sede4">Sede</label>
                                        </div>
                                        <div class="col-md-2">    
                                        <select class="form-control select2" id="sede4" style="width: 100%;">
                                            <?php foreach( $sedes as $item): ?>    
                                                <option value="<?= $item["codigo"]; ?>"><?= $item["nombre"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                        </div> 
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
            
                </div>
            </div>
           
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="reporteIngresos"><img src="<?=BASEURL?>app/img/excel.png"></img>&nbsp; Exportar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal ingreso genral-->


<!-- Modal para estadistica mensual terapia fisica -->
<div class="modal fade" id="modalEstadMensuTerFisica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Estadística Mensual Terapia Física</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-secondary">
                  <div class="card-header">
                      <h3 class="card-title">Reporte</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form">
                    <div class="card-body"> 
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-2">
                              <label for="fechaInicioEstadisFisica">Fecha Inicial</label>
                          </div>
                          <div class="col-md-2">
                            <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaInicioEstadisFisica">
                          </div> 
                          <div class="col-md-2">
                            <label for="fechaFinEstadisFisica">Fecha Final</label>
                          </div>
                          <div class="col-md-2">
                            <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaFinEstadisFisica">
                          </div>
                          <div class="col-md-2">
                            <label for="sede5">Sede</label>
                          </div>
                          <div class="col-md-2">    
                            <select class="form-control select2" id="sede5" style="width: 100%;">
                              <?php foreach( $sedes as $item): ?>    
                                  <option value="<?= $item["codigo"]; ?>"><?= $item["nombre"]; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div> 
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </form>
                </div>
              </div>
            </div>
          </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="reporteEstadisFisica"><img src="<?=BASEURL?>app/img/search.png"></img>&nbsp; Consultar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<!-- fin modal estadistica mensual terapia fisica-->

<!-- FIN MODALES REPORTES-->






  
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
<script src="<?=BASEURL?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
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




<script>

$("#reporteRegistroDispo").click(function() {
    var fechaInicio=$("#fechaInicioRegDispo").val();
    var fechaFin=$("#fechaFinRegDispo").val();
    var sede=$("#sede1").val();

    if(fechaInicio>fechaFin){
        $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Mensaje',
            body: 'La fecha inicial no debe ser mayor a la final',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
        });
    }else{
        window.open('../Reportes/GetConsultarRegistroDispositivos&fechaInicio=' + fechaInicio + '&fechaFin=' + fechaFin + '&sede=' + sede,'_blank' );
    }

});


$("#reporteCateteres").click(function() {
    var fechaInicio=$("#fechaInicioCateter").val();
    var fechaFin=$("#fechaFinCateter").val();
    var sede=$("#sede2").val();

    if(fechaInicio>fechaFin){
        $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Mensaje',
            body: 'La fecha inicial no debe ser mayor a la final',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
        });
    }else{
        window.open('../Reportes/GetConsultarControlCateteres&fechaInicio=' + fechaInicio + '&fechaFin=' + fechaFin + '&sede=' + sede,'_blank' );
    }

});


$("#reporteSondasVesicales").click(function() {
    var fechaInicio=$("#fechaInicioSondav").val();
    var fechaFin=$("#fechaFinSondav").val();
    var sede=$("#sede3").val();

    if(fechaInicio>fechaFin){
        $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Mensaje',
            body: 'La fecha inicial no debe ser mayor a la final',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
        });
    }else{
        window.open('../Reportes/GetConsultarSondasVesicales&fechaInicio=' + fechaInicio + '&fechaFin=' + fechaFin + '&sede=' + sede,'_blank' );
    }

});


$("#reporteIngresos").click(function() {
    var fechaInicio=$("#fechaInicioIngreso").val();
    var fechaFin=$("#fechaFinIngreso").val();
    var sede=$("#sede4").val();

    if(fechaInicio>fechaFin){
        $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Mensaje',
            body: 'La fecha inicial no debe ser mayor a la final',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
        });
    }else{
        window.open('../Reportes/GetConsultarIngresosGenerales&fechaInicio=' + fechaInicio + '&fechaFin=' + fechaFin + '&sede=' + sede,'_blank' );
    }

});

$("#reporteEstadisFisica").click(function(){
    var fechaInicio=$("#fechaInicioEstadisFisica").val();
    var fechaFin=$("#fechaFinEstadisFisica").val();
    var sede=$("#sede5").val();

    if(fechaInicio>fechaFin){
        $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Mensaje',
            body: 'La fecha inicial no debe ser mayor a la final',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
        });
    }else{
        window.open('../Reportes/GetVistaReporteEstadisticaFisica&fechaInicio=' + fechaInicio + '&fechaFin=' + fechaFin + '&sede=' + sede,'_blank' );
    }
});

</script>







</body>
</html>