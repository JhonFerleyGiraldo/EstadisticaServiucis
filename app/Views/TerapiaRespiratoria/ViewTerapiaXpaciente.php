<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | estadística respiratoria</title>
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
                <h3 class="card-title">Estadística respiratoria</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <?php
                  $nombreCompleto=""; 
                  foreach($datosPaciente as $item):
                    $nombreCompleto=$item["primerNombre"] . " " . $item["segundoNombre"] . " " . $item["primerApellido"] . " " . $item["segundoApellido"]; 
                ?>
                <div class="card-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                            <label for="documento">Doc Paciente</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="documento" value="<?= $item["documento"]; ?>" disabled>
                            </div> 
							<div class="col-md-2">
                            <label for="nombre">Paciente</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="nombre" value="<?=  $nombreCompleto ?>" disabled>
                            </div>
							<div class="col-md-2">
								<label for="tipoDoc">Tipo Documento</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="tipoDoc" value="<?= $item["tipoDoc"] ?>" disabled>
                            </div> 							
                        </div> 
                    </div>

					      <div class="form-group">
                  <div class="row">
                            <div class="col-md-2">
								  <label for="numIngreso">Num Ingreso</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="NumIngreso" value="<?= $item["numIngreso"] ?>" disabled>
                            </div>
							    <div class="col-md-2">
								  <label for="inicioTerapia">Ventilación Mecanica?</label>
                            </div>
                            <div class="col-md-2">
                              <input type="text" class="form-control" id="ventilacionMecanica"  disabled>
                              </div> 
                            <div class="col-md-2">
								    <label for="permeInicial">TQT</label>
                            </div>
                            <div class="col-md-2">
                            <input type="date" value=""  class="form-control" id="tqt" max="<?=date('Y-m-d');?>">
                            </div>
                        </div> 
                  </div>

                  <div class="form-group">
                  <div class="row">
                            <div class="col-md-2">
								  <label for="numIngreso">Neumonía por VM</label>
                            </div>
                            <div class="col-md-2">
                            <select class="form-control" name="" id="neumoniavm">
                                  <option value="NO">NO</option>
                                  <option value="SI">SI</option>
                                </select>
                            </div>
							    <div class="col-md-2">
								  <label for="inicioTerapia">Usuario Apertura</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="usuarioApertura"  disabled>
                              </div> 
                            <div class="col-md-2">
								    <label for="permeInicial">Ultima Actualización</label>
                            </div>
                            <div class="col-md-2">
                            <input type="text" value=""  class="form-control" id="usuarioActualizacion" disabled>
                            </div>
                        </div> 
                  </div>


                  <div class="form-group">
                  <div class="row">
                            <div class="col-md-2">
								  <label for="numIngreso">Fecha Actualización</label>
                            </div>
                            <div class="col-md-2">
                            <input type="text" class="form-control" id="fechaActualizacion"  disabled>
                            </div>
							    <div class="col-md-2">
								  <label for="inicioTerapia">Estado</label>
                            </div>
                            <div class="col-md-2">
                            <select class="form-control"  id="estado">
                                  <option value="ABIERTO">ABIERTO</option>
                                  <option value="CERRADO">CERRADO</option>
                                </select>
                              </div> 
                            <div class="col-md-2">
                            <button type="button"  onclick="window.history.back();" class="btn btn-success">Volver</i></button>
                            </div>
                            <div class="col-md-2">
                              <button id="actualizarEstadistica" type="button" onclick="btnActualizarEstadistica();" class="btn btn-primary"><img src="<?=BASEURL?>app/img/refrescar.png"></img> Actualizar</button>
                            </div>
                        </div> 
                  </div>
				
				
                <?php endforeach; ?>
              </form>
            </div>


            <!-- /.card -->

          </div>
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->







      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Ventilación Mecánica</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body"> 
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-1">
                        <label for="tipovm">Tipo</label>
                      </div>
                      <div class="col-md-2">           
                        <select class="form-control" name="" id="tipovm">
                          <option value="VM">VM</option>
                          <option value="VMNI">VMNI</option>
                          <option value="VMTQT">VMTQT</option>
                        </select>
                      </div> 
							        <div class="col-md-1">
                        <label for="fechainiciovm">Fecha Inserción</label>
                      </div>
                      <div class="col-md-2">
                        <input type="date" class="form-control" id="fechainiciovm" max="<?= date('Y-m-d') ?>" />
                      </div>
							        <div class="col-md-1">
								        <label for="fechafinvm">Fecha Retiro</label>
                      </div>
                      <div class="col-md-2">
                        <input type="date" class="form-control"   id="fechafinvm" max="<?= date('Y-m-d') ?>" />
                      </div> 		
                      <div class="col-md-1">
                      </div>	
                      <div class="col-md-2">
                        <button id="btnAgregarvm" type="button"  class="btn btn-primary"><img src="<?=BASEURL?>app/img/agregar.png"></img> Agregar</button>
                      </div> 				
                    </div> 
                    <br>
                    <div class="form-group">
                      <div class="row">
                        <table class="table table-sm" id="tablaVM">
								          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Código</th>
                              <th>Tipo VM</th>
                              <th>Fecha Inserción</th>
                              <th>Fecha Retiro</th>
                              <th>Opciones</th>
                            </tr>
								          </thead>
								          <tbody id="contenidoTabla">
								          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Fuerza de ingreso MSI</h3>
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
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MSIabdhom">
                      </div> 
							        <div class="col-md-2">
                        <label for="MSIflecod">FLE COD</label>
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MSIflecod">
                      </div>
							        <div class="col-md-2">
								        <label for="MSIextmun">EXT MUÑ</label>
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MSIextmun">
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
          <div class="col-md-6">
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
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MIDflexcad">
                      </div> 
							        <div class="col-md-2">
                        <label for="MIDextrod">EXT ROD</label>
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MIDextrod">
                      </div>
							        <div class="col-md-2">
								        <label for="MIDdorsi">DORSI</label>
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control"  onKeyPress="return soloNumeros(event)" maxlength="1" id="MIDdorsi">
                      </div> 							
                    </div> 
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Fuerza de ingreso MII</h3>
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
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1"  id="MIIflexcad">
                      </div> 
							        <div class="col-md-2">
                        <label for="MIIextrod">EXT ROD</label>
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MIIextrod">
                      </div>
							        <div class="col-md-2">
								        <label for="MIIdorsi">DORSI</label>
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MIIdorsi">
                      </div> 							
                    </div> 
                  </div> 
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="button"  onclick="window.history.back();" class="btn btn-success">Volver</i></button>
          </div>
          <div class="col-md-6">
            <button id="botonAgregarEstadistica" type="button" onclick="AgregarNuevaEstadistica();" class="btn btn-primary"><img src="<?=BASEURL?>app/img/agregar.png"></img> Guardar</button>
          </div>
        </div>
        <br>
      </div>

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


//variables globales
var codigoTablaIngreso;
var codigoEstadistica;
var tqt; //variable vara validar si el paciente tiene traqueostomia

$(document).ready(function(){

    codigoTablaIngreso=<?= $codigoTablaIngreso ?>; 

    nombreTerapeuta='<?=$_SESSION["nombreUsuario"]?>';
    codigoTerapeuta='<?=$_SESSION["codigoUsuario"]?>';

    var perfilUsuario='<?=$_SESSION["perfilUsuario"]?>';
    //Validamos el perfil


    if(perfilUsuario!="ADMINISTRADOR" && perfilUsuario!="TERAPIARESPIRATORIA" && perfilUsuario!="TERAPIA"){
        $("#actualizarEstadistica").hide();
    }

    

    //Se capturan las variables de php que
    //contienen los parametros get para la consulta
    var documento=<?=$documento?>;
    var numIngreso=<?=$numIngreso?>;

 
 //Obtenemos los datos de la estadistica
    var datosEstadistica=GetDatosEstadistica(codigoTablaIngreso);

    //recorremos la informacion y la pasamos a los campos de texto
    $(datosEstadistica).each(function(i, v){ 
      $("#ventilacionMecanica").val(v.vm);  
      $("#tqt").val(v.tqt);
      if($("#tqt").val()!=''){
        $("#tqt").prop("disabled", true);
      }
      $("#neumoniavm").val(v.neumonia);
      if($("#neumoniavm").val()!='NO'){
        $("#neumoniavm").prop("disabled", true);
      }
      $("#usuarioApertura").val(v.usuarioApertura);
      $("#usuarioActualizacion").val(v.actualizado);
      $("#fechaActualizacion").val(v.fechaActualizacion);
      $("#estado").val(v.estado);
      //si el estado del ingreso es cerrado
      if(v.estado=='CERRADO'){
        $("#estado").prop("disabled", true);
        $("#actualizarEstadistica").hide();
        $("#tqt").prop("disabled", true);
        $("#neumoniavm").prop("disabled", true);
        $("#btnAgregarvm").hide();   
      }
      //pasamos variables globales
      codigoEstadistica=v.codigo;
      tqt=v.tqt;
    });


    //consultamos datos de VM y llenamos la tabla
    ConsultarVMporEstadistica(codigoEstadistica);
  
});


//funcion encargada de consultar datos de la estadistica
function GetDatosEstadistica(codigoIngreso){
  var datos;
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../EstadisticaTerapiaRespiratoria/GetDatosEstadistica',//llamado a metodo
        data: { "codigoIngreso":codigoIngreso}, //parametros
        success: function(response)
        {   
          datos=response;
  
        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error consultando datos estadistica(error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });
  return datos;
}


//boton para actualizar la estadistica
function btnActualizarEstadistica(){

  var tqt=$("#tqt").val();
  var neumoniavm=$("#neumoniavm").val();
  var estado=$("#estado").val();

  ActualizarEstadistica(codigoEstadistica,codigoTablaIngreso,tqt,neumoniavm,estado);

  //se redirecciona la pagina hacia atras en 400.000 milisegundos
  setTimeout(window.history.back(),400000);

}


//funcion encargada de actualizar la estadistica
function ActualizarEstadistica(idEstadistica,codIngreso,tqt,neumoniavm,estado){

  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../EstadisticaTerapiaRespiratoria/SetActualizarEstadistica',//llamado a metodo
        data: { "idEstadistica":idEstadistica,"codIngreso":codIngreso,"tqt":tqt,"neumoniavm":neumoniavm,"estado":estado}, //parametros
        success: function(response)
        {   

          console.log(response);
          $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Estadística actualizada correctamente.',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });
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


//evento de click del boton para agregar ventilacion mecanica
$("#btnAgregarvm").click(function(){

  //recogemos los datos del formulario
  var tipovm=$("#tipovm").val();
  var iniciovm=$("#fechainiciovm").val();
  var finvm=$("#fechafinvm").val();

  //validamos si la fecha de tqt es null y si selecciono vmtqt
  if(tqt==null && tipovm=='VMTQT'){
    //no se podra agregar ya que primero se debe seleccionarfecha de traqueostomia
    $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Validación',
        subtitle: 'Aviso',
        body: 'Al paciente no se le ha realizado traqueostomía, favor validar.',
        icon:"fas fa-exclamation-triangle",
        autohide:true,
        delay:5000
      });
      return false;
  }

  //validamos si la fecha de inicio es mayor a la de tqt
  if(iniciovm<tqt){
    $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Validación',
        subtitle: 'Aviso',
        body: 'La fecha de inicio de VMTQT no puede ser inferior a la fecha de la TQT.',
        icon:"fas fa-exclamation-triangle",
        autohide:true,
        delay:5000
      });
      return false;
  }

  //validmaos si el inicio de la vm es vacio
  if(iniciovm==''){
    $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'Debe seleccionar una fecha de inserción.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        return false;
  }

  //validamos si la fecha de fin esta llena
  if(finvm!=''){
    if(iniciovm>finvm){
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Validación',
        subtitle: 'Aviso',
        body: 'La fecha de inserción no puede ser mayor a la fecha de retiro.',
        icon:"fas fa-exclamation-triangle",
        autohide:true,
        delay:5000
      });
      return false;
    }
  }

//consultamos datos de la ultima vm
  var ultimaVm=ConsultarUltimaVM(codigoEstadistica);

  var guardar=true;//variable encargada de validar si hay algun fallo en el proceso

//recorremos los datos de la ultima vm
  $(ultimaVm).each(function(i, v){

    //validamos si la fecha fin de la ultima vm es nula
    if(v.fin==null){
      $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'Debe retirar la última vm para continuar.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        guardar=false;
    }

    //validamos si la fecha de inicio para esta ventilacion mecanica no es menor de la fecha de retiro de la ultima vm
    if(iniciovm<v.fin){
      $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'La fecha de inicio para esta VM no puede ser menor a la fecha de retiro de la última VM.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        guardar=false;
    }
  });

//validamos si la variable esta en verdadero para guardar la informacion
  if(guardar){
    AgregarNuevaVM(codigoEstadistica,tipovm,iniciovm,finvm);
    $("#tipovm").val('VM');
    $("#fechainiciovm").val('');
    $("#fechafinvm").val('');
  }

  $datosVM=ConsultarVMporEstadistica(codigoEstadistica);
 
});


//funcion encargada de agregar nueva ventilacion mecanica
function AgregarNuevaVM(_codigoEstadistica,_tipovm,_iniciovm,_finvm){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../EstadisticaTerapiaRespiratoria/SetAgregarNuevaVM',//llamado a metodo
        data: {"codigoEstadistica":_codigoEstadistica,"tipovm":_tipovm,"iniciovm":_iniciovm,"finvm":_finvm}, //parametros
        success: function(response)
        {   
            if(response==1){
              $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Ventilación mecánica agregada con éxito.',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });

              //consultamos vm y agregamos a la tabla
              ConsultarVMporEstadistica(_codigoEstadistica);


            }else{
              $(document).Toasts('create', {
                  class: 'bg-danger', 
                  title: 'Validación',
                  subtitle: 'Error',
                  body: 'Error agregando nueva VM (error llamando consulta).',
                  icon:"fas fa-exclamation-circle",
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
                body: 'Error agregando nueva VM (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
});
}

//funcion encargada de consultar la ultima vm
function ConsultarUltimaVM(idEstadistica){
var datos;
$.ajax({
      type: "POST",
      dataType: 'json',
      async:false,//para que no sea asincrono
      url: '../EstadisticaTerapiaRespiratoria/GetUltimaVM',//llamado a metodo
      data: { "idEstadistica":idEstadistica}, //parametros
      success: function(response)
      {   

        //console.log(response);
        datos=response;
      },
      error: function (error) {
        //mensajes de error
          $(document).Toasts('create', {
              class: 'bg-danger', 
              title: 'Validación',
              subtitle: 'Error',
              body: 'Error consultando ultima vm (error llamando consulta).',
              icon:"fas fa-exclamation-circle",
              autohide:true,
              delay:5000
          });  
          console.log(error);

      }
});

return datos;

}

//funcion encargada de consultar las ventilaciones mecanicas del paciente
function ConsultarVMporEstadistica(idEstadistica){

var datos;

$.ajax({
          type: "POST",
          dataType: 'json',
          async:false,//para que no sea asincrono
          url: '../EstadisticaTerapiaRespiratoria/GetConsultarVMporEstadistica',//llamado a metodo
          data: {"idEstadistica":idEstadistica}, //parametros
          success: function(response)
          {   
              

            datos=response

            var j=1;
            $('#contenidoTabla').text('');
            //recorremos y llenamos la tabla
            $(datos).each(function(i, v){
              if(v.fechaFin==null){
                v.fechaFin='SIN RETIRAR';
                $('#tablaVM').append('<tr><td>' + j + '</td><td>' + v.codigo + '</td><td>' + v.tipo + '</td><td>' + v.fechaInicio+'</td><td>' + v.fechaFin + '</td><td><button type="button" onclick="RetirarVM(' + codigoEstadistica + ',' + v.codigo + ')" class="btn btn-danger">Retirar</button></td></tr>');
              }else{
                $('#tablaVM').append('<tr><td>' + j + '</td><td>' + v.codigo + '</td><td>' + v.tipo + '</td><td>' + v.fechaInicio+'</td><td>' + v.fechaFin + '</td><td></td></tr>');
              }   
              
              j++;

            });

            //console.log(response);
          },
          error: function (error) {
            //mensajes de error
              $(document).Toasts('create', {
                  class: 'bg-danger', 
                  title: 'Validación',
                  subtitle: 'Error',
                  body: 'Error consultando vm de estadistica (error llamando consulta).',
                  icon:"fas fa-exclamation-circle",
                  autohide:true,
                  delay:5000
              });  
              console.log(error);
          }
  });

  return datos;

}

//funcion encargada del retiro de la vm
function RetirarVM(idEstadistica,idvm){
  $.ajax({
      type: "POST",
      dataType: 'json',
      async:false,//para que no sea asincrono
      url: '../EstadisticaTerapiaRespiratoria/SetRetirarVM',//llamado a metodo
      data: { "idEstadistica":idEstadistica,"idvm":idvm}, //parametros
      success: function(response)
      {   

        //console.log(response);
        if(response==1){
          $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Ventilación mecánica retirada correctamente.',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });
        }else{
          $(document).Toasts('create', {
              class: 'bg-danger', 
              title: 'Validación',
              subtitle: 'Error',
              body: 'Error actualizando el retiro de vm (error llamando consulta).',
              icon:"fas fa-exclamation-circle",
              autohide:true,
              delay:5000
          }); 
        }

        //actualizamos la tabla
        ConsultarVMporEstadistica(idEstadistica);

      },
      error: function (error) {
        //mensajes de error
          $(document).Toasts('create', {
              class: 'bg-danger', 
              title: 'Validación',
              subtitle: 'Error',
              body: 'Error actualizando retiro vm (error llamando consulta).',
              icon:"fas fa-exclamation-circle",
              autohide:true,
              delay:5000
          });  
          console.log(error);

      }
});
}

//Funcion para validar numeros enteros del 0-9
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}

</script>


</body>
</html>