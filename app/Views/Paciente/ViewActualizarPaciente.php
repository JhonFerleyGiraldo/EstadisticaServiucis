<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Actualizar Paciente</title>
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
            <h1 class="m-0 text-dark">Actualizar Ingreso</h1>
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
                <h3 class="card-title">Datos del Ingreso</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                            <label for="consIngreso">Consecutivo Ingreso</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="consIngreso" disabled>
                            </div> 
							<div class="col-md-2">
                            <label for="fechaIngreso">Fecha Ingreso</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="fechaIngreso" disabled>
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
								<label for="documento">Documento</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="documento" disabled>
                            </div>
							<div class="col-md-2">
								<label for="numHistoria">Número Historia</label>
                            </div>
                            <div class="col-md-2">
                                 <input type="text" class="form-control" id="numHistoria" disabled>
                            </div> 
							<div class="col-md-2">
								<label for="fechaNacimiento">Fecha Nacimiento</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="fechaNacimiento" disabled>
                            </div>
                        </div> 
                    </div>
				
					<div class="form-group">
                        <div class="row">
                             <div class="col-md-2">
								<label for="nombre">Nombre</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="nombre" disabled>
                            </div>
							 <div class="col-md-2">
                            <label for="genero">Genero</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="genero" disabled>
                            </div>
							<div class="col-md-2">
								<label for="dxIngreso1">DxIngreso1</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="dxIngreso1" disabled>
                            </div>
                        </div> 
                    </div>
					
					<div class="form-group">
                        <div class="row">
							 <div class="col-md-2">
                            <label for="dxIngreso2">Dx Ingreso 2</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="dxIngreso2" disabled>
                            </div>
							<div class="col-md-2">
								<label for="apache2">Apache 2</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" onkeypress="return NumCheck(event, this)" id="apache2">
                            </div> 
							<div class="col-md-2">
								<label for="mortPredicha">Mortalidad Predicha</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" onkeypress="return NumCheck(event, this)" id="mortPredicha">
                            </div> 
                        </div> 
                    </div>
					
					
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
								<label for="sofa">Sofa</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="sofa" maxlength="3">
                            </div> 
							<div class="col-md-2">
								<label for="cama">Cama</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="cama" onblur="ValidarSiCamaOcupada();" maxlength="4">
                            </div> 
							<div class="col-md-2">
								<label for="estadoIngreso">Estado Ingreso</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="estadoIngreso" style="width: 100%;">
                                    <option value="ABIERTO" selected="selected">ABIERTO</option>
                                    <option value="CERRADO">CERRADO</option>
                                </select>
                            </div> 
                        </div> 
                    </div>
					
					<div class="form-group">
                        <div class="row">
							<div class="col-md-2">
                            <label for="egresoVivo">Egreso Vivo?</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="egresoVivo" style="width: 100%;">
                                    <option selected="selected"></option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
							<div class="col-md-2">
								<label for="lugarEgreso">Lugar Egreso</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="lugarEgreso" style="width: 100%;">
                                    <option selected="selected"></option>
                                    <option value="DOMICILIO">DOMICILIO</option>
                                    <option value="HOSPITAL">HOSPITAL</option>
                                </select>
                                
                            </div>
							<div class="col-md-2">
								<label for="nombreHospital">Nombre Hospi.</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="nombreHospital" maxlength="200">
                            </div> 							
                        </div> 
                    </div>
					
          <div class="form-group">
            <div class="row">
                <div class="col-md-2">
								  <label for="fechaCierre">Fecha Cierre</label>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="fechaCierre" disabled>
                </div> 							
							  <div class="col-md-2">
								  <label for="usuarioCierre">Usuario Cierre</label>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="usuarioCierre" disabled>
                </div>
							  <div class="col-md-2">
                  <label for="usuarioIngreso">Usuario del Ingreso</label>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="usuarioIngreso" disabled>
                </div>
              </div> 
            </div>

            <div class="form-group">
            <div class="row">
							  <div class="col-md-2">
                  <label for="sedeServicio">Sede Servicio</label>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="sedeServicio" disabled>
                </div>
              </div> 
            </div>

          </div>

					
    
                <!-- /.card-body -->

                <div class="card-footer">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button"  onclick="window.history.back();" class="btn btn-success">Volver</i></button>
                            </div>
                            <div class="col-md-6">
                                <button id="botonActualizar" type="button" onclick="ActualizarIngreso();" class="btn btn-primary"><img src="<?=BASEURL?>app/img/refrescar.png"></img> Actualizar</button>
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
	
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos de Estancias</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
								              <label for="tipoServicioEstancia">Tipo Servicio</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="tipoServicioEstancia" style="width: 100%;">
                                    <option value="UCI ADULTOS" selected="selected">UCI ADULTOS</option>
                                    <option value="UCE ADULTOS">UCE ADULTOS</option>
                                </select>
                            </div> 
							              <div class="col-md-2">
                              <label for="fechaIngresoEstancia">Fecha Ingreso</label>
                            </div>
                            <div class="col-md-3">
                              <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaIngresoEstancia">
                            </div>
                            <div class="col-md-3">
                              <button id="agregarNuevaEstancia" type="button" onclick="BotonAgregarEstancia();" class="btn btn-primary">Agregar</button>
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
								<table class="table table-sm" id="tablaEstancias">
								  <thead>
									<tr>
									  <th style="width: 10px">#</th>
									  <th>Fecha Ingreso</th>
									  <th>Fecha Egreso</th>
									  <th>Tipo Servicio</th>
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
    <!-- /.content -->
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

//Se almacenara en esta variable el codigo de ingreso o clave primaria
//de la tabla de ingreso para el paciente consultado
var codigoIngresoTabla;

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


  var perfilUsuario='<?=$_SESSION["perfilUsuario"]?>';

  if(perfilUsuario=="MEDICO"){
    $("#cama").prop('disabled', true);
    $("#estadoIngreso").prop('disabled', true);  
    $("#egresoVivo").prop('disabled', true);
    $("#lugarEgreso").prop('disabled', true);
    $("#nombreHospital").prop('disabled',true);
    $("#agregarNuevaEstancia").hide();
  }else if(perfilUsuario=="ENFERMERIA"){
    $("#apache2").prop('disabled', true);
    $("#mortPredicha").prop('disabled', true);
    $("#sofa").prop('disabled', true);
  }else if(perfilUsuario!="ADMINISTRADOR" && perfilUsuario!="ENFERMERIA" && perfilUsuario!="MEDICO"){
    $("#cama").prop('disabled', true);
    $("#estadoIngreso").prop('disabled', true);  
    $("#egresoVivo").prop('disabled', true);
    $("#lugarEgreso").prop('disabled', true);
    $("#nombreHospital").prop('disabled',true);
    $("#apache2").prop('disabled', true);
    $("#mortPredicha").prop('disabled', true);
    $("#sofa").prop('disabled', true);
    $("#botonAgregarEstancia").hide();
    $("#botonActualizar").hide();
  }

  //se bloquean estos tres campos ya que solo se habilitaran si se cierra el ingreso
  $('#lugarEgreso').prop('disabled', true);
  $('#nombreHospital').prop('disabled', true);
  $("#egresoVivo").prop('disabled', true);
 
  //Se capturan las variables de php que
  //contienen los parametros get para la consulta
  var documento=<?=$documento?>;
  var numIngreso=<?=$numIngreso?>;


  //Llenamos los valores de campos que vienen del get
  $("#documento").val(documento);
  $("#consIngreso").val(numIngreso);
  $("#numHistoria").val(documento);

  //Validamos si los campos del formulario son diferentes de 0
  //ya que si son 0 quiere decir que no mandaron valor por get en url
  if($("#documento").val()!=0 && $("#consIngreso").val()!=0){

    var datosIngreso=ConsultarIngresoPorPaciente(documento,numIngreso);
    var nombrePacienteCompleto;
    
    
    //console.log(datosIngreso);

    //recorremos la repuesta
    $(datosIngreso).each(function(i, v){ // indice, valor
                
       //Llenamos los campos del formulario con la informacion
       //obtenida por la consulta    
      codigoIngresoTabla=v.codigoIngresoTabla; //se obtirne la clave primaria de la tabla     
      $("#consIngreso").val(v.numIngreso);  
      $("#fechaIngreso").val(v.fechaIngreso);  
      $("#tipoDoc").val(v.tipoDoc);  
      $("#documento").val(v.documento);  
      $("#numHistoria").val(v.HC);  
      $("#fechaNacimiento").val(v.fechaNacimiento);       
      nombrePacienteCompleto=v.primerNombre+' '+v.segundoNombre+' '+v.primerApellido+' '+v.segundoApellido;
      $("#nombre").val(nombrePacienteCompleto);
      $("#genero").val(v.genero);
      $("#dxIngreso1").val(v.codDx1Ingreso+' '+v.dx1Ingreso);

      //Validamos si el paciente tiene diagnostico 2
      if(v.codDx2Ingreso==null){
        $("#dxIngreso2").val('No tiene');
      }else{
        $("#dxIngreso2").val(v.codDx2Ingreso+' '+v.dx2Ingreso);
      }
      
      $("#apache2").val(v.apache2);
      $("#mortPredicha").val(v.mortalidadPredicha);
      $("#sofa").val(v.sofa);
      $("#cama").val(v.cama);

      //Agregamos el valor del estado
      $("#estadoIngreso").val(v.estadoIngreso);
      //validamos si el estado es cerrado
      if(v.estadoIngreso=='CERRADO'){
        //$("#apache2").prop('disabled', true);
        //$("#mortPredicha").prop('disabled', true);
        //$("#sofa").prop('disabled', true);
        $("#cama").prop('disabled', true);
        $("#estadoIngreso").prop('disabled', true);
        $("#egresoVivo").prop('disabled', true);
        $("#lugarEgreso").prop('disabled', true);
        $("#nombreHospital").prop('disabled',true);
        $("#agregarNuevaEstancia").hide();
        if(perfilUsuario!="MEDICO" && perfilUsuario!="ADMINISTRADOR"){
          $("#botonActualizar").hide();
        }

      }

      $("#egresoVivo").val(v.egresoVivo);
      $("#lugarEgreso").val(v.lugarEgreso);
      $("#nombreHospital").val(v.nombreHospital);
      $("#fechaCierre").val(v.fechaEgreso);
      $("#usuarioCierre").val(v.usuarioEgreso);
      $("#usuarioIngreso").val(v.usuarioIngreso);
      $("#sedeServicio").val(v.codSedeAtencion+' '+v.sedeAtencion);

     
    });

    var datosEstancia=ConsultarEstanciasPorIngreso(codigoIngresoTabla);
    //console.log(datosEstancia);

    var j=1;
    $(datosEstancia).each(function(i, v){
      if(v.fechaEgreso==null){v.fechaEgreso='SIN EGRESAR'}
      $('#tablaEstancias').append('<tr><td>' + j + '</td><td>' + v.fechaIngreso + '</td><td>' + v.fechaEgreso + '</td><td>' + v.tipoServicio+'</tr>');
      j++;
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



function AgregarNuevaEstancia(fechaIngresoEstancia,tipoServicio){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Paciente/SetAgregarNuevaEstancia',//llamado a metodo
        data: {"numIngreso":codigoIngresoTabla,"fechaIngresoEstancia":fechaIngresoEstancia,"tipoServicio":tipoServicio}, //parametros
        success: function(response)
        {   
            if(response==1){
              $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Estancia Agregada correctamente.',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });

              var datosEstancia=ConsultarEstanciasPorIngreso(codigoIngresoTabla);
              var j=1;
              
              $('#contenidoTabla').text('');
              $(datosEstancia).each(function(i, v){
                if(v.fechaEgreso==null){v.fechaEgreso='SIN EGRESAR'}
                  
                  $('#tablaEstancias').append('<tr><td>' + j + '</td><td>' + v.fechaIngreso + '</td><td>' + v.fechaEgreso + '</td><td>' + v.tipoServicio+'</tr>');
                  j++;
              });

            }else{
              $(document).Toasts('create', {
                  class: 'bg-danger', 
                  title: 'Validación',
                  subtitle: 'Error',
                  body: 'Error agregando nueva estancia (error llamando consulta).',
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
                body: 'Error agregando nueva estancia (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
});
}

function BotonAgregarEstancia(){

  var tipoServicio=$("#tipoServicioEstancia").val()
  var fechaIngresoEstancia=$("#fechaIngresoEstancia").val();


  //validamos que la fecha a ingresar en el sistema no sea mayor a la actual
  var fechaActual='<?= date('Y-m-d'); ?>';
  if(fechaIngresoEstancia>fechaActual){
    $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Validación',
        subtitle: 'Aviso',
        body: 'La fecha de ingreso a la estancia no puede ser mayor a la fecha actual.',
        icon:"fas fa-exclamation-triangle",
        autohide:true,
        delay:5000
      });
      return false;
  }

//Obtenemos la sede en la que nos encontramos
  var sede=<?=$_SESSION["sede"]?>;

  //Validamos la sede, para ser concatenada al tipo de servicio
  if(sede=='110'){
    tipoServicio=tipoServicio+' RIONEGRO';
  }else if(sede=='120'){
    tipoServicio=tipoServicio+' APARTADO';
  }

  var datosUltimaEstancia=ConsultarEstanciaSinCerrar(codigoIngresoTabla);


  $(datosUltimaEstancia).each(function(i, v){ // indice, valor

    if(tipoServicio==v.tipoServicio){
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Validación',
        subtitle: 'Aviso',
        body: 'El paciente ya se encuentra en ' + tipoServicio + '. Favor validar.',
        icon:"fas fa-exclamation-triangle",
        autohide:true,
        delay:5000
      });
      return false;
    }


    if(fechaIngresoEstancia<v.fechaIngreso){
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Validación',
        subtitle: 'Aviso',
        body: 'La fecha de ingreso a el servicio ' + tipoServicio + ' no puede ser menor a la fecha de ingreso del servicio anterior ' + v.tipoServicio + '. Favor validar.',
        icon:"fas fa-exclamation-triangle",
        autohide:true,
        delay:5000
      });
      return false;
    } 


    AgregarNuevaEstancia(fechaIngresoEstancia,tipoServicio);

  });

}

function ConsultarEstanciaSinCerrar(numIngresoTabla){
var resultado;
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Paciente/GetConsultarEstanciaSinCerrar',//llamado a metodo
        data: {"numIngreso":numIngresoTabla}, //parametros
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
                body: 'Error consultando estancia sin cerrar (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
});

return resultado;

}

function ActualizarIngreso(){

  var perfilUsuario='<?=$_SESSION["perfilUsuario"]?>';

  //obtenemos los parametros de consicion para la consulta
  var numIngreso=$("#consIngreso").val();
  var numHistoriaClinica=$("#numHistoria").val();

  var apache2 = $("#apache2").val();
  var mortPredicha = $("#mortPredicha").val();
  var sofa = $("#sofa").val();

  if(perfilUsuario=="MEDICO"){
    var actuXmedico=MedicoActualizaIngreso(numHistoriaClinica,numIngreso,apache2,mortPredicha,sofa);
    
    $(document).Toasts('create', {
      class: 'bg-success', 
      title: 'Validación',
      subtitle: 'Aviso',
      body: 'Datos del medico agregados correctamente.',
      icon:"fas fa-check-circle",
      autohide:true,
      delay:5000
    });

    //se redirecciona la pagina hacia atras en 400.000 milisegundos
    setTimeout(window.history.back(),400000);

  }else if(perfilUsuario=="ENFERMERIA"){
    
    if(ValidarSiCamaOcupada()==false){
      return false;
    }

    var cama=$("#cama").val();
    var estadoIngreso=$("#estadoIngreso").val();
    var egresoVivo=$("#egresoVivo").val();
    var lugarEgreso=$("#lugarEgreso").val();
    var nombreHospital=$("#nombreHospital").val();

    

    if(estadoIngreso=="CERRADO"){
      if(egresoVivo=='' || cama==''){
        $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'Para cambiar el ingreso a estado cerrado, debe llenar todos los campos del ingreso. Favor validar.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        return false;
      }
    }


    if(lugarEgreso=="HOSPITAL"){
      if(nombreHospital==''){
        $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'Debe ingresar el nombre del hospital de egreso.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        $("#nombreHospital").focus();
        return false;
      }
    }else{
      //si es diferente a hospital, vaciamos cualquier valor de la variable, para poder inssertar como null
      nombreHospital='';
    }

    var actuXEnfermeria=EnfermeriaActualizaIngreso(numHistoriaClinica,numIngreso,codigoIngresoTabla,cama,estadoIngreso,egresoVivo,lugarEgreso,nombreHospital);

    $(document).Toasts('create', {
      class: 'bg-success', 
      title: 'Validación',
      subtitle: 'Aviso',
      body: 'Datos de enfermeria agregados correctamente.',
      icon:"fas fa-check-circle",
      autohide:true,
      delay:5000
    });

    setTimeout(window.history.back(),400000);

  }else if(perfilUsuario=="ADMINISTRADOR"){

    if(ValidarSiCamaOcupada()==false){
      return false;
    }

    var actuXmedico=MedicoActualizaIngreso(numHistoriaClinica,numIngreso,apache2,mortPredicha,sofa);
    
    $(document).Toasts('create', {
      class: 'bg-success', 
      title: 'Validación',
      subtitle: 'Aviso',
      body: 'Datos del medico agregados correctamente.',
      icon:"fas fa-check-circle",
      autohide:true,
      delay:5000
    });

    var cama=$("#cama").val();
    var estadoIngreso=$("#estadoIngreso").val();
    var egresoVivo=$("#egresoVivo").val();
    var lugarEgreso=$("#lugarEgreso").val();
    var nombreHospital=$("#nombreHospital").val();

    


    if(estadoIngreso=="CERRADO"){
      if(egresoVivo=='' || cama==''){
        $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'Para cambiar el ingreso a estado cerrado, debe llenar todos los campos del ingreso. Favor validar.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        return false;
      }
    }

    if(lugarEgreso=="HOSPITAL"){
      if(nombreHospital==''){
        $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'Debe ingresar el nombre del hospital de egreso.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        $("#nombreHospital").focus();
        return false;
      }
    }

    var actuXEnfermeria=EnfermeriaActualizaIngreso(numHistoriaClinica,numIngreso,codigoIngresoTabla,cama,estadoIngreso,egresoVivo,lugarEgreso,nombreHospital);

    $(document).Toasts('create', {
      class: 'bg-success', 
      title: 'Validación',
      subtitle: 'Aviso',
      body: 'Datos de enfermeria agregados correctamente.',
      icon:"fas fa-check-circle",
      autohide:true,
      delay:5000
    });

    //se redirecciona la pagina hacia atras en 400.000 milisegundos
    setTimeout(window.history.back(),400000);

  }
}


$("#egresoVivo").change(function() {
  if($("#egresoVivo").val()=="NO"){
    $('#lugarEgreso').val("");
    $('#nombreHospital').val("");
    $('#lugarEgreso').prop('disabled', true);
    $('#nombreHospital').prop('disabled', true);
  }else{
    $('#lugarEgreso').prop('disabled', false);
    $('#nombreHospital').prop('disabled', false);
  }
});

$("#lugarEgreso").change(function() {
  if($("#lugarEgreso").val()=="DOMICILIO"){
    $('#nombreHospital').val("");
    $('#nombreHospital').prop('disabled', true);
  }else{
    $('#nombreHospital').prop('disabled', false);
  }
});


$("#estadoIngreso").change(function() {
  if($("#estadoIngreso").val()=="ABIERTO"){
    $("#egresoVivo").val("");
    $('#nombreHospital').val("");
    $('#lugarEgreso').val("");
    $('#lugarEgreso').prop('disabled', true);
    $('#nombreHospital').prop('disabled', true);
    $("#egresoVivo").prop('disabled', true);
  }else{
    $('#lugarEgreso').prop('disabled', false);
    $('#nombreHospital').prop('disabled', false);
    $("#egresoVivo").prop('disabled', false);
  }
});

function ValidarSiCamaOcupada(){
  
  var numHistoriaPacienteActual=$("#numHistoria").val()
  var numeroCama=$("#cama").val(); 
  var sede=<?=$_SESSION["sede"]?>;

//primero validamos la sede y los numeros de cama
//disponibles para cada sede
  if(sede=='110'){
    if(!(numeroCama>100 && numeroCama<213)){
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Validación',
        subtitle: 'Aviso',
        body: 'El número de cama ' + numeroCama + ' no corresponde a la sede 110 RIONEGRO. Favor validar.',
        icon:"fas fa-exclamation-triangle",
        autohide:true,
        delay:5000
      });
      $("#cama").focus();
      $('#botonActualizar').prop('disabled', true);
      return false;
    }else{
      $('#botonActualizar').prop('disabled', false);
    }
  }else if(sede=='120'){
    if(!(numeroCama>100 && numeroCama<111)){
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Validación',
        subtitle: 'Aviso',
        body: 'El número de cama ' + numeroCama + ' no corresponde a la sede 120 APARTADO. Favor validar.',
        icon:"fas fa-exclamation-triangle",
        autohide:true,
        delay:5000
      });
      $("#cama").focus();
      $('#botonActualizar').prop('disabled', true);
      return false;
    }else{
      $('#botonActualizar').prop('disabled', false);
    }  
  }

  $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../Paciente/GetValidarSiCamaOcupada',//llamado a metodo
            data: {"numeroCama":numeroCama,"sede":sede}, //parametros
            success: function(response)
            {   
                

              if(response!=0){
            
                //validamos si se trata de el mismo paciente que tenia la cama devolvemos true
                //ya que no esta siendo ocupada la cama por otro paciente, si no por el mismo
                if(numHistoriaPacienteActual==response[0].historiaClinica){
                  return true;  
                }
                
                $(document).Toasts('create', {
                  class: 'bg-warning', 
                  title: 'Validación',
                  subtitle: 'Aviso',
                  body: 'La cama N°'+ numeroCama + ' se encuentra ocupada con un ingreso abierto .Favor validar.',
                  icon:"fas fa-exclamation-triangle",
                  autohide:true,
                  delay:5000
                });

                

                $('#botonActualizar').prop('disabled', true);
                $("#cama").focus();
                return false;
              }else{
                $('#botonActualizar').prop('disabled', false);
              }

              //console.log(response);
            },
            error: function (error) {
              //mensajes de error
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error validando cama ocupada (error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
                console.log(error);
            }
    });

}

function MedicoActualizaIngreso(numHistoria,numIngreso,apache2,mortPredicha,sofa){
  var resultado;
  $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../Paciente/SetMedicoActualizaIngreso',//llamado a metodo
            data: {"numHistoria":numHistoria,"numIngreso":numIngreso,"apache2":apache2,"mortPredicha":mortPredicha,"sofa":sofa}, //parametros
            success: function(response)
            {   
                

              resultado=response

              //console.log(response);
            },
            error: function (error) {
              //mensajes de error
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error actualizando el ingreso del paciente (error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
                console.log(error);
            }
    });

    return resultado;
}


function EnfermeriaActualizaIngreso(numHistoria,numIngreso,codigoIngresoTabla,cama,estadoIngreso,egresoVivo,lugarEgreso,nomHospital){
  var resultado;
  $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../Paciente/SetEnfermeriaActualizaIngreso',//llamado a metodo
            data: {"codigoIngresoTabla":codigoIngresoTabla,"numHistoria":numHistoria,"numIngreso":numIngreso,"cama":cama,"estadoIngreso":estadoIngreso,"egresoVivo":egresoVivo,"lugarEgreso":lugarEgreso,"nomHospital":nomHospital}, //parametros
            success: function(response)
            {   
                

              resultado=response

              console.log(response);
            },
            error: function (error) {
              //mensajes de error
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error actualizando el ingreso del paciente (error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
                console.log(error);
            }
    });

    return resultado;
}

function ConsultarIngresoPorPaciente(documento,numIngreso){
  var datosIngreso;
  $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../Paciente/GetConsultarIngresoPorPaciente',//llamado a metodo
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
                    body: 'Error consultando el ingreso del paciente (error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
                console.log(error);
            }
    });

    return datosIngreso;

}

function ConsultarEstanciasPorIngreso(codigoIngreso){

  var datosEstancia;

  $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../Paciente/GetConsultarEstanciasPorIngreso',//llamado a metodo
            data: {"numIngreso":codigoIngreso}, //parametros
            success: function(response)
            {   
                

              datosEstancia=response

              //console.log(response);
            },
            error: function (error) {
              //mensajes de error
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error consultando estancias del paciente (error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
            }
    });

    return datosEstancia;

}

//Funcion para validar numeros decimales de 2 decimales
function NumCheck(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  // backspace
  if (key == 8) return true
  // 0-9
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{2}$/
    return !(regexp.test(field.value))
  }
  // .
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  // other key
  return false
 
}





</script>

</body>
</html>