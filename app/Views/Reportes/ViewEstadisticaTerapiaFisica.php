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
                                <!--En estos campos de formulario se pondran las imagenes de los graficos para ser enviadas al controlador-->
                                    <input type="hidden"  name="terapiasVM" id="terapiasVM"/>
                                    <input type="hidden"  name="InputcambiosPosicion" id="InputcambiosPosicion"/>
                                    <input type="hidden"  name="InputTransferenciaLograda" id="InputTransferenciaLograda"/>
                                    <input type="hidden"  name="InputFuerzaMuscular" id="InputFuerzaMuscular"/>
                                    <input type="hidden"  name="InputPermeInicialyFinal" id="InputPermeInicialyFinal"/>
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
                            Cambios de Posición
                            </h3>   
                          </div>
                          <div class="card-body">
                            <canvas id="cambiosPosicion" style="height: 230px;"></canvas>
                          </div>
                          <!-- /.card-body-->
                        </div>
                        <!-- /.card -->
                      </div> 
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
                    <div class="row">
                      <div class="col-md-6">
                            <!-- Donut chart -->
                            <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                Transferencia Lograda al Alta
                                </h3>

                                
                            </div>
                            <div class="card-body">
                                <canvas id="transferenciaLograda" style="height: 230px;"></canvas>
                            </div>
                            <!-- /.card-body-->
                            </div>
                            <!-- /.card -->
                      </div> 
                      <div class="col-md-6">
                        <!-- Donut chart -->
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Fuerza Muscular al Ingreso y Egreso
                            </h3>   
                          </div>
                          <div class="card-body">
                            <canvas id="fuerzaMuscularIngresoyEgreso" style="height: 230px;"></canvas>
                          </div>
                          <!-- /.card-body-->
                        </div>
                        <!-- /.card -->
                      </div>   					
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <!-- Donut chart -->
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                              Perme Inicial y Perme Final
                            </h3>   
                          </div>
                          <div class="card-body">
                            <canvas id="permeInicialyFinal" style="height: 230px;"></canvas>
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


//recuperamos datos del encabezado
fechaInicio=$("#fechaInicio").val();
fechaFin=$("#fechaFin").val();
sede=$("#sede").val();


  
//CODIGO GRAFICO 1 TerapiasVentilacionMecanica
var ctx1 = document.getElementById("terapiasVentilacionMecanica");

ConsultarTerapiasVentilacionMecanica(fechaInicio,fechaFin,sede);

//FIN CODIGO GRAFICO 1 TerapiasVentilacionMecanica

//CODIGO GRAFICO 2 cambioPosicion
var ctx2 = document.getElementById("cambiosPosicion");

ConsultarCambiosPosicion(fechaInicio,fechaFin,sede);
//FIN CODIGO GRAFICO 2 cambioPosicion

//CODIGO GRAFICO 3 transferenciaLograda
var ctx3 = document.getElementById("transferenciaLograda");

ConsultarTransferenciaLogradaAlta(fechaInicio,fechaFin,sede);
//FIN CODIGO GRAFICO 3 transferenciaLograda

//CODIGO GRAFICO 4 fuerzaMuscularIngresoyEgreso
var ctx4 = document.getElementById("fuerzaMuscularIngresoyEgreso");

ConsultarFuerzaIngresoEgreso(fechaInicio,fechaFin,sede);
//FIN CODIGO GRAFICO 4 fuerzaMuscularIngresoyEgreso

//CODIGO GRAFICO 5 permeInicialyFinal
var ctx5 = document.getElementById("permeInicialyFinal");

ConsultarPermeInicialyFinal(fechaInicio,fechaFin,sede);
//FIN CODIGO GRAFICO 5 permeInicialyFinal


//pasar las imagenenes al formulario y enviar
document.getElementById('form').addEventListener("submit",function(){

  //Cada imagen es igual a uno de los graficos de la pagina
  //enviamos cada grafico a un campo del formulario para luego enviarlo a el controlador

    var image1 = ctx1.toDataURL(); // data:image/png....
    $("#terapiasVM").val(image1);

    var image2= ctx2.toDataURL();
    $("#InputcambiosPosicion").val(image2);

    var image3= ctx3.toDataURL();
    $("#InputTransferenciaLograda").val(image3);

    var image4= ctx4.toDataURL();
    $("#InputFuerzaMuscular").val(image4);
    
    var image5= ctx5.toDataURL();
    $("#InputPermeInicialyFinal").val(image5);

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

          var chart1 = new Chart(ctx1, {
              type: 'doughnut',
              data: data,
              options: options
          });

          var dataURL = ctx1.toDataURL('image/png');

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

/*
  Funcion encargada de la consulta de cambios de posicion de los pacientes
*/
function ConsultarCambiosPosicion(fechaInicio,fechaFin,sede){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Reportes/GetCambiosPosicionXfecha',//llamado a metodo
        data: { "fechaInicio":fechaInicio,"fechaFin":fechaFin,"sede":sede}, //parametros
        success: function(response)
        {   
          //console.log(response);

          var valores = response;
          
          // obtenemos los labels
          var valorLabels = [];
          for (var i = valores.length - 1; i >= 0; i--)  {
            valorLabels[i] = valores[i].transferencia;
          }

          //ontenemos los valores datos
          var valoresData=[];
          for(var i = valores.length - 1; i >= 0; i--){
            valoresData[i]=valores[i].cantidad;
          }
          
          var data = {
              labels: valorLabels,
              datasets: [{
                  label: "Cambios de posición",
                  data: valoresData,
                  backgroundColor: 'rgba(22, 121, 255, 1)',
                  borderColor: 'rgba(22, 121, 255, 1)',
                  borderWidth: 3
              }]
              
          };
          var options = {
                  scales: {
                      yAxes: [{
                          gridLines: {
                                //display:false
                            },
                          ticks: {
                            //display:false
                          }
                      }]
                  }
              };

          var chart2 = new Chart(ctx2, {
              type: 'bar',
              data: data,
              options: options
          });

          var dataURL = ctx2.toDataURL('image/png');

        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error consultando cambios posición(error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });
}


/*
  Funcion encargada de la consultar las transferencias logradas al alta
*/
function ConsultarTransferenciaLogradaAlta(fechaInicio,fechaFin,sede){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Reportes/GetTransferenciasAlAlta',//llamado a metodo
        data: { "fechaInicio":fechaInicio,"fechaFin":fechaFin,"sede":sede}, //parametros
        success: function(response)
        {   
          //console.log(response);

          var valores = response;
          
          // obtenemos los labels
          var valorLabels = [];
          for (var i = valores.length - 1; i >= 0; i--)  {
            valorLabels[i] = valores[i].transferencia;
          }

          //obtenemos los valores datos
          var valoresData=[];
          for(var i = valores.length - 1; i >= 0; i--){
            valoresData[i]=valores[i].cantidad;
          }
          
          var data = {
              labels: valorLabels,
              datasets: [{
                  label: "Transferencia Lograda al alta",
                  data: valoresData,
                  backgroundColor: 'rgba(0, 197, 255, 1)',
                  borderColor: 'rgba(0, 197, 255, 1)',
                  borderWidth: 3
              }]
              
          };
          var options = {
                  scales: {
                      yAxes: [{
                          gridLines: {
                                //display:false
                            },
                          ticks: {
                            //display:false
                          }
                      }]
                  }
              };

          var chart3 = new Chart(ctx3, {
              type: 'bar',
              data: data,
              options: options
          });

          var dataURL = ctx3.toDataURL('image/png');

        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error consultando transferencia lograda al alta(error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });
}


/*
  Funcion encargada de la consultar la fuerza de ingreso y egreso de pacientes
*/
function ConsultarFuerzaIngresoEgreso(fechaInicio,fechaFin,sede){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Reportes/GetConsultarFuerzasIngresoXfechas',//llamado a metodo
        data: { "fechaInicio":fechaInicio,"fechaFin":fechaFin,"sede":sede}, //parametros
        success: function(response)
        {   
          //console.log(response);

          var valoresIngresos = response;

          $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../Reportes/GetConsultarFuerzasEgresoXfechas',//llamado a metodo
            data: { "fechaInicio":fechaInicio,"fechaFin":fechaFin,"sede":sede}, //parametros
            success: function(response)
            {   
              //console.log(response);

              var valoresEgresos = response;
              
              // obtenemos los labels
              var valorLabels = [];
              for (var i = valoresEgresos.length - 1; i >= 0; i--)  {
                valorLabels[i] = valoresEgresos[i].CATEGORIA;
              }

              //ontenemos los valores datos de ingresos
              var valoresIngresosData=[];
              for(var i = valoresIngresos.length - 1; i >= 0; i--){
                valoresIngresosData[i]=valoresIngresos[i].fuerzaTotalIngreso;
              }

              //ontenemos los valores datos de egresos
              var valoresEgresosData=[];
              for(var i = valoresEgresos.length - 1; i >= 0; i--){
                valoresEgresosData[i]=valoresEgresos[i].fuerzaTotalIngreso;
              }
              
              var data = {
                  labels: valorLabels,
                  datasets: [{
                      label: "Fuerza Ingreso",
                      data: valoresIngresosData,
                      backgroundColor: 'rgba(55, 255, 15, 1)',
                      borderColor: 'rgba(55, 255, 15, 1)',
                      borderWidth: 3
                  },
                  {
                      label: "Fuerza Egreso",
                      data: valoresEgresosData,
                      backgroundColor: 'rgba(15, 255  , 179, 1)',
                      borderColor: 'rgba(15, 255  , 179, 1)',
                      borderWidth: 3
                  }]
                  
              };
              var options = {
                      scales: {
                          yAxes: [{
                              gridLines: {
                                    //display:false
                                },
                              ticks: {
                                //display:false
                              }
                          }]
                      }
                  };

              var chart4 = new Chart(ctx4, {
                  type: 'bar',
                  data: data,
                  options: options
              });

              var dataURL = ctx4.toDataURL('image/png');

            },
            error: function (error) {
              //mensajes de error
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error consultando fuerzas de egreso(error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
                console.log(error);
            }
      });

        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error consultando fuerzas de ingreso(error llamando consulta).',
                icon:"fas fa-exclamation-circle",
                autohide:true,
                delay:5000
            });  
            console.log(error);
        }
  });
}



/*
  Funcion encargada de la consultar el perme inicial y final
*/
function ConsultarPermeInicialyFinal(fechaInicio,fechaFin,sede){
  $.ajax({
        type: "POST",
        dataType: 'json',
        async:false,//para que no sea asincrono
        url: '../Reportes/GetPermeInicialXfechas',//llamado a metodo
        data: { "fechaInicio":fechaInicio,"fechaFin":fechaFin,"sede":sede}, //parametros
        success: function(response)
        {   
          //console.log(response);

          var valoresPermeInicial = response;

          $.ajax({
            type: "POST",
            dataType: 'json',
            async:false,//para que no sea asincrono
            url: '../Reportes/GetPermeFinalXfechas',//llamado a metodo
            data: { "fechaInicio":fechaInicio,"fechaFin":fechaFin,"sede":sede}, //parametros
            success: function(response)
            {   
              //console.log(response);

              var valoresPermeFinal = response;
              
              // obtenemos los labels
              var valorLabels = [];
              for (var i = valoresPermeFinal.length - 1; i >= 0; i--)  {
                valorLabels[i] = valoresPermeFinal[i].CATEGORIA;
              }

              //ontenemos los valores datos de perme inicial
              var valoresPermeInicialData=[];
              for(var i = valoresPermeInicial.length - 1; i >= 0; i--){
                valoresPermeInicialData[i]=valoresPermeInicial[i].permeInicial;
              }

              //ontenemos los valores datos de perme final
              var valoresPermeFinalData=[];
              for(var i = valoresPermeFinal.length - 1; i >= 0; i--){
                valoresPermeFinalData[i]=valoresPermeFinal[i].permeFinal;
              }
              
              var data = {
                  labels: valorLabels,
                  datasets: [{
                      label: "Perme Ingreso",
                      data: valoresPermeInicialData,
                      backgroundColor: 'rgba(248, 255, 28, 1)',
                      borderColor: 'rgba(248, 255, 28, 1)',
                      borderWidth: 3
                  },
                  {
                      label: "Perme Egreso",
                      data: valoresPermeFinalData,
                      backgroundColor: 'rgba(34, 118  , 255, 1)',
                      borderColor: 'rgba(34, 118  , 255, 1)',
                      borderWidth: 3
                  }]
                  
              };
              var options = {
                      scales: {
                          yAxes: [{
                              gridLines: {
                                    //display:false
                                },
                              ticks: {
                                //display:false
                              }
                          }]
                      }
                  };

              var chart5 = new Chart(ctx5, {
                  type: 'bar',
                  data: data,
                  options: options
              });

              var dataURL = ctx5.toDataURL('image/png');

            },
            error: function (error) {
              //mensajes de error
                $(document).Toasts('create', {
                    class: 'bg-danger', 
                    title: 'Validación',
                    subtitle: 'Error',
                    body: 'Error consultando perme final(error llamando consulta).',
                    icon:"fas fa-exclamation-circle",
                    autohide:true,
                    delay:5000
                });  
                console.log(error);
            }
      });

        },
        error: function (error) {
          //mensajes de error
            $(document).Toasts('create', {
                class: 'bg-danger', 
                title: 'Validación',
                subtitle: 'Error',
                body: 'Error consultando perme inicial(error llamando consulta).',
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