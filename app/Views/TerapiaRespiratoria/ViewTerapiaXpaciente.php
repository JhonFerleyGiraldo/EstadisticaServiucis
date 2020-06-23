<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | estadistica respiratoria</title>
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
          <div class="col-md-6">
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
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MSDabdhom">
                      </div> 
							        <div class="col-md-2">
                        <label for="MSDflecod">FLE COD</label>
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MSDflecod">
                      </div>
							        <div class="col-md-2">
								        <label for="MSDextmun">EXT MUÑ</label>
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" onKeyPress="return soloNumeros(event)" maxlength="1" id="MSDextmun">
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



var codigoTablaIngreso;
var codigoEstadistica;

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



    //Llenamos los valores de campos que vienen del get
    //$("#documento").val(documento);
    //$("#NumIngreso").val(numIngreso);
    //$("#terapeuta").val(nombreTerapeuta);

 
    var datosEstadistica=GetDatosEstadistica(codigoTablaIngreso);

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
      if($("#estado").val()=='CERRADO'){
        $("#estado").prop("disabled", true);
        $("#actualizarEstadistica").hide();
      }
      codigoEstadistica=v.codigo;
    });


});



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


function btnActualizarEstadistica(){

  var tqt=$("#tqt").val();
  var neumoniavm=$("#neumoniavm").val();
  var estado=$("#estado").val();

  ActualizarEstadistica(codigoEstadistica,codigoTablaIngreso,tqt,neumoniavm,estado);
    


}


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


//Funcion encargada de mandar la informacion a guardar
function AgregarNuevaEstadistica(){

    if(ValidarCampos()){
      
      var idEstadFisioterapia;

      idEstadFisioterapia=GuardarNuevaEstadisticaFisio(codigoIngreso,inicioTerapia,permeInicial,codigoTerapeuta);


      GuardarFuerzaIngreso( idEstadFisioterapia,MSDabdhom,MSDflecod,MSDextmun,MSIabdhom,MSIflecod,MSIextmun,
                            MIDflexcad,MIDextrod,MIDdorsi,MIIflexcad,MIIextrod,MIIdorsi);


      //se redirecciona la pagina hacia atras en 400.000 milisegundos
      setTimeout(window.history.back(),400000);
      
    }

}



function GuardarNuevaEstadisticaFisio(codigoIngreso,fechaInicio,permeIni,usuarioApert){
  var idEstadistica;
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../EstadisticaTerapiaFisica/SetInsertarNuevaEstadistica',//llamado a metodo
        data: { "codIngreso":codigoIngreso,"fechaInicio":fechaInicio,"permeIni":permeIni,"usuarioApert":usuarioApert}, //parametros
        success: function(response)
        {   

          idEstadistica=response;
          //console.log(response);
        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error agregando nueva estadística (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });

  return idEstadistica;

}







//Funcion para validar numeros enteros del 0-9
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}

</script>


</body>
</html>