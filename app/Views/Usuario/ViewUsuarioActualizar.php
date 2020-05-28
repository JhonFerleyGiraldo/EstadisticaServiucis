<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Actualizar Usuario</title>
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
                <h3 class="card-title">Actualizar Usuario</h3>
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
                                <input type="text" class="form-control" id="documento" disabled>
                            </div> 
							<div class="col-md-2">
                            <label for="tipoDoc">Tipo Documento</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="tipoDoc" disabled> 
                            </div>
							<div class="col-md-2">
								<label for="nombres">Nombres</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="nombres" disabled>
                            </div> 							
                        </div> 
                    </div>

					<div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
								<label for="apellidos">Apellidos</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="apellidos" disabled>
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
                                <button id="botonActualizarUsuario" type="button" onclick="ActualizarUsuario();" class="btn btn-primary"><img src="<?=BASEURL?>app/img/refrescar.png"></img> Actualizar</button>
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


//variables del formulario
var documentoUsuario;
var codUsuario;
var clave='';
var confirClave;
var perfil;
var estado;

$(document).ready(function(){

    <?php
        //validamos si las variables vienen vacias
        if($documento==''){
            $documento=0;
        }
    ?>

    var perfilUsuario='<?=$_SESSION["perfilUsuario"]?>';
    //Validamos el perfil

    if(perfilUsuario!="ADMINISTRADOR"){
        $("#botonActualizarUsuario").hide();
    }




    //Se capturan las variables de php que
    //contienen los parametros get para la consulta
    documentoUsuario=<?=$documento?>;

    //Validamos si los campos del formulario son diferentes de 0
    //ya que si son 0 quiere decir que no mandaron valor por get en url
    if(documentoUsuario!=0){

        var datosUsuario=ConsultarDatosUsuario(documentoUsuario);

        //recorremos la repuesta
        $(datosUsuario).each(function(i, v){ // indice, valor
            //Llenamos los campos del formulario con la informacion
            //obtenida por la consulta   
            $("#documento").val(v.documento);       
            $("#tipoDoc").val(v.tipoDoc);  
            $("#nombres").val(v.nombres);
            $("#apellidos").val(v.apellidos);
            $("#usuario").val(v.usuario);
            codUsuario=v.codigo;
            $("#perfil option[value="+ v.codPerfil +"]").attr("selected",true);
            $("#estado option[value="+ v.estado +"]").attr("selected",true);
        });

        listadoSedes=ConsultarSedesXusuario(codUsuario);


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


function ConsultarDatosUsuario(docUsuario){
 
    var datosUsu;
    $.ajax({
           type:"POST",
           dataType: 'json',
           async:false,//para que no sea asincrono
           url: '../Usuario/GetConsultarDatosUsuario',//llamado a metodo
           data:{"documento":docUsuario}, //parametros
           success: function(response)
           {   
                datosUsu=response;

                //console.log(response);
           },
           error: function (error) {
             //mensajes de error
               $(document).Toasts('create', {
                   class: 'bg-danger', 
                   title: 'Validación',
                   subtitle: 'Error',
                   body: 'Error consultando datos del cateter (error llamando consulta).',
                   icon:"fas fa-exclamation-circle",
                   autohide:true,
                   delay:5000
               });  
               console.log(error);
           }
   });

   return datosUsu;

}


function ActualizarUsuario(){

    //validamos campos antes de guardar
    if(ValidarCampos()){
        
        //Actualizamos el usuario
        guardado=GuardarActualizacionUsuario(codUsuario,clave,perfil,estado);

        //activamos las sedes deleccionadas para el usuario
        ActualizarSedes(codUsuario);

        //se redirecciona la pagina hacia atras en 400.000 milisegundos
        setTimeout(window.history.back(),500000);


    }

}



function ActualizarSedes(codUsu){

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
      //alert(codUsu+' '+codSede);
      //actualizamos el estado de las sedes seleccionadas
      ActualizarEstadoSedeUsuario(codUsu,codSede,'S');

  });


  $("input[type=\"checkbox\"]:not(:checked)").each(function () {  
        //recorremos las celdas de la fila donde esta el checkbox seleccionado
        $(this).closest('td').siblings().each(function(i){
          
            //recogemos los dos datos, el codigo y nombre de la sede seleccionada
            if(i==0){
                codSede=$(this).text();
            }else{
                sede=$(this).text();
            } 
            //alert(codUsu+' '+codSede);
            ActualizarEstadoSedeUsuario(codUsu,codSede,'N');
        });      
    });

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

          if(response==1){
            $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Sede ' + codSed + ' actualizada correctamente.',
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
                body: 'Error actualizando sede usuario (error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
    });
}


function ValidarCampos(){

    if($("#clave").val()!=''){

        clave=$("#clave").val();

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

function GuardarActualizacionUsuario(codUsu,pass,perf,est){
    var resultado;
    $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Usuario/SetActualizarUsuario',//llamado a metodo
        data: {"codUsu":codUsu,"pass":pass,"perf":perf,"est":est}, //parametros
        success: function(response)
        {   

            resultado=response;

            if(response==1){
              $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Validación',
                subtitle: 'Aviso',
                body: 'Usuario actualizado correctamente.',
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
                body: 'Error actualizando usuario (error llamando consulta).',
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

function ConsultarSedesXusuario(codUsu){
    var resultado;
    $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Sede/GetListaSedesXusuario',//llamado a metodo
        data: {"codUsu":codUsu}, //parametros
        success: function(response)
        {   
            
            $('#contenidoTabla').text('');
            //recorremos los datos de las sedes del usuario
            $(response).each(function(i, v){
            
                //validmamos si el estado es activo
                if(v.estado=='S'){
                $('#tablaSedes').append('<tr><td>' + v.codigoSede + '</td><td>' +  v.sede + '</td><td class="check"><input type="checkbox" checked/></td></tr>');
                }else{
                $('#tablaSedes').append('<tr><td>' + v.codigoSede + '</td><td>' +  v.sede + '</td><td class="check"><input type="checkbox"/></td></tr>');   
                }
                
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