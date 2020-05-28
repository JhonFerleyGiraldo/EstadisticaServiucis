<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Sincronizar Paciente</title>
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
            <h1 class="m-0 text-dark">Sincronizar usuario nuevo HOSVITAL</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->





        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                            <label for="tipoDoc">Tipo Documento</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control select2" id="tipoDoc" style="width: 100%;">
                                    <option selected="selected">CC</option>
                                    <option>TI</option>
                                    <option>CE</option>
                                    <option>ASI</option> 
                                    <option>NU</option>
                                    <option>PA</option>
                                    <option>PE</option>
                                    <option>RC</option>
                                    <option>MSI</option>
                                </select>
                            </div> 
                        </div> 
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="documento">Documento</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" maxlength="20" class="form-control" id="documento" placeholder="N° Documento">
                            </div> 
                        </div> 
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="numIngreso">N° Ingreso</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="numIngreso" placeholder="N° Ingreso" min="1" max="5" value="1">
                            </div> 
                        </div> 
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombrePaciente">Nombre : </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="nombrePaciente" disabled>
                            </div> 
                        </div> 
                    </div>
<!--
                    <input hidden type="text" class="form-control" id="primerNombre" disabled>
                    <input hidden type="text" class="form-control" id="segundoNombre" disabled>
                    <input hidden type="text" class="form-control" id="primerApellido" disabled>
                    <input hidden type="text" class="form-control" id="segundoApellido" disabled>
-->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fechaIngreso">Fecha Ingreso : </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="fechaIngreso" disabled>
                            </div> 
                        </div> 
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="sedeServicio">Sede Servicio : </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="sedeServicio" disabled>
                            </div> 
                        </div> 
                    </div>

                </div>
    
                <!-- /.card-body -->

                <div class="card-footer">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" onclick="ConsultarIngresoPacienteHosvital();" class="btn btn-success">Consultar</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" onclick="SincronizarPacienteHosvital();" class="btn btn-primary">Sincronizar</button>
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

$(document).ready(function(){

});



/*
  @autor Jhon Giraldo
  funcion encargada de consultar el ingreso del paciente en HOSVITAL  
*/
function ConsultarIngresoPacienteHosvital(){

  //se limpian los campos del formulario
    $('#nombrePaciente').val('');
    $('#fechaIngreso').val('');
    $('#sedeServicio').val('');

    //se obtiene tipo y documento del fomulario
    var tipoDoc=$("#tipoDoc").val();
    var documento = $("#documento").val();

    //se valida si el documento esta vacio
    if(documento==""){
       //se muestra ventana de error al usuario
       $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Advertencia',
            body: 'Campo documento requerido, favor validar.',
            icon:"fas fa-exclamation-triangle",
            autohide:true,
            delay:5000
        });
        $("#documento").focus();
        return false;
    }
    //se obtiene el valor del consecutivo d eingreso
    var numIngreso = $("#numIngreso").val();

    //validamos si el consecutivo esta en el rango comun que es de 1 a 9
    if(numIngreso<1 || numIngreso>10){
        
        $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Advertencia',
            body: 'El valor del campo debe ser de 1 a 9, favor validar.',
            icon:"fas fa-exclamation-triangle",
            autohide:true,
            delay:5000
        });
        $("#numIngreso").focus();
        return false;
    } 

    //INCIO CONSULTA AJAX
    $.ajax({
            type: "POST",
            dataType: 'json',
            url: '../Paciente/GetConsultarPacienteEnHosvital', //llamado a metodo
            data: {"tipoDoc":tipoDoc,"documento":documento,"numIngreso":numIngreso},//parametros
            success: function(response)
            {   
                //recorremos la respuesta de la consulta
                $(response).each(function(i, v){ // indice, valor
                    var nomCompleto=v.primerNombre.trim()+' '+v.segundoNombre.trim()+' '+v.primerApellido.trim()+' '+v.segundoApellido.trim();
                    //llenamos campos del form para que el usuario valide la respuesta
                    $('#nombrePaciente').val(nomCompleto);
                    $('#fechaIngreso').val(v.fechaIngreso);
                    $('#sedeServicio').val(v.codigoSedeIngreso.trim()+' '+v.sedeIngreso.trim());
 
                }); 

                //validamos si la respuesta esta vacia
                if(response==0){
                    $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Aviso',
                        body: 'El paciente no se encuentra en hosvital, favor validar.',
                        icon:"fas fa-exclamation-triangle",
                        autohide:true,
                        delay:5000
                    });
                    //limpiar campos
                    $('#nombrePaciente').val('');
                    $('#fechaIngreso').val('');
                    $('#sedeServicio').val('');
                //mensaje para notificar la finalizacion correcta
                }else{
                    $(document).Toasts('create', {
                        class: 'bg-success', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'Consulta realizada correctamente.',
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
                        body: 'Error en consulta asincrona.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
                    });  
                    console.log(error);
            }
    });
    //FIN CONSULTA AJAX
}


/*
  @autor Jhon Giraldo
  funcion encargada de sincronizar el paciente de hosvital a la base de datos local  
*/
function SincronizarPacienteHosvital(){

  //validamos si los campos de nombre y fecha de ingreso estan vacios
  //ya que si estos estan vacios es porque la consulta no tiene nada
  if($('#nombrePaciente').val()=='' && $('#fechaIngreso').val()=='' && $('#sedeServicio').val()==''){
    //si estos campos no se llenaron es por que no se consulto el paciente
    //o al consultarlo no existe
    $(document).Toasts('create', {
            class: 'bg-warning', 
            title: 'Validación',
            subtitle: 'Advertencia',
            body: 'Consulte el paciente antes de sincronizar, favor validar.',
            icon:"fas fa-exclamation-triangle",
            autohide:true,
            delay:5000
    });
    //nos paramos en num ingreso
    $("#numIngreso").focus();
    return false;
  }

  //declaracion variables para insertar paciente e ingreso
  //recuperamos los 3 primeros del formulario
  var tipoDoc=$("#tipoDoc").val();
  var documento=$("#documento").val();
  var numIngreso=$("#numIngreso").val();

  var numHistoriaClinica;
  var primerNombre;
  var segundoNombre;
  var primerApellido;
  var segundoApellido;
  var fechaNacimiento;
  var genero;
  var fechaIngreso;
  var sedeAtencion;
  var codigoPabellonIngreso;
  var pabellonIngreso
  var pacienteExiste;
  var codigoDx1Ingreso;
  var dx1Ingreso;
  var codigoDx2Ingreso;
  var dx2Ingreso;

//variable para almacenar la respuesta de la consulta de informacion
//para ser enviada a guardar
  var informacionAGuardar;

  $.ajax({
            type: "POST",
            dataType: 'json',
            url: '../Paciente/GetConsultarPacienteEnHosvital',//llamado a metodo
            data: {"tipoDoc":tipoDoc,"documento":documento,"numIngreso":numIngreso}, //parametros
            success: function(response)
            {   
                //validamos si la respuesta llego vacia
                if(response==0){
                  //mensaje al usuario
                    $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Aviso',
                        body: 'El paciente no se encuentra en hosvital, favor validar.',
                        icon:"fas fa-exclamation-triangle",
                        autohide:true,
                        delay:5000
                    });
                    //limpiamos los campos bloqueados
                    $('#nombrePaciente').val('');
                    $('#fechaIngreso').val('');
                    $('#sedeServicio').val('');

                }else{

                  //almacenamos la respuesta en nuestra variable de funcion
                  informacionAGuardar=response;

                  //recorremos la repuesta
                  $(response).each(function(i, v){ // indice, valor
                  //almacenamos datos a variables locales
                    numHistoriaClinica=v.documento;
                    primerNombre=v.primerNombre;
                    segundoNombre=v.segundoNombre;
                    primerApellido=v.primerApellido;
                    segundoApellido=v.segundoApellido;
                    fechaNacimiento=v.fechaNacimiento;
                    genero=v.genero;
                    fechaIngreso=v.fechaIngreso;
                    codigoPabellonIngreso=v.codigoPabellonIngreso;
                    pabellonIngreso=v.pabellonIngreso;
                    codigoSedeIngreso=v.codigoSedeIngreso;
                    sedeAtencion=v.sedeIngreso;
                    codigoDx1Ingreso=v.codDxIng1;
                    dx1Ingreso=v.nomDxIng1;
                    codigoDx2Ingreso=v.codDxIng2;
                    dx2Ingreso=v.nomDxIng2;
                  });

                  //obtenemos la fecha del servidor con php
                  var fechaActual='<?= date("Y-m-d") ?>';

                  //obtenemos las dos fechas a procesar
                  var fechaIngHosvital=moment(fechaIngreso);
                  fechaActual=moment(fechaActual); 


                  //encontramos la diferencia de dias de las dos fechas
                  var diasDiferencia=fechaIngHosvital.diff(fechaActual, 'days');

                  
                  //permitimos que la diferencia entre la fecha d eingreso de hosvital y la fecha
                  //en la que se realiza la sincronizacion sea de 1 dia maximo aproximadamente
                  if(diasDiferencia==0 || diasDiferencia==1){

                    //llamamos la funcion para validar si el paciente existe en la bd local
                    var existePaciente = ValidarSiExistePaciente(tipoDoc,documento);

                   
                    //response: repsuesta que debe ser 0 o 1
                    if(existePaciente){//el paciente ya existe en la base de datos de estadistica
                      $(document).Toasts('create', {
                          class: 'bg-warning', 
                          title: 'Validación',
                          subtitle: 'Aviso',
                          body: 'El paciente ya existe, Validando ingresos.Espere un momento.',
                          icon:"fas fa-exclamation-triangle",
                          autohide:true,
                          delay:5000
                      });
                    

                      //llamamos la funcion que valida si el ingreso consultado ya existe en la base de datos local
                      var existeIngreso=ValidarSiExisteIngresoDePaciente(documento,numIngreso);

                      //validamos y mostramos mensaje si existe el ingreso
                      if(existeIngreso){
                        $(document).Toasts('create', {
                          class: 'bg-warning', 
                          title: 'Validación',
                          subtitle: 'Aviso',
                          body: 'El ingreso N°'+ numIngreso + ' ya existe para el paciente ' + documento +' .Favor validar.',
                          icon:"fas fa-exclamation-triangle",
                          autohide:true,
                          delay:5000
                        });
                      }else{
                        //si el paciente existe pero el ingreso no
                        //llamamos funcion para insertar
                        InsertarNuevoIngreso(informacionAGuardar);
                      }

                    }else{ //el paciente no existe en la base de datos de estadistica
                    //guardamos el paciente el ingreso y la primera estancia
                      InsertarPacienteEIngreso(informacionAGuardar)
                    }
                            
                    //si no es por que ya la fecha que ingreso es muy antigua
                  }else{
                    $(document).Toasts('create', {
                        class: 'bg-warning', 
                        title: 'Validación',
                        subtitle: 'Mensaje',
                        body: 'El ingreso que desea registrar tiene una diferencia de ' + diasDiferencia + ' días con respecto a la fecha actual. Recuerde que solo cuenta con 24H aproximadamente para la sincronización de cada ingreso.',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
                    });
                  }

                  
                }     
                
              //console.log(response);
            },
            error: function (error) {
              //mensajes de error
                $(document).Toasts('create', {
                        class: 'bg-danger', 
                        title: 'Validación',
                        subtitle: 'Error',
                        body: 'Error sincronizando usuario (Error en el llamado a la consulta).',
                        icon:"fas fa-exclamation-circle",
                        autohide:true,
                        delay:5000
                    });  
            }
    });
  

}

/*
  @autor Jhon Giraldo
  funcion encargada de validar si el ingreso del paciente existe
*/
function ValidarSiExisteIngresoDePaciente(documento,numIngreso){
  //variable de funcion para la respuesta
  var validar="";                 
    $.ajax({
      type: "POST",
      dataType: 'json',
      async:false,//para que no sea asincrono
      url: '../Paciente/GetValidarSiExisteIngresoDePaciente',//llamado a metodo
      data: {"documento":documento,"numIngreso":numIngreso},//parametros
      success: function(response)
      {           
          //recibimos la respuesta en la variable
            validar=response;
      },
      error: function (error) {
        $(document).Toasts('create', {
                  class: 'bg-danger', 
                  title: 'Validación',
                  subtitle: 'Error',
                  body: 'Error validando si ingreso de paciente existe (Error en el llamado a la consulta).',
                  icon:"fas fa-exclamation-circle",
                  autohide:true,
                  delay:5000
              });  
      }
    });

    return validar;
}

/*
  @autor Jhon Giraldo
  funcion encargada de validar si el paciente existe
*/
function ValidarSiExistePaciente(tipoDoc,documento){
  //variable de funcion para la respuesta
  var validar="";                 
    $.ajax({
      type: "POST",
      dataType: 'json',
      async:false,//para que no sea asincrono
      url: '../Paciente/GetValidarSiExistePaciente',//llamado a metodo
      data: {"tipoDoc":tipoDoc,"documento":documento},//parametros
      success: function(response)
      {           
        //recibimos la respuesta en la variable
            validar=response;
      },
      error: function (error) {
        $(document).Toasts('create', {
                  class: 'bg-danger', 
                  title: 'Validación',
                  subtitle: 'Error',
                  body: 'Error validando si paciente existe (Error en el llamado a la consulta).',
                  icon:"fas fa-exclamation-circle",
                  autohide:true,
                  delay:5000
              });  
      }
    });
    return validar;
}

/*
  @autor Jhon Giraldo
  funcion encargada de insertar nuevo ingreso
*/
function InsertarNuevoIngreso(informacionAGuardar){ 

    $.ajax({
      type: "POST",
      dataType: 'json',
      async:false,//para que no sea asincrono
      url: '../Paciente/SetInsertarNuevoIngreso',//llamado metodo
      data: {"datosAGuardar":informacionAGuardar},//parametros
      success: function(response)
      {           
        //bandera para saber si si se redirecciona o no
        var redireccionar=false;

            //se valida si se guardo el ingreso con esta clave devuelta por la consulta
            if(response.guardadoIngreso){
              $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Ingreso creado correctamente',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });
              redireccionar=true;
            }else{
              $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error al insertar el ingreso (Error en el llamado a la consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
              });
              redireccionar=false;
            }
            
            //se valida si se guardo la estancia con esta clave devuelta por la consulta
            if(response.guardadoEstancia){
              $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Estancia creada correctamente',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });
              redireccionar=true;
            }else{
              $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error al insertar la estancia (Error en el llamado a la consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
              });
              redireccionar=false;
            }

            //se valida si la variable quedo true se finalizo bien y se puede redireccionar
            if(redireccionar){
              //se redirecciona la pagina hacia atras en 40.000 milisegundos
              setTimeout(window.history.back(),40000);
            }

      },
      error: function (error) {
        //mensajes de error
        $(document).Toasts('create', {
                  class: 'bg-danger', 
                  title: 'Validación',
                  subtitle: 'Error',
                  body: 'Error validando si paciente existe (Error en el llamado a la consulta).',
                  icon:"fas fa-exclamation-circle",
                  autohide:true,
                  delay:5000
              });  
      }
    });
}

/*
  @autor Jhon Giraldo
  funcion encargada de insertar nuevo paciente e ingreso
*/
function InsertarPacienteEIngreso(informacionAGuardar){
  $.ajax({
    type: "POST",
    dataType: 'json',
    async:false,//para que no sea asincrono
    url: '../Paciente/SetInsertarPacienteEIngresoNuevo',//llamado a metodo
    data: {"datosAGuardar":informacionAGuardar},//parametros
    success: function(response)
    {   
      //bandera para saber si si se redirecciona o no
      var redireccionar=false;

            //se valida si se guardo el paciente con esta clave devuelta por la consulta
            if(response.guardadoPaciente){
              $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Paciente creado correctamente',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });

              redireccionar=true;
            }else{
              $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error al insertar el paciente (Error en el llamado a la consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
              });
              redireccionar=false;
            }

            //se valida si se guardo el ingreso con esta clave devuelta por la consulta
            if(response.guardadoIngreso){
              $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Ingreso creado correctamente',
                icon:"fas fa-check-circle",
                autohide:true,
                delay:5000
              });
              redireccionar=true;
            }else{
              $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error al insertar el ingreso (Error en el llamado a la consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
              });
              redireccionar=false;
            }
            
            //se valida si la bandera quedo en true todo termino bien y se puede redireccionar
            if(redireccionar){
              //se redirecciona la pagina hacia atras en 40.000 milisegundos
              setTimeout(window.history.back(),40000);
            }

      //console.log(response);
    },
    error: function (error) {
      //mensajes de error
      $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error ingresando paciente nuevo (Error en el llamado a la consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });
      console.log(error);
    }
  });
}



</script>

</body>
</html>