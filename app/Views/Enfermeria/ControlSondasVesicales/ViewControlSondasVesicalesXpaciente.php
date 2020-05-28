<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Sonda Vesical por Paciente</title>
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

<!-- DataTables -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
            <h1 class="m-0 text-dark">Control Sondas Vesicales</h1>
            
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary"> 
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
								<label for="tipoDoc">Tipo Doc</label>
                            </div>
                            <div class="col-md-1">
                                <input class="form-control" type="text" value="" id="tipoDoc" disabled>
                            </div> 
							<div class="col-md-1">
                              <label for="documento">Documento</label>
                            </div>
                            <div class="col-md-2">
                              <input class="form-control" type="text" value="" id="documento" disabled>
                            </div>
                            <div class="col-md-1">
                              <label for="paciente">Paciente</label>
                            </div>
                            <div class="col-md-3">
                              <input class="form-control" type="text" value="" id="paciente" disabled>
                            </div>
                            <div class="col-md-1">
                              <label for="numIng">Num Ing.</label>
                            </div>
                            <div class="col-md-1">
                              <input class="form-control" type="text" value="" id="numIng" disabled>
                            </div>							
                        </div> 
                    </div>

                </div>

              </form>
            </div>


            

          </div>
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
        



  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-2">
            <?php if($_SESSION["perfilUsuario"] == "ENFERMERIA" || $_SESSION["perfilUsuario"]=="ADMINISTRADOR"): ?>
              <a href="<?=BASEURL?>ControlSondasVesicales/GetVistaAgregarSondaVesical&documento=<?=$documento;?>&numIngreso=<?=$numIngreso;?>"><button type="button" id="btnNuevaSonda" class="btn btn-block btn-primary"><img src="<?=BASEURL?>app/img/agregar.png"></img> Nueva Sonda</button></a>
            <?php endif; ?>
          </div>
          
          
        </div><!-- /.row -->
        <div class="row mb-2">
          <div class="col-sm-2">
            
                <button type="button" onclick="window.history.back();" class="btn btn-success">Volver</button>
          </div>
 
        </div><!-- /.row -->

      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content-header -->
    
    <br>
    <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado sondas del paciente</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tablaCateteres" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fecha Inserción</th>
                  <th>Num. Sonda</th>
                  <th>Lugar Proc.</th>
                  <th>Enfermer@.</th>
                  <th>Fecha Ret.</th>
                  <th>Cultivo</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody id="contenidoTabla">

                </tbody>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->



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

<!-- DataTables -->
<script src="<?=BASEURL?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=BASEURL?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?=BASEURL?>dist/js/adminlte.min.js"></script>





<script src="<?=BASEURL?>dist/js/adminlte.js"></script>










<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

</script>

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
    //Validamos el perfil

    if(perfilUsuario!="ADMINISTRADOR" && perfilUsuario!="ENFERMERIA"){
        $("#btnNuevaSonda").hide();
    }

    //Se capturan las variables de php que
    //contienen los parametros get para la consulta
    var documento=<?=$documento?>;
    var numIngreso=<?=$numIngreso?>;


    //Llenamos los valores de campos que vienen del get
    $("#documento").val(documento);
    $("#numIng").val(numIngreso);

    //Validamos si los campos del formulario son diferentes de 0
    //ya que si son 0 quiere decir que no mandaron valor por get en url
    if($("#documento").val()!=0 && $("#numIng").val()!=0){

        var datosIngreso=ConsultarDatosPaciente(documento,numIngreso);
        var nombrePacienteCompleto;

        //console.log(datosIngreso);


        //recorremos la repuesta
        $(datosIngreso).each(function(i, v){ // indice, valor
                    
            //Llenamos los campos del formulario con la informacion
            //obtenida por la consulta   

            codigoIngresoTabla=v.codigoIngresoTabla; //se obtirne la clave primaria de la tabla 


            $("#numIng").val(v.numIngreso);  
            $("#tipoDoc").val(v.tipoDoc);  
            $("#documento").val(v.documento);      
            nombrePacienteCompleto=v.primerNombre+' '+v.segundoNombre+' '+v.primerApellido+' '+v.segundoApellido;
            $("#paciente").val(nombrePacienteCompleto);

            //validamos si el estado es cerrado
            if(v.estadoIngreso=='CERRADO'){ 
                $("#btnNuevaSonda").hide();
            }
     
        });

        var datosSondas=ConsultarSondasVesicalesPorIngreso(codigoIngresoTabla);
        //console.log(datosCateter);

        var j=1;
        $(datosSondas).each(function(i, v){

            var boton="";
            //validamos con la fecha de retirp en que estado se encuentra el cateter
            if(v.fechRetiro==null){
                boton="<a href='<?=BASEURL?>ControlSondasVesicales/GetVistaRetirarSonda&codSonda=" + v.codigo + "&codIngreso=" + v.codIngreso + "'><button type='button' class='btn btn-block btn-primary'>Abrir</button></a>";
                v.fechRetiro="N/A";
            }else{
              boton="<a href='<?=BASEURL?>ControlSondasVesicales/GetVistaRetirarSonda&codSonda=" + v.codigo + "&codIngreso=" + v.codIngreso + "'><button type='button' class='btn btn-block btn-success'>Consultar</button></a>";
            }

            if(v.cultivo==null){
                v.cultivo="SIN LLENAR";
            }
            
            if(v.enfermero==null){
              v.enfermero="N/A";
            }

            //Agregamos fila a la tabla
            $('#tablaCateteres').append('<tr><td>' + v.fechInsercion + '</td><td>' + v.numSonda + 
            '</td><td>' + v.lugar + '</td><td>' + v.enfermero +  '</td><td>' + v.fechRetiro +   
            '</td><td>' + v.cultivo + '</td><td>' + boton + '</td></tr>');
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


function ConsultarSondasVesicalesPorIngreso(codigoIngreso){

var datosSondas;
$.ajax({
          type: "POST",
          dataType: 'json',
          async:false,//para que no sea asincrono
          url: '../ControlSondasVesicales/GetConsultarSondasVesicalesPorIngreso',//llamado a metodo
          data: {"numIngreso":codigoIngreso}, //parametros
          success: function(response)
          {   
              

            datosSondas=response

            //console.log(response);
          },
          error: function (error) {
            //mensajes de error
              $(document).Toasts('create', {
                  class: 'bg-danger', 
                  title: 'Validación',
                  subtitle: 'Error',
                  body: 'Error consultando los catéteres del paciente (error llamando consulta).',
                  icon:"fas fa-exclamation-circle",
                  autohide:true,
                  delay:5000
              });  
              console.log(response);
          }
  });

  return datosSondas;

}

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

</script>

</body>
</html>