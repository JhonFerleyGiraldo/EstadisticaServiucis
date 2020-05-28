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
                <h3 class="card-title">Nuevo Registro Dispositivos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                            <label for="fecha">Fecha</label>
                            </div>
                            <div class="col-md-2">
                            <input class="form-control" type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" id="fecha">
                            </div> 
							<div class="col-md-2">
                            <label for="numPacientes">N° Pacientes</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text"  onKeyPress="return soloNumeros(event)"  class="form-control" id="numPacientes" maxlength="2" >
                            </div>
							<div class="col-md-2">
								<label for="cvc">CVC</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" onKeyPress="return soloNumeros(event)"  class="form-control" id="cvc" maxlength="2" >
                            </div> 							
                        </div> 
                    </div>

					<div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
								<label for="sv">SV</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" onKeyPress="return soloNumeros(event)"  class="form-control" id="sv" maxlength="2" >
                            </div>
							<div class="col-md-2">
								<label for="vm">VM</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text"  onKeyPress="return soloNumeros(event)"  class="form-control" id="vm" maxlength="2" >
                            </div> 
							<div class="col-md-2">
								<label for="cvp">CVP</label>
                            </div>
                            <div class="col-md-2">
                            <input type="text" onKeyPress="return soloNumeros(event)"  class="form-control" id="cvp" maxlength="2" >
                            </div>
                        </div> 
                    </div>
				
					<div class="form-group">
                        <div class="row">
                             <div class="col-md-2">
								<label for="enfermero">Enfermer@</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="enfermero" disabled>
                            </div>
                            <div class="col-md-2">
								<label for="sede">Sede</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="sede" disabled>
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
                                <button id="botonAgregarRegistro" type="button" onclick="AgregarNuevoRegistro();" class="btn btn-primary"><img src="<?=BASEURL?>app/img/agregar.png"></img> Agregar</button>
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


var fecha;
var numeroPacientes;
var cvc;
var sv;
var vm;
var cvp;
var codEnfermero;
var enfermero;
var codSede;
var sede;

$(document).ready(function(){

    enfermero='<?=$_SESSION["nombreUsuario"]?>';  
    codEnfermero='<?=$_SESSION["codigoUsuario"]?>';
    codSede='<?=$_SESSION["sede"]?>';
    sede='<?=$sedeLogueo?>';


    $("#enfermero").val(enfermero); 
    $("#sede").val(codSede+' '+sede);

    var perfilUsuario='<?=$_SESSION["perfilUsuario"]?>';
    //Validamos el perfil

    if(perfilUsuario!="ADMINISTRADOR" && perfilUsuario!="ENFERMERIA"){
        $("#botonAgregarRegistro").hide();
    }

});





//Funcion encargada de mandar la informacion a guardar
function AgregarNuevoRegistro(){

    if(ValidarCampos()){
        if(GuardarNuevoRegistro(fecha,numeroPacientes,cvc,sv,vm,cvp,codEnfermero,codSede)==1){
            $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Registro dispositivos guardado correctamente.',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });
        }else{
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error agregando nuevo registro dispositivo (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });
        }

      //se redirecciona la pagina hacia atras en 400.000 milisegundos
      setTimeout(window.history.back(),400000);

    }

}



function GuardarNuevoRegistro(fecha,numPacientes,cvc,sv,vm,cvp,enfermero,sede){
    var guardado;
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../RegistroDispositivos/SetAgregarNuevoRegistroDispositivo',//llamado a metodo
        data: { "fecha":fecha,"numPacientes":numPacientes,"cvc":cvc,"sv":sv,"vm":vm,"cvp":cvp,"enfermero":enfermero,"sede":sede}, //parametros
        success: function(response)
        {   

            guardado=response;
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

  return guardado;

}

function ConsultarUltimoRegistroXsede(sede){
    var resultado;
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../RegistroDispositivos/GetUltimoRegistroDispositivos',//llamado a metodo
        data: {"sede":sede}, //parametros
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
                body: 'Error agregando nuevo catéter (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });

  return resultado;
}


function ValidarFechaInsertar($fechaFormulario){
    var bandera;

    //consultamos el ultimo registro guardado
    //filtramos por la ultima fecha del registro que es la que nos importa
    var ultimoRegistro=ConsultarUltimoRegistroXsede(codSede);
    
    //validamos si el objeto viene vacio es porque va a ser el primer registro en la base de datos
    //entonces no necesitamos validar fechas anteriores
    if(ultimoRegistro.length==0){
      bandera=true;
    }

    //recorremos el resultado
    $(ultimoRegistro).each(function(i, v){

        var ultimaFechaRegistro=moment(v.fecha);
        var fechaInsertar=moment(fecha);

        //encontramos la diferencia de dias de las dos fechas
        var diasDiferencia=fechaInsertar.diff(ultimaFechaRegistro, 'days');
        if(diasDiferencia==0){
            $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'La fecha que intenta ingresar ya existe ( la última fecha de registro es ' + v.fecha + ').',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
            });
            bandera = false;
        }else if(diasDiferencia==1){
            bandera = true;
        }else if(diasDiferencia<0){
            $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'La fecha que intenta ingresar ya existe o es una fecha anterior a la última ( la última fecha de registro es ' + v.fecha + ').',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:7000
            });
            bandera=false
        }else{
            $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'La fecha que intenta ingresar tiene una diferencia de '  + diasDiferencia + 
                        ' días con la fecha del ultimo registro (' + v.fecha + '), recuerde insertar los días consecutivamente.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:7000
            });
            bandera=false;    
        }

    });

    return bandera;
}

//Funcion encargada de validar los campos del formulario
//validaro los datos que se encuentran allí
function ValidarCampos(){
    
  numeroPacientes=parseInt(numeroPacientes);

    if($("#fecha").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe seleccionar fecha del registro.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#fecha").focus(); 
        fecha="";
        return false;
    }else{

        fecha=$("#fecha").val();
        
        //si la validacion de la fecha a insertar es falso devolvemos falso y no guardamos
        if(!ValidarFechaInsertar(fecha)){
            return false;
        }

    } 

    //validamos que la fecha a ingresar en el sistema no sea mayor a la actual
    var fechaActual='<?= date('Y-m-d'); ?>';
    if(fecha>fechaActual){
      $(document).Toasts('create', {
          class: 'bg-warning', 
          title: 'Validación',
          subtitle: 'Aviso',
          body: 'La fecha de registro no puede ser mayor a la fecha actual.',
          icon:"fas fa-exclamation-triangle",
          autohide:true,
          delay:5000
        });
        return false;
  }

    if($("#numPacientes").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el número de pacientes.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#numPacientes").focus(); 
        numeroPacientes="";
        return false;
    }else{
        numeroPacientes=$("#numPacientes").val();
    } 

    
    if($("#cvc").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el número de CVC.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#cvc").focus(); 
        cvc="";
        return false;
    }else{

      cvc=$("#cvc").val();
        if(parseInt(cvc)>numeroPacientes){
          $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Mensaje',
            body: 'La cantidad de CVC no puede ser superior al número de pacientes.',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
          });
          $("#cvc").focus(); 
          return false;
        }
    } 

    if($("#sv").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el número de SV.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#sv").focus(); 
        sv="";
        return false;
    }else{
        sv=$("#sv").val();

        if(parseInt(sv)>numeroPacientes){
          $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Mensaje',
            body: 'La cantidad de SV no puede ser superior al número de pacientes.',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
          });
          $("#sv").focus(); 
          return false;
        }

    } 


    if($("#vm").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el número de VM.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#vm").focus(); 
        vm="";
        return false;
    }else{
        vm=$("#vm").val();

        if(parseInt(vm)>numeroPacientes){
          $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Mensaje',
            body: 'La cantidad de VM no puede ser superior al número de pacientes.',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
          });
          $("#vm").focus(); 
          return false;
        }

    }


    if($("#cvp").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el número de CVP.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#cvp").focus(); 
        cvp="";
        
        return false;
    }else{
        cvp=$("#cvp").val();

        if(parseInt(cvp)>numeroPacientes){
          $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Mensaje',
            body: 'La cantidad de CVP no puede ser superior al número de pacientes.',
            icon:"fas fa-exclamation-circle",
            autohide:true,
            delay:5000
          });
          $("#cvp").focus();
          return false;
        }

    }

    if($("#enfermero").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'No se puede capturar el dato del enfermero.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#enfermero").focus(); 
        enfermero="";
        return false;
    }else{
        enfermero=$("#enfermero").val();
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