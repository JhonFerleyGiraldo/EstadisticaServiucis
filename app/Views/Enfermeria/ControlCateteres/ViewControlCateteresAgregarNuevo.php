<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Nuevo Catéter</title>
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
                <h3 class="card-title">Nuevo Catéter</h3>
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
								<label for="fechaInsercion">Fecha Insercion</label>
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fechaInsercion">
                            </div> 
							<div class="col-md-2">
								<label for="tipoCateter">Tipo Catéter</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="tipoCateter" style="width: 100%;">
                                    <option ></option>
                                    <option >PICC</option>
                                    <option >CVC</option>
                                    <option >LA</option>
                                    <option >HEMODIÁLISIS</option>
                                </select>
                            </div>
                        </div> 
                    </div>
				
					<div class="form-group">
                        <div class="row">
                             <div class="col-md-2">
								<label for="ubiAnatomica">Ubi. Anatom.</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="ubiAnatomica" style="width: 100%;">
                                    <option ></option>
                                    <option >BD</option>
                                    <option >BI</option>
                                    <option >FD</option>
                                    <option >FI</option>
                                    <option >MSD</option>
                                    <option >MSI</option>
                                    <option >RD</option>
                                    <option >RI</option>
                                    <option >SCD</option>
                                    <option >SCI</option>
                                    <option >YD</option>
                                    <option >YI</option>                    
                                </select>
                            </div>
							 <div class="col-md-2">
                            <label for="lugarProcedimiento">Lug. Procedimiento</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="lugarProcedimiento" style="width: 100%;">
                                    <option selected>Interno</option>
                                    <option >Externo</option>
                                </select>
                            </div>
							<div class="col-md-2">
								<label for="medico">Medico</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="medico" style="width: 100%;">
                                    <option value="" ></option>
                                    <?php foreach($medicos as $dato): ?> 
                                        <option value="<?= $dato["codigo"]; ?>"><?=$dato["nombre"];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> 
                    </div>
					
					<div class="form-group">
                        <div class="row">
							 <div class="col-md-2">
                            <label for="enfermero">Enfermer@</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="enfermero" style="width: 100%;">
                                    <option value="" ></option>
                                    <?php foreach($enfermeros as $dato): ?> 
                                        <option value="<?= $dato["codigo"]; ?>"><?=$dato["nombre"];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
							<div class="col-md-2">
								<label for="numPunciones">Número Punciones</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" value="1" onKeyPress="return soloNumeros(event)"  class="form-control" id="numPunciones" maxlength="2" >
                            </div> 
							<div class="col-md-2">
								<label for="fechaRetiro">Fecha Retiro</label>
                            </div>
                            <div class="col-md-2">
                            <input class="form-control" type="date" value="" max="<?=date('Y-m-d')?>" id="fechaRetiro">
                            </div> 
                        </div> 
                    </div>
					
					
					<div class="form-group">
            <div class="row">
                <div class="col-md-2">
                  <label for="motivoRetiro">Motivo Retiro</label>
                </div>
                <div class="col-md-2">
                    <select class="form-control select2" id="motivoRetiro" style="width: 100%;">
                      <option ></option>
                      <option >Orden Médica</option>
                      <option >Sospecha Infección</option>
                      <option >Disfunción</option>
                      <option >Otra</option>
                    </select>
                </div> 
                <div class="col-md-2">
                  <label for="otroMotivoRetiro">Otro Motivo</label>
                </div>
                <div class="col-md-2">
                  <textarea type="text" class="form-control" id="otroMotivoRetiro" maxlength="200"></textarea>
                </div> 
                <div class="col-md-2">
                  <label for="cultivo">Cultivo</label>
                </div>
                <div class="col-md-2">
                  <select class="form-control select2" id="cultivo" style="width: 100%;">
                      <option selected>SI</option>
                      <option >NO</option>
                  </select>
                </div> 
            </div> 
          </div>


          <div class="form-group">
            <div class="row">        
                <div class="col-md-2">
                  <label for="reporte">Reporte</label>
                </div>
                <div class="col-md-2">
                    <textarea type="text" class="form-control" id="reporte" maxlength="200"></textarea>
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
                                <button id="botonAgregarCateter" type="button" onclick="AgregarNuevoCateter();" class="btn btn-primary"><img src="<?=BASEURL?>app/img/agregar.png"></img> Agregar</button>
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

//Se almacenara en esta variable el codigo de ingreso o clave primaria
//de la tabla de ingreso para el paciente consultado
var codigoIngresoTabla;

//variables de los campos
var fechaInsercion;
var tipoCateter;
var ubicacionAnatomica;
var lugarProcedimiento;
var medico=null;
var codenfermero=null;
var numeroPunciones;
var fechaRetiro;
var motivoRetiro;
var cultivo;
var reporte;

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
    //Validamos el perfil

    if(perfilUsuario!="ADMINISTRADOR" && perfilUsuario!="ENFERMERIA"){
        $("#botonAgregarCateter").hide();
    }

    //Se capturan las variables de php que
    //contienen los parametros get para la consulta
    var documento=<?=$documento?>;
    var numIngreso=<?=$numIngreso?>;

    //deshabilitamos el campo de otro motivo
    $("#otroMotivoRetiro").prop('disabled',true);

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

            codigoIngresoTabla=v.codigoIngresoTabla; //se obtirne la clave primaria de la tabla 


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
            url: '../ControlCateteres/GetConsultarDatosPaciente',//llamado a metodo
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
function AgregarNuevoCateter(){

    if(ValidarCampos()){
      
      var idCtrlCateteres;

      //validamos el lugar del procedimiento
      if(lugarProcedimiento=='Interno'){
        idCtrlCateteres=GuardarNuevoCateter(codigoIngresoTabla,fechaInsercion,tipoCateter,ubicacionAnatomica,
                                            lugarProcedimiento,medico,codenfermero,numeroPunciones);
      }else{
        //Si es un procedimiento externo el enfermero y medico van vacios
        idCtrlCateteres=GuardarNuevoCateter(codigoIngresoTabla,fechaInsercion,tipoCateter,ubicacionAnatomica,
                                            lugarProcedimiento,null,null,0);
      }

      if(fechaRetiro!=''){
        GuardarRetiroCateter(idCtrlCateteres,codigoIngresoTabla,fechaRetiro,motivoRetiro,cultivo,reporte);
      }

      //se redirecciona la pagina hacia atras en 400.000 milisegundos
      setTimeout(window.history.back(),400000);

    }

}



function GuardarNuevoCateter(codigoIngreso,fechaInsercion,tipoCateter,UbicAnatomica,lugarProcedimiento,medico,enfermero,numPunciones){
  var idCtrlCateter;
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../ControlCateteres/SetAgregarNuevoCateter',//llamado a metodo
        data: { "codIngreso":codigoIngreso,"fechaInsercion":fechaInsercion,"tipoCateter":tipoCateter,"ubicAnatomica":UbicAnatomica,"lugarProcedimiento":lugarProcedimiento,"medico":medico,"enfermero":enfermero,"numPunciones":numPunciones}, //parametros
        success: function(response)
        {   

          idCtrlCateter=response;
          console.log(response);
        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error agregando nuevo catéter (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });

  return idCtrlCateter;

}


function GuardarRetiroCateter(idCateter,codigoIngreso,fechaRetiro,motivo,cultivo,reporte){

  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../ControlCateteres/SetRetirarCateter',//llamado a metodo
        data: { "idCateter":idCateter,"codIngreso":codigoIngreso,"fechaRetiro":fechaRetiro,"motivo":motivo,"cultivo":cultivo,"reporte":reporte}, //parametros
        success: function(response)
        {   
          if(response==1){
              $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Catéter retirado correctamente.',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });

            }else{
              $(document).Toasts('create', {
                  class: 'bg-danger', 
                  title: 'Validación',
                  subtitle: 'Error',
                  body: 'Error retirando el cateter (error llamando consulta).',
                  icon:"fas fa-exclamation-circle",
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
                body: 'Error retirando el cateter (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });


}


//validamos el cambio de el motivo de retiro
$("#motivoRetiro").change(function() {
  //si la opcion no es otra, de debe deshabilitar el campo de otro motivo
  if($("#motivoRetiro").val()!='Otra'){
    $("#otroMotivoRetiro").val("");
    $("#otroMotivoRetiro").prop('disabled',true);
  }else{
    $("#otroMotivoRetiro").prop('disabled',false);
  }
});

//validamos el cambio de el cultivo
$("#cultivo").change(function() {
  //si la opcion es no, de debe deshabilitar el campo de reporte
  if($("#cultivo").val()=='NO'){
    $("#reporte").val("");
    $("#reporte").prop('disabled',true);
  }else{
    $("#reporte").prop('disabled',false);
  }
});

$("#lugarProcedimiento").change(function() {
  //si la opcion es no, de debe deshabilitar el campo de reporte
  if($("#lugarProcedimiento").val()=='Externo'){
    $("#numPunciones").val("");
    $("#medico").val("");
    $("#enfermero").val("");
    $("#numPunciones").prop('disabled',true);
    $("#medico").prop('disabled',true);
    $("#enfermero").prop('disabled',true);
  }else{
    $("#numPunciones").prop('disabled',false);
    $("#medico").prop('disabled',false);
    $("#enfermero").prop('disabled',false);
    $("#numPunciones").val("1");
  }
});


//Funcion encargada de validar los campos del formulario
//validaro los datos que se encuentran allí
function ValidarCampos(){


  
    
  if($("#fechaInsercion").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar fecha de inserción.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#fechaInsercion").focus(); 
        fechaInsercion="";
        return false;
    }else{

            //la fecha de insercion puede ser cualquiera, si se necesita que sea mayor a la de ingreso
            //solo descomente este fragmento de codigo
      /*
            //validamos para que la fecha de insercion no sea antes de la fecha de ingreso
            if($("#fechaInsercion").val()<fechaIngreso){
              $(document).Toasts('create', {
                          class: 'bg-warning', 
                          title: 'Validación',
                          subtitle: 'Mensaje',
                          body: 'La fecha de inserción no puede ser menor a la fecha de ingreso (' + fechaIngreso + ').',
                          icon:"fas fa-exclamation-circle",
                          autohide:true,
                          delay:5000
              });
              $("#fechaInsercion").focus(); 
              return false;
            }
      */
      fechaInsercion=$("#fechaInsercion").val();
    }


    //validamos que la fecha a ingresar en el sistema no sea mayor a la actual
    var fechaActual='<?= date('Y-m-d'); ?>';
    if(fechaInsercion>fechaActual){
      $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'La fecha de inserción no puede ser mayor a la fecha actual.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        return false;
    }

    if($("#tipoCateter").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe seleccionar tipo de catéter.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#tipoCateter").focus(); 
        tipoCateter="";
        return false;
    }else{
      tipoCateter=$("#tipoCateter").val();
    }

    if($("#ubiAnatomica").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe seleccionar la ubicación anatómica.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#ubiAnatomica").focus();
        ubicacionAnatomica=""; 
        return false;
    }else{
      ubicacionAnatomica=$("#ubiAnatomica").val();
    }

    if($("#lugarProcedimiento").val()=='Interno'){

      //validamos que el medico solo se pida cuando sea diferente a LA o a PICC
      if($("#tipoCateter").val()!="LA" && $("#tipoCateter").val()!="PICC"){
        //validamos si el medico esta vacio
        if($("#medico").val()==''){
            $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe seleccionar el médico.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
            });
            $("#medico").focus();
            medico="";
            return false;
        }else{
          medico=$("#medico").val();
        }
      }else{
        medico='';
      }     

        if($("#enfermero").val()==''){
            $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'El campo enfermer@ esta vacio.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
            });
            $("#enfermero").focus(); 
            codenfermero="";
            return false;
        }else{
          codenfermero=$("#enfermero").val();
        }

        lugarProcedimiento=$("#lugarProcedimiento").val();


        //validamos numero de punciones


        if($("#numPunciones").val()==''){
            $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar número de punciones.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
            });
            $("#numPunciones").focus(); 
            return false;
    }else{
        if($("#numPunciones").val()<1){
            $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'El número de punciones debe ser mayor a cero.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
            });
            $("#numPunciones").focus(); 
            numeroPunciones="";
            return false;
        }else{
          numeroPunciones=$("#numPunciones").val();
        }
    }

    }else{
        lugarProcedimiento=$("#lugarProcedimiento").val();
    }

  

    

    if($("#fechaRetiro").val()!=''){

      fechaRetiro=$("#fechaRetiro").val();

        if($("#fechaRetiro").val()<$("#fechaInsercion").val()){
            $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'La fecha de retiro no debe ser menor a la de inserción.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
            });
            $("#fechaRetiro").focus(); 
            return false;
        }



        //validamos que la fecha a ingresar en el sistema no sea mayor a la actual
        var fechaActual='<?= date('Y-m-d'); ?>';
        if(fechaRetiro>fechaActual){
          $(document).Toasts('create', {
              class: 'bg-warning', 
              title: 'Validación',
              subtitle: 'Aviso',
              body: 'La fecha de retiro no puede ser mayor a la fecha actual.',
              icon:"fas fa-exclamation-triangle",
              autohide:true,
              delay:5000
            });
            return false;
        }

        if($("#motivoRetiro").val()==''){
            $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el motivo del retiro.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
            });
            $("#motivoRetiro").focus(); 
            motivoRetiro="";
            return false;
        }else{

          if($("#motivoRetiro").val()=='Otra'){

            if($("#otroMotivoRetiro").val()==''){
              $(document).Toasts('create', {
                      class: 'bg-warning', 
                      title: 'Validación',
                      subtitle: 'Mensaje',
                      body: 'Se debe ingresar otro motivo de retiro.',
                      icon:"fas fa-exclamation-circle",
                      autohide:true,
                      delay:5000
              });
              $("#otroMotivoRetiro").focus(); 
              motivoRetiro="";
              return false;
            }else{
              motivoRetiro=$("#otroMotivoRetiro").val();
            }

          }else{
            motivoRetiro=$("#motivoRetiro").val();
          }
          
        }

        if($("#cultivo").val()==''){
            $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe seleccionar el cultivo.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
            });
            $("#cultivo").focus(); 
            cultivo="";
            return false;
        }else{
          cultivo=$("#cultivo").val();
        }

        if($("#cultivo").val()=='SI'){
          if($("#reporte").val()==''){
            $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el reporte.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
            });
            $("#reporte").focus(); 
            reporte="";
            return false;
          }else{
            reporte=$("#reporte").val();
          }
        }else{
          reporte='';
        }

    }else{
      fechaRetiro="";
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