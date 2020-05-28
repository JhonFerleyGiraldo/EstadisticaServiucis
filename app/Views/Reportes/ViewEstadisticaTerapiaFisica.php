<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Reporte Terapia Física</title>
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
            <h1 class="m-0 text-dark">Reportes Mensual Estadística Terapia Física</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
      <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary">


            <!-- En este formulario se cargan todos los datos para enviar al reporte como campos ocultos, no se debe quitar los campos ocultos ya que 
                son los que se pasan al pdf, existen unos campos encargados de cargar la imagen del grafico y almacenarla en una ruta temporal para ser rescatada
              desde php y procesar la imagen en el pdf-->
            <form method="POST" action="<?=BASEURL?>Reportes/GetConsultarEstadisticaFisica" name="form" id="form">
            
            
            
            <div class="card-header">
                <h3 class="card-title">Datos Reporte </h3>
              </div>
              <!-- /.card-header -->
          
                <div class="card-body">  
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-1">
                            <label  for="">Sede</label>
                        </div>  
                        <div class="col-md-2">
                            <input type="text" class="form-control"   value="<?= $sede ?>" disabled>
                            <input type="hidden" name="codSede" value="<?= $codSede ?>" id="sede"/>
                            <input type="hidden" class="form-control" name="nomSede"  value="<?= $sede ?>">
                        </div> 
                        <div class="col-md-2">
                            <label for="">Fecha Inicio</label>
                        </div>  
                        <div class="col-md-2">
                            <input type="text" class="form-control"  value="<?= $fechaInicio ?>" disabled>
                            <input type="hidden" class="form-control" name="fechaInicio" id="fechaInicio"  value="<?= $fechaInicio ?>">
                        </div>  
                        <div class="col-md-2">
                            <label for="">Fecha Fin</label>
                        </div>  
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="<?= $fechaFin ?>" disabled>
                            <input type="hidden" class="form-control"  name="fechaFin" id="fechaFin" value="<?= $fechaFin ?>">
                        </div>
                          					
                    </div>
                  </div>
                  <div class="form-group"> 
                        <div class="row">
                            <div class="col-md-4">
                                
                                    <input type="hidden"  name="terapiasVM" id="terapiasVM"/>
                                    <button type="submit" class="btn btn-primary" id="exportarPDF"><img src="<?=BASEURL?>app/img/pdf.png"></img> Exportar a PDF</button>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card -->

            </form>


          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
        <div class="row" >
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Gráficos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                            <!-- Donut chart -->
                            <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                Terapias Ventilación Mecánica
                                </h3>

                                
                            </div>
                            <div class="card-body">
                                <canvas id="terapiasVentilacionMecanica" style="height: 230px;"></canvas>
                            </div>
                            <!-- /.card-body-->
                            </div>
                            <!-- /.card -->
                      </div>    					
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
<!-- FLOT CHARTS -->
<script src="<?=BASEURL?>plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?=BASEURL?>plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?=BASEURL?>plugins/flot-old/jquery.flot.pie.min.js"></script>


<script>

//declaramos variables pra las consultas
var fechaInicio;
var fechaFin;
var sede;


//recuperamos datos del formulario
fechaInicio=$("#fechaInicio").val();
fechaFin=$("#fechaFin").val();
sede=$("#sede").val();


  
//CODIGO GRAFICO 1 TerapiasVentilacionMecanica
var ctx = document.getElementById("terapiasVentilacionMecanica");

ConsultarTerapiasVentilacionMecanica(fechaInicio,fechaFin,sede);

//FIN CODIGO GRAFICO 1 TerapiasVentilacionMecanica


//pasar las imagenenes al formulario y enviar
document.getElementById('form').addEventListener("submit",function(){
    var image = ctx.toDataURL(); // data:image/png....
    $("#terapiasVM").val(image);
},false);


/*
  Funcion encargada de la consulta de terapias con y sin ventilacion mecanica y cargar datos a la grafica
*/
function ConsultarTerapiasVentilacionMecanica(fechaInicio,fechaFin,sede){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Reportes/GetConsultarTerapiasVentilacionMecanica',//llamado a metodo
        data: { "fechaInicio":fechaInicio,"fechaFin":fechaFin,"sede":sede}, //parametros
        success: function(response)
        {   
          //console.log(response);

          var valores = response;
          
          // obtenemos los labels
          var valorLabels = [];
          for (var i = valores.length - 1; i >= 0; i--)  {
            valorLabels[i] = valores[i].vm;
          }

          //ontenemos los valores datos
          var valoresData=[];
          for(var i = valores.length - 1; i >= 0; i--){
            valoresData[i]=valores[i].cantidad;
          }
          
          var data = {
              labels: valorLabels,
              datasets: [{
                  label: 'Terapias Ventilacion Mecanica',
                  data: valoresData,
                  backgroundColor: [
                      'rgba(237, 255, 18, 1)',
                      'rgba(255, 91, 15, 1)'
                  ],
                  borderColor: [
                      'rgba(255,255,255,1)',
                      'rgba(255,255,255,1)',
                  ],
                  borderWidth: 3
              }]
          };
          var options = {
                  scales: {
                      yAxes: [{
                          gridLines: {
                                display:false
                            },
                          ticks: {
                            display:false
                          }
                      }]
                  }
              };

          var chart1 = new Chart(ctx, {
              type: 'doughnut',
              data: data,
              options: options
          });

          var dataURL = ctx.toDataURL('image/png');

        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error consultando ventilación mecánica (error llamando consulta).',
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