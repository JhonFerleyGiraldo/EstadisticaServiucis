<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Nueva estadistica</title>
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
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Estadística Física Del Paciente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                            <label for="documento">Doc Paciente</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="documento" disabled>
                            </div> 
							<div class="col-md-2">
                            <label for="nombre">Paciente</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="nombre" disabled>
                            </div>
							<div class="col-md-2">
								<label for="tipoDoc">Tipo Documento</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="tipoDoc" disabled>
                            </div> 							
                        </div> 
                    </div>

					<div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
								<label for="numIngreso">Num Ingreso</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="NumIngreso" disabled>
                            </div>
							<div class="col-md-2">
								<label for="inicioTerapia">Inicio Terapia</label>
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="text"  id="inicioTerapia" disabled>
                            </div> 
                            <div class="col-md-2">
								<label for="permeInicial">Perme Inicial</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="permeInicial" disabled >
                            </div>
                        </div> 
                    </div>
				
					<div class="form-group">
                        <div class="row">
                        <div class="col-md-2">
								<label for="claseFuncional">Clase Funcional</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" value="" onKeyPress="return soloNumeros(event)"  class="form-control" id="claseFuncional" maxlength="2" >
                            </div>
                            <div class="col-md-2">
								              <label for="transfeMax">Trans. Maxima Alcanzada</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="transfeMax" style="width: 100%;">
                                    <?php foreach($listadoTransferencias as $item): ?>
                                        <option value="<?= $item["codigo"]; ?>"><?= $item["descripcion"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="terapeutaApertura">Terapeuta Apertura</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="terapeutaApertura" disabled>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-2">
								<label for="terapeutaUltimaActualizacion">Ultima Actu.</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="terapeutaUltimaActualizacion" disabled>
                            </div>
                            <div class="col-md-2">
								<label for="permeFinal">Perme Final</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" value="" onKeyPress="return soloNumeros(event)"  class="form-control" id="permeFinal" maxlength="3" >
                            </div>
                            <div class="col-md-2">
                                <label for="estado">Estado Estad.</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="estado" style="width: 100%;">
                                    <option value="ABIERTO" >ABIERTO</option>
                                    <option value="CERRADO">CERRADO</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-2">
								<label for="complicaciones">Complicaciones</label>
                            </div>
                            <div class="col-md-2">
                                <textarea type="text" class="form-control" id="complicaciones"></textarea>
                            </div>
                            <div class="col-md-2">
								<label for="observacionesFuncio">Obser. Funcio</label>
                            </div>
                            <div class="col-md-2">
                                <textarea type="text" class="form-control" id="observacionesFuncio"></textarea>
                            </div>
                            <div class="col-md-2">
                            <label for="estadoIngreso">Estado Ingreso</label>
                            </div>
                            <div class="col-md-2">
                            <input type="text"   class="form-control" id="estadoIngreso" disabled >
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-2">
                                <button type="button"  onclick="window.history.back();" class="btn btn-success">Volver</i></button>
                            </div>
							              <div class="col-md-2">
                            
                            </div>
                            <div class="col-md-2">
                              <?php if($_SESSION["perfilUsuario"]=="ADMINISTRADOR" || $_SESSION["perfilUsuario"]=="TERAPIAFISICA" || $_SESSION["perfilUsuario"]=="TERAPIA"): ?>        
                                <button id="botonActualizarEstadistica" type="button" onclick="BotonActualizarEstadistica();" class="btn btn-primary"><img src="<?=BASEURL?>app/img/refrescar.png"></img> Actualizar</button>
                              <?php endif; ?>
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                              <button id="fuerzaIngreso" type="button"  class="btn btn-secondary"  data-toggle="modal" data-target="#modalFuerzaIngreso">Fuerza Ingreso</button>
                            </div>
                            <div class="col-md-2">
                                <button id="fuerzaEgreso" type="button"  class="btn btn-secondary"  data-toggle="modal" data-target="#modalFuerzaEgreso">Fuerza Egreso</button>
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




      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary"  id="terapias">
              <div class="card-header">
                <h3 class="card-title">Agregar terapias al paciente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
                              <label for="fechaTerapia">Fecha </label>
                            </div>
                            <div class="col-md-2">
                              <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaTerapia">
                            </div>
                            <div class="col-md-2">
								              <label for="transferencia">Transferencia</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control select2" id="transferencia" style="width: 100%;">
                                    <?php foreach($listadoTransferencias as $item): ?>
                                        <option value="<?= $item["codigo"]; ?>"><?= $item["descripcion"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div> 
							            <div class="col-md-1">
								              <label for="vm">VM</label>
                            </div>
                            <div class="col-md-1">
                                <select class="form-control select2" id="vm" style="width: 100%;">
                                    <option value="NO" selected="selected">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div> 
                            <div class="col-md-1">
                              
                            </div>
                            <div class="col-md-1">
                              <?php if($_SESSION["perfilUsuario"]=="ADMINISTRADOR" || $_SESSION["perfilUsuario"]=="TERAPIAFISICA" || $_SESSION["perfilUsuario"]=="TERAPIA"): ?>        
                                <button id="agregarNuevaTerapia" type="button" onclick="BotonAgregarTerapia();" class="btn btn-primary">Agregar</button>
                              <?php endif; ?>
                            </div>							
                        </div> 
                    </div>

                </div>
    
                <!-- /.card-body -->

                <div class="card-footer">
                    
                        <div class="row">
                            
                        </div> 
                </div>
              </form>
            </div>


            <!-- /.card -->
			
					<div class="form-group">
            <div class="row">
              <div class="card-body p-0">
								<table class="table table-sm" id="tablaTerapias">
								  <thead>
									<tr>
									  <th style="width: 10px">#</th>
									  <th>Fecha terapia</th>
									  <th>Transferencia</th>
									  <th>VM</th>
                                      <th>Terapeuta</th>
									</tr>
								  </thead>
								  <tbody id="contenidoTabla">
									
									
		
								  </tbody>
								</table>
							</div>						
            </div> 
          </div>

          </div>
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<br>



<!-- Modal para fuerza de ingreso -->
<div class="modal fade" id="modalFuerzaIngreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fuerza Ingreso</h5>
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
                        <h3 class="card-title">Fuerza Ingreso MSD</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body"> 
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-2">
                                <label for="MSDabdhom">ABD HOM</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSDabdhom" disabled>
                            </div> 
                                            <div class="col-md-2">
                                <label for="MSDflecod">FLE COD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSDflecod" disabled>
                            </div>
                                            <div class="col-md-2">
                                                <label for="MSDextmun">EXT MUÑ</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSDextmun" disabled>
                            </div> 							
                            </div> 
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Fuerza Ingreso MSI</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="MSIabdhom">ABD HOM</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSIabdhom" disabled>
                            </div> 
                                            <div class="col-md-2">
                                <label for="MSIflecod">FLE COD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSIflecod" disabled>
                            </div>
                                            <div class="col-md-2">
                                                <label for="MSIextmun">EXT MUÑ</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSIextmun" disabled>
                            </div> 							
                            </div> 
                        </div> 
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>


            


            <div class="container-fluid">
                <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Fuerza Ingreso MID</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body"> 
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-2">
                                <label for="MIDflexcad">FLEX CAD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIDflexcad" disabled>
                            </div> 
                                            <div class="col-md-2">
                                <label for="MIDextrod">EXT ROD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIDextrod" disabled>
                            </div>
                                            <div class="col-md-2">
                                                <label for="MIDdorsi">DORSI</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIDdorsi" disabled>
                            </div> 							
                            </div> 
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Fuerza Ingreso MII</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-2">
                                <label for="MIIflexcad">FLEX CAD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIIflexcad" disabled>
                            </div> 
                                            <div class="col-md-2">
                                <label for="MIIextrod">EXT ROD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIIextrod" disabled>
                            </div>
                                            <div class="col-md-2">
                                                <label for="MIIdorsi">DORSI</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIIdorsi" disabled>
                            </div> 							
                            </div> 
                        </div> 
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal fuerza ingreso-->






<!-- Modal para fuerza de egreso -->
<div class="modal fade" id="modalFuerzaEgreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fuerza Egreso</h5>
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
                        <h3 class="card-title">Fuerza Egreso MSD</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body"> 
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-2">
                                <label for="MSDabdhomEgre">ABD HOM</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSDabdhomEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div> 
                                            <div class="col-md-2">
                                <label for="MSDflecodEgre">FLE COD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSDflecodEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div>
                                            <div class="col-md-2">
                                                <label for="MSDextmunEgre">EXT MUÑ</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSDextmunEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div> 							
                            </div> 
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Fuerza Egreso MSI</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="MSIabdhomEgre">ABD HOM</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSIabdhomEgre" onKeyPress="return soloNumeros(event)" maxlength="1" >
                            </div> 
                                            <div class="col-md-2">
                                <label for="MSIflecodEgre">FLE COD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSIflecodEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div>
                                            <div class="col-md-2">
                                                <label for="MSIextmunEgre">EXT MUÑ</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MSIextmunEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div> 							
                            </div> 
                        </div> 
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>


            


            <div class="container-fluid">
                <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Fuerza Egreso MID</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body"> 
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-2">
                                <label for="MIDflexcadEgre">FLEX CAD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIDflexcadEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div> 
                                            <div class="col-md-2">
                                <label for="MIDextrodEgre">EXT ROD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIDextrodEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div>
                                            <div class="col-md-2">
                                                <label for="MIDdorsiEgre">DORSI</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIDdorsiEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div> 							
                            </div> 
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Fuerza Egreso MII</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-2">
                                <label for="MIIflexcadEgre">FLEX CAD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIIflexcadEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div> 
                                            <div class="col-md-2">
                                <label for="MIIextrodEgre">EXT ROD</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIIextrodEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div>
                                            <div class="col-md-2">
                                                <label for="MIIdorsiEgre">DORSI</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="MIIdorsiEgre" onKeyPress="return soloNumeros(event)" maxlength="1">
                            </div> 							
                            </div> 
                        </div> 
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal fuerza egreso-->



    

    </section>
  </div>









  
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

//fecha ingreso del paciente
var fechaIngreso;


//fecha egreso paciente
var fechaEgreso;

//variables de los campos
var codigoIngreso;
var inicioTerapia;
var codigoEstadistica;
var codigoTerapeuta;
var nombreTerapeuta;
var estado;
var claseFuncional;
var permeFinal;
var estado;
var complicaciones;
var observacion;

//variable para validar el egreso del paciente del ingreso principal
var egresoVivo;

//FUERZA DE INGRESO
//MSD
var MSDabdhom;
var MSDflecod;
var MSDextmun;
//MSI
var MSIabdhom;
var MSIflecod;
var MSIextmun;
//MID
var MIDflexcad;
var MIDextrod;
var MIDdorsi;
//MII
var MIIflexcad;
var MIIextrod;
var MIIdorsi;


//objeto almacena array de datos
var datosEstadistica;

//cuando esta listo el documento
$(document).ready(function(){

    <?php
        //validamos si las variables vienen vacias
        if($documento==''){
        $documento=0;
        }
        if($numIngreso==''){
        $numIngreso=0;
        }
    ?>


    codigoTerapeuta='<?=$_SESSION["codigoUsuario"]?>';

    var perfilUsuario='<?=$_SESSION["perfilUsuario"]?>';
    //Validamos el perfil


    //if(perfilUsuario!="ADMINISTRADOR" && perfilUsuario!="TERAPIAFISICA" && perfilUsuario!="TERAPIA"){
    //    $("#agregarNuevaTerapia").hide();
    //}

    //Se capturan las variables de php que
    //contienen los parametros get para la consulta
    var documento=<?=$documento?>;
    var numIngreso=<?=$numIngreso?>;



    //Llenamos los valores de campos que vienen del get
    $("#documento").val(documento);
    $("#NumIngreso").val(numIngreso);

    //Validamos si los campos del formulario son diferentes de 0
    //ya que si son 0 quiere decir que no mandaron valor por get en url
    if($("#documento").val()!=0 && $("#NumIngreso").val()!=0){

        var datosIngreso=ConsultarDatosPaciente(documento,numIngreso);
        var nombrePacienteCompleto;

        //console.log(datosIngreso);


        //recorremos la repuesta
        $(datosIngreso).each(function(i, v){ // indice, valor
                    
            //Llenamos los campos del formulario con la informacion
            //obtenida por la consulta   

            codigoIngreso=v.codigoIngresoTabla; //se obtirne la clave primaria de la tabla 


            $("#tipoDoc").val(v.tipoDoc);       
            nombrePacienteCompleto=v.primerNombre+' '+v.segundoNombre+' '+v.primerApellido+' '+v.segundoApellido;
            $("#nombre").val(nombrePacienteCompleto);
            $("#estadoIngreso").val(v.estadoIngreso);

            fechaIngreso=v.fechaIngreso;
            egresoVivo=v.egresoVivo;
            fechaEgreso=v.fechaEgreso;

        });

        datosEstadistica=ConsultarDatosEstadistica(codigoIngreso);
        //console.log(datosEstadistica);

        //recorremos la repuesta
        $(datosEstadistica).each(function(i, v){ // indice, valor
            codigoEstadistica=v.codigo;
            $("#inicioTerapia").val(v.inicioFisioterapia);
            $("#permeInicial").val(v.premeInicial);
            if(v.transMaxima==null){
                $("#transfeMax").val("Sin terapias");
            }else{
                $("#transfeMax").val(v.transMaxima);
            }
            $("#terapeutaApertura").val(v.usuApertura);
            $("#terapeutaUltimaActualizacion").val(v.usuActualizacion);
            
            if(v.claseFuncional!=null){
              $("#claseFuncional").val(v.claseFuncional);
            }

            if(v.estado=="ABIERTO"){
              $('#permeFinal').prop("disabled", true);
            }
         
            if(v.permeFinal!=null){
              $("#permeFinal").val(v.permeFinal);
            }

            if(v.complicaciones!=null){
              $("#complicaciones").val(v.complicaciones);
            }

            if(v.observaciones){
              $("#observacionesFuncio").val(v.observaciones);
            }

            //llenamos modal de furza de ingreso
            $("#MSDabdhom").val(v.MSDabdhomIng);
            $("#MSDflecod").val(v.MSDflecodIng);
            $("#MSDextmun").val(v.MSDextmunIng);
            $("#MSIabdhom").val(v.MSIabdhomIng);
            $("#MSIflecod").val(v.MSIflecodIng);
            $("#MSIextmun").val(v.MSIextmunIng);
            $("#MIDflexcad").val(v.MIDflexcadIng);
            $("#MIDextrod").val(v.MIDextrodIng);
            $("#MIDdorsi").val(v.MIDdorsiIng);
            $("#MIIflexcad").val(v.MIIflexcadIng);
            $("#MIIextrod").val(v.MIIextrodIng);
            $("#MIIdorsi").val(v.MIIdorsiIng);


            if(v.estado=='CERRADO'){
              $("#estado").val(v.estado);
              $('#estado').prop("disabled", true);
              $('#permeFinal').prop("disabled", true);
              $('#claseFuncional').prop("disabled", true);
              $('#complicaciones').prop("disabled", true);
              $('#transfeMax').prop("disabled", true);
              $('#observacionesFuncio').prop("disabled", true);
              $("#botonActualizarEstadistica").hide();
              $("#terapias").hide();
              
              //llenamos modal de furza de egreso
              $("#MSDabdhomEgre").val(v.MSDabdhomEgre);
              $("#MSDflecodEgre").val(v.MSDflecodEgre);
              $("#MSDextmunEgre").val(v.MSDextmunEgre);
              $("#MSIabdhomEgre").val(v.MSIabdhomEgre);
              $("#MSIflecodEgre").val(v.MSIflecodEgre);
              $("#MSIextmunEgre").val(v.MSIextmunEgre);
              $("#MIDflexcadEgre").val(v.MIDflexcadEgre);
              $("#MIDextrodEgre").val(v.MIDextrodEgre);
              $("#MIDdorsiEgre").val(v.MIDdorsiEgre);
              $("#MIIflexcadEgre").val(v.MIIflexcadEgre);
              $("#MIIextrodEgre").val(v.MIIextrodEgre);
              $("#MIIdorsiEgre").val(v.MIIdorsiEgre);

              //deshabilitamos campos
              $("#MSDabdhomEgre").prop("disabled", true);
              $("#MSDflecodEgre").prop("disabled", true);
              $("#MSDextmunEgre").prop("disabled", true);
              $("#MSIabdhomEgre").prop("disabled", true);
              $("#MSIflecodEgre").prop("disabled", true);
              $("#MSIextmunEgre").prop("disabled", true);
              $("#MIDflexcadEgre").prop("disabled", true);
              $("#MIDextrodEgre").prop("disabled", true);
              $("#MIDdorsiEgre").prop("disabled", true);
              $("#MIIflexcadEgre").prop("disabled", true);
              $("#MIIextrodEgre").prop("disabled", true);
              $("#MIIdorsiEgre").prop("disabled", true);

            }

        });


        //consultamos datos de las terapias
        var datosTerapias=ConsultarTerapiasPorEstadistica(codigoEstadistica);


        //recorremos las terapias y llenamos la tabla
        var j=datosTerapias.length;
        $(datosTerapias).each(function(i, v){
            $('#tablaTerapias').append('<tr><td>' + j + '</td><td>' + v.fecha + '</td><td>' + v.transferencia + '</td><td>' + v.vm + '</td><td>' + v.terapeuta + '</td></tr>');
            j--;
        });

    }else{
        //si las variables son 0 es porque no se envio ningun valor por get a la url
        $(document).Toasts('create', {
            class: 'bg-danger', 
            title: 'Error',
            subtitle: 'Error',
            body: 'Error en la recuperacion de parametros GET por url.',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
        }); 
  }



});


$("#estado").change(function() {
  var estado=$("#estado").val();
  if(estado=="ABIERTO"){
    $('#permeFinal').val('');
    $('#permeFinal').prop("disabled", true);
  }else{
    $('#permeFinal').prop("disabled", false);
  }
});

//funcion que consulta datos de la estadistica
function ConsultarDatosEstadistica(idIngreso){
    var datosEsta;
    $.ajax({
                type: "POST",
                dataType: 'json',
                async:false,//para que no sea asincrono
                url: '../EstadisticaTerapiaFisica/GetConsultarDatosEstadistica',//llamado a metodo
                data: {"idIngreso":idIngreso}, //parametros
                success: function(response)
                {   
                    

                    datosEsta=response

                //console.log(response);
                },
                error: function (error) {
                //mensajes de error
                    $(document).Toasts('create', {
                        class: 'bg-danger', 
                        title: 'Validación',
                        subtitle: 'Error',
                        body: 'Error consultando datos de la estadistica (error llamando consulta).',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
                    });  
                    console.log(error);
                }
        });

    return datosEsta;
}


//funcion que consulta datos del paciente
function ConsultarDatosPaciente(documento,numIngreso){
  var datosIngreso;
  $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../EstadisticaTerapiaFisica/GetConsultarDatosPaciente',//llamado a metodo
            data: {"documento":documento,"numIngreso":numIngreso}, //parametros
            success: function(response)
            {   
                

                  datosIngreso=response

              //console.log(response);
            },
            error: function (error) {
              //mensajes de error
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error consultando datos del paciente (error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
                console.log(error);
            }
    });

    return datosIngreso;

}


//funcion para consultar las terapias de la estadistica
function ConsultarTerapiasPorEstadistica(codigoEstadistica){

var datosTerapia;

$.ajax({
          type: "POST",
          dataType: 'json',
          async:false,//para que no sea asincrono
          url: '../EstadisticaTerapiaFisica/GetConsultarTerapiasPorEstadistica',//llamado a metodo
          data: {"codEstadistica":codigoEstadistica}, //parametros
          success: function(response)
          {   
              

            datosTerapia=response

            //console.log(response);
          },
          error: function (error) {
            //mensajes de error
              $(document).Toasts('create', {
                  class: 'bg-danger', 
                  title: 'Validación',
                  subtitle: 'Error',
                  body: 'Error consultando terapias de la estadistica (error llamando consulta).',
                  icon:"fas fa-exclamation-circle",
                  autohide:true,
                  delay:5000
              });  
              console.log(error);
          }
  });

  return datosTerapia;

}

//funcion boton para agregar nueva terapia
function BotonAgregarTerapia(){

var fechaTerapia=$("#fechaTerapia").val();
var transferencia=$("#transferencia").val();
var vm=$("#vm").val();



var datosUltimaTerapia=ConsultarUltimaTerapia(codigoEstadistica);

//validamos qie la fecha de la terapia no sea menor de la de ingreso
          if(fechaTerapia<fechaIngreso){
                $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'La fecha de la terapia no puede ser menor a la de ingreso (' + fechaIngreso + ').',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
                });
                return false;
          }



          //validamos que la fecha a ingresar en el sistema no sea mayor a la actual
          var fechaActual='<?= date('Y-m-d'); ?>';
          if(fechaTerapia>fechaActual){
            $(document).Toasts('create', {
                class: 'bg-warning', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'La fecha de la terapia no puede ser mayor a la fecha actual.',
                icon:"fas fa-exclamation-triangle",
                autohide:true,
                delay:5000
              });
              return false;
          }



var bandera=true;

    $(datosUltimaTerapia).each(function(i, v){ // indice, valor

      //validamos si es null e sporque va a ser la primera terapia
        if(v.codigo!=null){
          //validamos que la fecha de la terapia a guardar no sea menor a la de la primera terapia
            if(fechaTerapia<v.fecha){
              $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'La fecha de la terapia no puede ser menor a la fecha de la última terapia (' + v.fecha + ').',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
                });
                bandera=false;
            }
        }    

    });

    //si la bandera es verdadera e sporque no hubo ningun error
    if(bandera){
      
      //validamos si la fecha de terapia es diferente a null
      if(fechaEgreso!=null){
        
        //validamos la fecha de la terapia si es mayor a la de egreso
        if(fechaTerapia>fechaEgreso){
          $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'La fecha de la terapia no puede ser mayor a la fecha de egreso (' + fechaEgreso + ')',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
          });

          //si es menor o igual guardamos
        }else{
          //agregamos el nuevo registro de la terapia
          AgregarNuevaTerapia(codigoEstadistica,fechaTerapia,vm,transferencia,codigoTerapeuta);

/*
          //validamos la transferencia que realizamos con la transferencia de todas las terapias
          //para saber cual es la mejor
          var transMaxima=ValidarMejorTransferencia(datosEstadistica,transferencia);

          //actualizamos la transferencia con la mejor que halla tenido el paciente
          ActualizarMejorTransferencia(codigoEstadistica,transMaxima);

          //cambiamos el campo del formulario para no actualizar toda la pagina
          $("#transfeMax").val(transMaxima);
          */
        }

        //si la fecha de egreso es null es porque no tiene egreso aun a si que guardamos normal
      }else{
        //agregamos el nuevo registro de la terapia
        AgregarNuevaTerapia(codigoEstadistica,fechaTerapia,vm,transferencia,codigoTerapeuta);
/*
        //validamos la transferencia que realizamos con la transferencia de todas las terapias
        //para saber cual es la mejor
        var transMaxima=ValidarMejorTransferencia(datosEstadistica,transferencia);

        //actualizamos la transferencia con la mejor que halla tenido el paciente
        ActualizarMejorTransferencia(codigoEstadistica,transMaxima);

        //cambiamos el campo del formulario para no actualizar toda la pagina
        $("#transfeMax").val(transMaxima);
        */
      }

      

    }

    

}

/*
//Funcion encargada de validar cual de todas las transferencias del
//paciente es la mejor
function ValidarMejorTransferencia(estadistica,transferencia){
  
  //traemos todas las terapias realizadas
  var datosTerapias=ConsultarTerapiasPorEstadistica(codigoEstadistica);

  //consultamos la tabla de la estadistica
  var estadistica=ConsultarDatosEstadistica(codigoIngreso);
  

  
  //si la trasMaxima es nula es por que no se ha realizado la primer terapia
  //por lo que se envia la trans de la primera terapia
  if(estadistica[0].transMaxima==null){
    return transferencia;
  }

  //si ya esta en DSV es el nivel mas alto y no necesitamos validar mas
  if(estadistica[0].transMaxima=='DSV'){
    return 'DSV';
  }


  //para hallar cual es la transferencia mas alta
  var transferMaxima=1;
  //servira de intercambio mientras validamos
  var transferencia=null;

  //recorremos los datos de las terapias
  $(datosTerapias).each(function(i, v){     

    //validamos cada una de las transferencias de las terapias buscando la mayor    
    switch(v.codTrans){
      case 'S':
        transferencia=1;
        if(transferencia>transferMaxima){
          transferMaxima=transferencia;
        }
      break;
      case 'SC':
        transferencia=2;
        if(transferencia>transferMaxima){
          transferMaxima=transferencia;
        }
      break;
      case 'SB':
        transferencia=3;
        if(transferencia>transferMaxima){
          transferMaxima=transferencia;
        }
      break;
      case 'SS':
        transferencia=4;
        if(transferencia>transferMaxima){
          transferMaxima=transferencia;
        }
      break;
      case 'SBP':
        transferencia=5;
        if(transferencia>transferMaxima){
          transferMaxima=transferencia;
        }
      break;
      case 'DCV':
        transferencia=6;
        if(transferencia>transferMaxima){
          transferMaxima=transferencia;
        }
      break;
      case 'DSV':
        transferencia=7;
        if(transferencia>transferMaxima){
          transferMaxima=transferencia;
        }
      break;
    } 
 
  });
  
  //validamos con que numero quedo la transferencia mas alta y retornamos su valor equivalente
  switch(transferMaxima){
      case 1:
        return 'S';
      break;
      case 2:
        return 'SC';
      break;
      case 3:
        return 'SB';
      break;
      case 4:
        return 'SS';
      break;
      case 5:
        return 'SBP'
      break;
      case 6:
        return 'DCV'
      break;
      case 7:
        return 'DSV'
      break;
    } 

}
*/


//funcion que llama al controlador para actualizar
//la mejor transferencia en la estadistica
function ActualizarMejorTransferencia(estadis,transfer){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../EstadisticaTerapiaFisica/SetActualizarMejorTransferencia',//llamado a metodo
        data: {"estadis":estadis,"transfer":transfer}, //parametros
        success: function(response)
        {   
          console.log(response);
        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error Actualizando mejor transferencia (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
});

}

//funcrion para consultar ultima terapia  por el codigo de estadistica
function ConsultarUltimaTerapia(codigoEst){
var resultado;
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../EstadisticaTerapiaFisica/GetConsultarUltimaTerapia',//llamado a metodo
        data: {"codigoEstad":codigoEst}, //parametros
        success: function(response)
        {   
            

          resultado=response;

          //console.log(response);
        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error consultando ultima terapia (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
});

return resultado;

}

function BotonActualizarEstadistica(){

  estado=$("#estado").val();
  claseFuncional=$("#claseFuncional").val();
  permeFinal=$("#permeFinal").val();
  complicaciones=$("#complicaciones").val();
  observaciones=$("#observacionesFuncio").val();
  transMaxima=$("#transfeMax").val();

  if(estado=="ABIERTO"){
    
      if($("#claseFuncional").val()==''){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Debe ingresar la clase funcional.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        $("#claseFuncional").focus(); 
        claseFuncional="";
        return false;
      }

      if($("#transfeMax").val()==''){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Debe ingresar la clase funcional.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        $("#transfeMax").focus(); 
        transMaxima="";
        return false;
      }

      if(claseFuncional<1 || claseFuncional>4){
        $(document).Toasts('create', {
                      class: 'bg-warning', 
                      title: 'Validación',
                      subtitle: 'Mensaje',
                      body: 'La clase funcional debe ser entre 1 y 4.',
                      icon:"fas fa-exclamation-circle",
                      autohide:true,
                      delay:5000
          });
          return false;
      }

      if($("#transfeMax").val()=='' || $("#transfeMax").val()==null ){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Debe seleccionar la transferencia máxima.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        $("#transfeMax").focus(); 
        transMaxima="";
        return false;
      }

      //actualizamos la estadistica
      ActualizarEstadistica(codigoEstadistica,claseFuncional,observaciones,null,complicaciones,transMaxima,codigoTerapeuta,estado);
      
      //se redirecciona la pagina hacia atras en 400.000 milisegundos
      setTimeout(window.history.back(),400000);

        
      

  //si no guardamos todos los datos ya que es el cierre de la estadistica
  }else{


      if($("#claseFuncional").val()==''){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Debe ingresar la clase funcional.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        $("#claseFuncional").focus(); 
        claseFuncional="";
        return false;

      }

      claseFuncional=$("#claseFuncional").val();

      if(egresoVivo==null){
        $(document).Toasts('create', {
                      class: 'bg-warning', 
                      title: 'Validación',
                      subtitle: 'Mensaje',
                      body: 'Se debe cerrar el ingreso del paciente antes de cerrar la estadística.',
                      icon:"fas fa-exclamation-circle",
                      autohide:true,
                      delay:5000
        });
        return false;
      }

      if(claseFuncional<1 || claseFuncional>4){
        $(document).Toasts('create', {
                      class: 'bg-warning', 
                      title: 'Validación',
                      subtitle: 'Mensaje',
                      body: 'La clase funcional debe ser entre 1 y 4.',
                      icon:"fas fa-exclamation-circle",
                      autohide:true,
                      delay:5000
          });
          return false;
      }

      if(egresoVivo=="NO"){
        //actualizamos la estadistica
        ActualizarEstadistica(codigoEstadistica,claseFuncional,observaciones,null,complicaciones,transMaxima,codigoTerapeuta,estado);
      }else{

        if(permeFinal==''){
          $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Se debe ingresar el perme final ya que el paciente egreso vivo.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
          });
          return false;
        }


        if(permeFinal<0 || permeFinal>32){
          $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'El perme final debe ser entre 0 y 32.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
          });
          return false;
        }


        if(ValidarCamposFuerzaEgreso()){
          //actualizamos la estadistica
          ActualizarEstadistica(codigoEstadistica,claseFuncional,observaciones,permeFinal,complicaciones,transMaxima,codigoTerapeuta,estado);
        
          //guardamos la fuerza de egreso
          GuardarFuerzaEgreso( codigoEstadistica,MSDabdhom,MSDflecod,MSDextmun,MSIabdhom,MSIflecod,MSIextmun,
                              MIDflexcad,MIDextrod,MIDdorsi,MIIflexcad,MIIextrod,MIIdorsi);
        }else{
          return false;
        }       
        
      }      

        //se redirecciona la pagina hacia atras en 400.000 milisegundos
        setTimeout(window.history.back(),400000);                         
    

  }

}

//funcion encargada de mandar a actualizar la estadistica
function ActualizarEstadistica(codigo,clasFunci,observa,permeFin,complica,transMaxima,usu,esta){
  $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../EstadisticaTerapiaFisica/SetActualizarEstadistica',//llamado a metodo
            data: {"codigo":codigo,"clasFunci":clasFunci,"observa":observa,"permeFin":permeFin,"complica":complica,"transMaxima":transMaxima,"usu":usu,"esta":esta}, //parametros
            success: function(response)
            {   
                if(response==1){
                    $(document).Toasts('create', {
                        class: 'bg-success', 
                        title: 'Validación',
                        subtitle: 'Aviso',
                        body: 'Estadística actualizada correctamente.',
                        icon:"fas fa-check-circle",
                        autohide:true,
                        delay:5000
                    });


                }

            console.log(response);
            },
            error: function (error) {
            //mensajes de error
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error actualizando estadística (error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
                console.log(error);

            }
    });
}



//funcion para guardar la fuerza de egreso
function GuardarFuerzaEgreso(idEstadFisioterapia,MSDabdhom,MSDflecod,MSDextmun,MSIabdhom,MSIflecod,MSIextmun,
                              MIDflexcad,MIDextrod,MIDdorsi,MIIflexcad,MIIextrod,MIIdorsi){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../EstadisticaTerapiaFisica/SetInsertarFuerzaEgreso',//llamado a metodo
        data: { "idEstadFisioterapia":idEstadFisioterapia,"MSDabdhom":MSDabdhom,"MSDflecod":MSDflecod,"MSDextmun":MSDextmun,
                "MSIabdhom":MSIabdhom,"MSIflecod":MSIflecod,"MSIextmun":MSIextmun,"MIDflexcad":MIDflexcad,"MIDextrod":MIDextrod,
                "MIDdorsi":MIDdorsi,"MIIflexcad":MIIflexcad,"MIIextrod":MIIextrod,"MIIdorsi":MIIdorsi}, //parametros
        success: function(response)
        {   

          if(response==1){
              $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Fuerza de egreso agregada correctamente.',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });
            }
          //console.log(response);
        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error agregando fuerza de egreso (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });


}

//function para agregar nueva terapia
function AgregarNuevaTerapia(estadistica,fecha,vm,transferencia,usuario){

    $("#agregarNuevaTerapia").hide();

  $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../EstadisticaTerapiaFisica/SetAgregarNuevaTerapia',//llamado a metodo
            data: {"estadistica":estadistica,"fecha":fecha,"vm":vm,"transferencia":transferencia,"usuario":usuario}, //parametros
            success: function(response)
            {   
                if(response==1){
                    $(document).Toasts('create', {
                        class: 'bg-success', 
                        title: 'Validación',
                        subtitle: 'Aviso',
                        body: 'Terapia Agregada correctamente.',
                        icon:"fas fa-check-circle",
                        autohide:true,
                        delay:5000
                    });

                var datosTerapias=ConsultarTerapiasPorEstadistica(codigoEstadistica);
                var j=datosTerapias.length;
                
                $('#contenidoTabla').text('');
                $(datosTerapias).each(function(i, v){        
                    $('#tablaTerapias').append('<tr><td>' + j + '</td><td>' + v.fecha + '</td><td>' + v.transferencia + '</td><td>' + v.vm +'</td><td>' + v.terapeuta + '</td></tr>');
                    j--;
                });

                

                }else{
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error agregando nueva terapia (error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                }); 
                }
                $("#agregarNuevaTerapia").show();

            //console.log(response);
            },
            error: function (error) {
            //mensajes de error
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error agregando nueva terapia (error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
                console.log(error);
                $("#agregarNuevaTerapia").show();
            }
    });
}





//Funcion encargada de validar los campos de la fuerza de egreso para que sean llenos
function ValidarCamposFuerzaEgreso(){

    if($("#MSDabdhomEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la abducción de hombro MSD.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSDabdhomEgre").focus(); 
        MSDabdhom="";
        return false;
    }else{
      
      MSDabdhom=$("#MSDabdhomEgre").val();
      if(MSDabdhom<0 || MSDabdhom >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    }


    if($("#MSDflecodEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la flexión de codo MSD.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSDflecodEgre").focus(); 
        MSDflecod="";
        return false;
    }else{
      MSDflecod=$("#MSDflecodEgre").val();
      if(MSDflecod<0 || MSDflecod >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    }

    if($("#MSDextmunEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la extensión de muñeca MSD.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSDextmunEgre").focus(); 
        MSDextmun="";
        return false;
    }else{
      MSDextmun=$("#MSDextmunEgre").val();
      if(MSDextmun<0 || MSDextmun >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    }


    if($("#MSIabdhomEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la abducción de hombro MSI.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSIabdhomEgre").focus(); 
        MSIabdhom="";
        return false;
    }else{
      MSIabdhom=$("#MSIabdhomEgre").val();
      if(MSIabdhom<0 || MSIabdhom >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    }

    if($("#MSIflecodEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la flexión de codo MSI.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSIflecodEgre").focus(); 
        MSIflecod="";
        return false;
    }else{
      MSIflecod=$("#MSIflecodEgre").val();
      if(MSIflecod<0 || MSIflecod >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    }


    if($("#MSIextmunEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la extensión de muñeca MSI.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSIextmunEgre").focus(); 
        MSIextmun="";
        return false;
    }else{
      MSIextmun=$("#MSIextmunEgre").val();
      if(MSIextmun<0 || MSIextmun >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    }


    if($("#MIDflexcadEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la flexión de cadera MID.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIDflexcadEgre").focus(); 
        MIDflexcad="";
        return false;
    }else{
      MIDflexcad=$("#MIDflexcadEgre").val();
      if(MIDflexcad<0 || MIDflexcad >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    }

    if($("#MIDextrodEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la extensión de rodilla MID.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIDextrodEgre").focus(); 
        MIDextrod="";
        return false;
    }else{
      MIDextrod=$("#MIDextrodEgre").val();
      if(MIDextrod<0 || MIDextrod >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    }

    if($("#MIDdorsiEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la dorsiflexión de tobillo MID.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIDdorsiEgre").focus(); 
        MIDdorsi="";
        return false;
    }else{
      MIDdorsi=$("#MIDdorsiEgre").val();
      if(MIDdorsi<0 || MIDdorsi >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    } 


    if($("#MIIflexcadEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la flexión de cadera MII.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIIflexcadEgre").focus(); 
        MIIflexcad="";
        return false;
    }else{
      MIIflexcad=$("#MIIflexcadEgre").val();
      if(MIIflexcad<0 || MIIflexcad >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    } 

    if($("#MIIextrodEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la extensión de rodilla MII.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIIextrodEgre").focus(); 
        MIIextrod="";
        return false;
    }else{
      MIIextrod=$("#MIIextrodEgre").val();
      if(MIIextrod<0 || MIIextrod >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    } 

    if($("#MIIdorsiEgre").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la dorsiflexión de tobillo MII.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIIdorsiEgre").focus(); 
        MIIdorsi="";
        return false;
    }else{
      MIIdorsi=$("#MIIdorsiEgre").val();
      if(MIIdorsi<0 || MIIdorsi >5){
        $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Los valores de fuerza deben ser entre 0 y 5.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
        return false;
      }
    } 

    return true;
}



//Funcion para validar numeros enteros del 0-9
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}

</script>


</body>
</html>