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
                <h3 class="card-title">Nueva estadistica física</h3>
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
                                <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="inicioTerapia">
                            </div> 
                            <div class="col-md-2">
								<label for="permeInicial">Perme Inicial</label>
                            </div>
                            <div class="col-md-2">
                            <input type="text" value="" onKeyPress="return soloNumeros(event)"  class="form-control" id="permeInicial" maxlength="3" >
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

//fecha ingreso del paciente
var fechaIngreso;



//variables de los campos
var codigoIngreso;
var inicioTerapia;
var permeInicial;
var codigoTerapeuta;
var nombreTerapeuta;

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

    nombreTerapeuta='<?=$_SESSION["nombreUsuario"]?>';
    codigoTerapeuta='<?=$_SESSION["codigoUsuario"]?>';

    var perfilUsuario='<?=$_SESSION["perfilUsuario"]?>';
    //Validamos el perfil


    if(perfilUsuario!="ADMINISTRADOR" && perfilUsuario!="TERAPIAFISICA" && perfilUsuario!="TERAPIA"){
        $("#botonAgregarEstadistica").hide();
    }

    //Se capturan las variables de php que
    //contienen los parametros get para la consulta
    var documento=<?=$documento?>;
    var numIngreso=<?=$numIngreso?>;



    //Llenamos los valores de campos que vienen del get
    $("#documento").val(documento);
    $("#NumIngreso").val(numIngreso);
    $("#terapeuta").val(nombreTerapeuta);

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

            fechaIngreso=v.fechaIngreso;
     
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


//funcion para guardar la fuerza de ingreso
function GuardarFuerzaIngreso(idEstadFisioterapia,MSDabdhom,MSDflecod,MSDextmun,MSIabdhom,MSIflecod,MSIextmun,
                              MIDflexcad,MIDextrod,MIDdorsi,MIIflexcad,MIIextrod,MIIdorsi){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../EstadisticaTerapiaFisica/SetInsertarFuerzaIngreso',//llamado a metodo
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
                body: 'Estadistica agregada correctamente.',
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
                body: 'Error agregando fuerza de ingreso (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });


}



//Funcion encargada de validar los campos del formulario
//validaro los datos que se encuentran allí
function ValidarCampos(){
    
  if($("#inicioTerapia").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar la fecha de inicio terapia.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#inicioTerapia").focus(); 
        inicioTerapia="";
        return false;
    }else{


       //validamos para que la fecha de inicio no sea antes de la fecha de ingreso
       if($("#inicioTerapia").val()<fechaIngreso){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'La fecha de inicio de terapia no puede ser menor a la fecha de ingreso (' + fechaIngreso + ').',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#inicioTerapia").focus(); 
        return false;
      }

      inicioTerapia=$("#inicioTerapia").val();
    }


    //validamos que la fecha a ingresar en el sistema no sea mayor a la actual
    var fechaActual='<?= date('Y-m-d'); ?>';
    if(inicioTerapia>fechaActual){
      $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'La fecha de inicio terapia no puede ser mayor a la fecha actual.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        return false;
    }


    if($("#permeInicial").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar el perme inicial.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#permeInicial").focus(); 
        permeInicial="";
        return false;
    }else{
      permeInicial=$("#permeInicial").val();
      if(permeInicial<0 || permeInicial>32){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'El perme inicial debe ser entre 0 y 32.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#permeInicial").focus(); 
        permeInicial="";
        return false;
      }
    }

    if($("#MSDabdhom").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la abducción de hombro MSD.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSDabdhom").focus(); 
        MSDabdhom="";
        return false;
    }else{
      
      MSDabdhom=$("#MSDabdhom").val();
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


    if($("#MSDflecod").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la flexión de codo MSD.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSDflecod").focus(); 
        MSDflecod="";
        return false;
    }else{
      MSDflecod=$("#MSDflecod").val();
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

    if($("#MSDextmun").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la extensión de muñeca MSD.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSDextmun").focus(); 
        MSDextmun="";
        return false;
    }else{
      MSDextmun=$("#MSDextmun").val();
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


    if($("#MSIabdhom").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la abducción de hombro MSI.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSIabdhom").focus(); 
        MSIabdhom="";
        return false;
    }else{
      MSIabdhom=$("#MSIabdhom").val();
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

    if($("#MSIflecod").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la flexión de codo MSI.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSIflecod").focus(); 
        MSIflecod="";
        return false;
    }else{
      MSIflecod=$("#MSIflecod").val();
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


    if($("#MSIextmun").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la extensión de muñeca MSI.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MSIextmun").focus(); 
        MSIextmun="";
        return false;
    }else{
      MSIextmun=$("#MSIextmun").val();
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


    if($("#MIDflexcad").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la flexión de cadera MID.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIDflexcad").focus(); 
        MIDflexcad="";
        return false;
    }else{
      MIDflexcad=$("#MIDflexcad").val();
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

    if($("#MIDextrod").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la extensión de rodilla MID.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIDextrod").focus(); 
        MIDextrod="";
        return false;
    }else{
      MIDextrod=$("#MIDextrod").val();
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

    if($("#MIDdorsi").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la dorsiflexión de tobillo MID.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIDdorsi").focus(); 
        MIDdorsi="";
        return false;
    }else{
      MIDdorsi=$("#MIDdorsi").val();
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


    if($("#MIIflexcad").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la flexión de cadera MII.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIIflexcad").focus(); 
        MIIflexcad="";
        return false;
    }else{
      MIIflexcad=$("#MIIflexcad").val();
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

    if($("#MIIextrod").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la extensión de rodilla MII.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIIextrod").focus(); 
        MIIextrod="";
        return false;
    }else{
      MIIextrod=$("#MIIextrod").val();
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

    if($("#MIIdorsi").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Debe ingresar la dorsiflexión de tobillo MII.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#MIIdorsi").focus(); 
        MIIdorsi="";
        return false;
    }else{
      MIIdorsi=$("#MIIdorsi").val();
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