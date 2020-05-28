<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Nuevo Usuario</title>
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
                <h3 class="card-title">Nuevo Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                            <label for="documento">Documento</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="documento" maxlength="15" >
                            </div> 
							<div class="col-md-2">
                            <label for="tipoDoc">Tipo Documento</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="tipoDoc" style="width: 100%;">
                                    <option ></option>
                                    <option >CC</option>
                                    <option >TI</option>
                                    <option >CE</option>
                                </select>
                            </div>
							<div class="col-md-2">
								<label for="nombres">Nombres</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="nombres" maxlength="30">
                            </div> 							
                        </div> 
                    </div>

					<div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
								<label for="apellidos">Apellidos</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="apellidos" maxlength="30">
                            </div>
							<div class="col-md-2">
								<label for="usuario">Usuario</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="usuario" disabled>
                            </div> 
							<div class="col-md-2">
								<label for="clave">Contraseña</label>
                            </div>
                            <div class="col-md-2">
                                <input type="password" class="form-control" id="clave" maxlength="10">
                            </div>
                        </div> 
                    </div>
				
					<div class="form-group">
                        <div class="row">
                             <div class="col-md-2">
								<label for="claveConfirm">Repetir Contra</label>
                            </div>
                            <div class="col-md-2">
                                <input type="password" class="form-control" id="claveConfirm" maxlength="10" >
                            </div>
							 <div class="col-md-2">
                            <label for="perfil">Perfil</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="perfil" style="width: 100%;">
                                    <option ></option>
                                    <option value="ADM">Administrador</option>
                                    <option value="ENF">Enfermería</option>
                                    <option value="MED">Médico</option>
                                    <option value="TER">Terapia</option>
                                    <option value="TFI">Terapia Física</option>
                                    <option value="TRE">Terapia Respiratoria</option>
                                </select>
                            </div>
							<div class="col-md-2">
								<label for="estado">Estado</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" id="estado" style="width: 100%;">
                                    <option value="" ></option>
                                    <option value="S">Activo</option>
                                    <option value="N">Inactivo</option>
                                </select>
                            </div>
                        </div> 
                    </div>
					
					
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-body p-0">
                                    <table class="table table-sm" id="tablaSedes">
                                    <thead>
                                        <tr>
                                        <th>Cod</th>
                                        <th>Sede</th>
                                        <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenidoTabla">
                                       
                                    </tbody>
                                    </table>
                                </div>
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
                                <button id="botonAgregarUsuario" type="button" onclick="AgregarNuevoUsuario();" class="btn btn-primary"><img src="<?=BASEURL?>app/img/agregar.png"></img> Agregar</button>
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



         
 

  </script>

<script>


//variables de los campos
var documento;
var tipoDoc;
var nombres;
var apellidos;
var codUsuario;
var usuario;
var clave;
var confirClave;
var perfil;
var estado;

//variable para poner todas las sedes de la base de datos
var listadoSedes;

$(document).ready(function(){

    var perfilUsuario='<?=$_SESSION["perfilUsuario"]?>';
    //Validamos el perfil

    if(perfilUsuario!="ADMINISTRADOR"){
        $("#botonAgregarUsuario").hide();
    }

    listadoSedes=ConsultarSedes();
   

});


function AgregarNuevoUsuario(){

    //validamos campos antes de guardar
    if(ValidarCampos()){

        //guardamos el nuevo usuario y nos retorna el codigo insertado
        codUsuario=GuardarNuevoUsuario(documento,tipoDoc,nombres,apellidos,clave,perfil,estado);

        //validamos que el codigo de usuario no quede nulo
        if(codUsuario!=null){
            //validamos que el listado de sedes no sea null
            if(listadoSedes!=null){
                //recorremos todas las sedes de la base de datos
                $(listadoSedes).each(function(i, v){
                    //insertamos cada una de las sedes pero con estado inactivo
                    InsertarSedeUsuario(codUsuario,v.codigo,'N');

                });

                //activamos las sedes deleccionadas para el usuario
                ActivarSedesSeleccionadas(codUsuario);

                $(document).Toasts('create', {
                    class: 'bg-success', 
                    title: 'Validación',
                    subtitle: 'Aviso',
                    body: 'Usuario creado correctamente.',
                    icon:"fas fa-check-circle",
                    autohide:true,
                    delay:5000
                });

                //se redirecciona la pagina hacia atras en 400.000 milisegundos
                setTimeout(window.history.back(),400000);

            }
        }

    }

  
  
}

function ActivarSedesSeleccionadas(codUsu){

    //variables de la tabla
    var codSede;
    var sede;  

    //valirecorremosdamos en el formulario los input type checkbox esta seleccionado
    $("input[type=\"checkbox\"]:checked").each(function(){
        //recorremos las celdas de la fila donde esta el checkbox seleccionado
        $(this).closest('td').siblings().each(function(i){
            //recogemos los dos datos, el codigo y nombre de la sede seleccionada
            if(i==0){
                codSede=$(this).text();
            }else{
                sede=$(this).text();
            }    
        });

        //actualizamos el estado de las sedes seleccionadas
        ActualizarEstadoSedeUsuario(codUsu,codSede,'S');

    });

}

function ValidarCampos(){

    if($("#documento").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el N° de documento.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#documento").focus(); 
        documento="";
        return false;
    }else{
      documento=$("#documento").val();
    }


    if($("#tipoDoc").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe seleccionar el tipo de documento.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#tipoDoc").focus(); 
        tipoDoc="";
        return false;
    }else{
        tipoDoc=$("#tipoDoc").val();
    }

    if($("#nombres").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el nombre.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#nombres").focus(); 
        nombres="";
        return false;
    }else{
        nombres=$("#nombres").val();
    }

    if($("#apellidos").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar el apellido.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#apellidos").focus(); 
        apellidos="";
        return false;
    }else{
        apellidos=$("#apellidos").val();
    }

    if($("#usuario").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'No se pudo encontrar un valor para usuario.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#usuario").focus(); 
        usuario="";
        return false;
    }else{
        usuario=$("#usuario").val();
    }


    if($("#clave").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe ingresar una contraseña.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#clave").focus(); 
        clave="";
        return false;
    }else{
        clave=$("#clave").val();
    }

    if($("#claveConfirm").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe repetir la contraseña.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#claveConfirm").focus(); 
        confirClave="";
        return false;
    }else{
        confirClave=$("#claveConfirm").val();
    }


    //validar que las dos claves sean iguales
    if(!(clave===confirClave)){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Las dos claves no son iguales.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#clave").val('')
        $("#claveConfirm").val('')
        return false;
    }

    if($("#perfil").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe seleccionar el perfil.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#perfil").focus(); 
        perfil="";
        return false;
    }else{
        perfil=$("#perfil").val();
    }

    if($("#estado").val()==''){
        $(document).Toasts('create', {
                    class: 'bg-warning', 
                    title: 'Validación',
                    subtitle: 'Mensaje',
                    body: 'Se debe seleccionar el estado.',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
        });
        $("#estado").focus(); 
        estado="";
        return false;
    }else{
        estado=$("#estado").val();
    }

    return true;

}

$("#documento").blur(function(){
    $("#usuario").val($("#documento").val());
});


function GuardarNuevoUsuario(doc,tip,nom,ape,pass,perf,estado){
    var codUsu;
    $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Usuario/SetNuevoUsuario',//llamado a metodo
        data: {"doc":doc,"tip":tip,"nom":nom,"ape":ape,"pass":pass,"perf":perf,"estado":estado}, //parametros
        success: function(response)
        {   
            codUsu=response;        
            console.log(response);
        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'El usuario no se pudo ingresar, valide si el usuario ya existe en el sistema.',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
            codUsu=null;
        }
        
    });
    return codUsu;
}

function ActualizarEstadoSedeUsuario(codUsu,codSed,estado){
    $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Usuario/SetActualizarEstadoSedeUsuario',//llamado a metodo
        data: {"codUsu":codUsu,"codSed":codSed,"estado":estado}, //parametros
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
                body: 'Error actualizando sede usuario (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
    });
}

function InsertarSedeUsuario(codUsu,codSed,estado){
    $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Usuario/SetInsertarSedeUsuario',//llamado a metodo
        data: {"codUsu":codUsu,"codSed":codSed,"estado":estado}, //parametros
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
                body: 'Error insertando sedes de usuario (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
    });
}

function ConsultarSedes(){
    var resultado;
    $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Sede/GetListaSedes',//llamado a metodo
        data: {}, //parametros
        success: function(response)
        {   
            
              $('#contenidoTabla').text('');
              $(response).each(function(i, v){
               
                  
                  $('#tablaSedes').append('<tr><td>' + v.codigo + '</td><td>' +  v.nombre + '</td><td class="check"><input type="checkbox" /></td></tr>');

              });

              resultado=response;
          //console.log(response);
        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error consultando sedes (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
            listadoSedes=null;
        }
});

return resultado;

}


</script>


</body>
</html>