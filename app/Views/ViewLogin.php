<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estadística | Ingresar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" type="image/ico" href="<?=BASEURL?>app/img/logoEstadistica.ico" />
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/toastr/toastr.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=BASEURL?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=BASEURL?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body >
  <div class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    
    <img src="app/img/logoEstadistica.png" width="20%">
  </div>
  <!-- /.login-logo -->
  <div class="card" >
    <div class="card-body login-card-body" style="border-radius:100%;">
    <p class="login-box-msg"><b>Estadística mensual</b></p>
      <p class="login-box-msg">Inicie sesión para ingresar</p>
      
      <form action="<?=BASEURL."Login/ValidarLogin";?>" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" onblur="traerSedes()" name="usuario" id="usuario" maxlength="20" placeholder="Usuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tie"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="clave" maxlength="10" placeholder="Clave" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <select class="form-control select2" id="sedes" name="sede" style="width: 100%;" >

          </select>
        </div>
        <div class="row">
          <div class="col-8">
            <!--<div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>-->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="ingresar" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    
    <!-- /.login-card-body -->
  </div>
  
</div>

</div>
<div style="position: absolute;bottom: 0;width: 100%;margin-left:-9%;">
  <!-- AGREGAMOS EL FOOTER-->
  <?php require_once("Shared/ViewFooter.php");?>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=BASEURL?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=BASEURL?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=BASEURL?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=BASEURL?>plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=BASEURL?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=BASEURL?>dist/js/demo.js"></script>
<script language="javascript">
      
//se crea para mostrar ventanas de mensajes al usuario
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

//funcion encargada de cargar las sedes activas del usuario
function traerSedes(){
  //obtenemos el valor del campo usuario
  var usuario=$("#usuario").val();
  //obtenemos el objeto select
  var sedes = $("#sedes");

//declaramos la url de parametro que se va a consultar
  var urlP;

//validamos en PHP si se esta usando una direccion con controlador y accion o vacia,
//si esta vacia solo llamamos el controlador y la accion, pero si se llama el controlador y accion en url
//debemos devolvernos una carpeta
//ruta sin controlador y accion: http://10.10.10.158/UCI/EstadisticaEnfermeria/
//ruta con controlador y accion : http://10.10.10.158/UCI/EstadisticaEnfermeria/Login/Iniciar
  <?php
    if(isset($_GET["controller"]) && isset($_GET["action"])){
      echo "urlP='../Login/GetSedesUsuario';";//asignacion de variable para la consulta ajax
    }else{
      echo "urlP='Login/GetSedesUsuario';";//asignacion de variable para la consulta ajax
    }
  ?>


  //realizamos peticion ajax
    $.ajax({
      type: "POST",
      dataType: 'json',
      url: urlP, //mandamos la url a consultar dependiendo la ruta donde este el usuario
      data: {"usuario":usuario}, //parametros
      //si termina correctamente la peticion
      success: function(response)
      {
        //se inactiva boton ingresar
        $('#ingresar').attr("disabled", true);
        //se remueven las opciones del select
        sedes.find('option').remove();
        //se recorre los resultados de la respuesta
        $(response).each(function(i, v){ // indice, valor
          //se adiciona valor a los select
          sedes.append('<option value="' + v.codigoSede + '">' + v.nombre + '</option>');
        });
        //se valida si existe valores en el select
        if( $('#sedes').val() ) 
        {
          //se activa el boton ingresar
          $('#ingresar').attr("disabled", false);
        }
              //console.log(response);
      },
      error: function (error) {
        $(document).Toasts('create', {
          class: 'bg-danger', 
          title: 'Validación',
          subtitle: 'Error',
          body: 'Error en consulta asincrona.'
        });  
      }
    });
}
</script>
  
</body>
</html>