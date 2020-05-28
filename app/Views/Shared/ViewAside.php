  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?=BASEURL?>app/img/logoEstadistica.png" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Estadística Mensual</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img  src="<?=BASEURL?>app/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  class="d-block"><?=$_SESSION["nombreUsuario"];?></a>
          <a  class="d-block"><?=$_SESSION["perfilUsuario"];?></a>
          <a  class="d-block"><?=$sedeLogueo?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="<?=BASEURL?>Inicio/Iniciar" class="nav-link active">
            <img src="<?=BASEURL?>app/img/home.png"></img>
              <p>
                Inicio
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=BASEURL?>Paciente/Iniciar" class="nav-link">
            <img src="<?=BASEURL?>app/img/patient.png"></img>
              <p>
                Pacientes
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <img src="<?=BASEURL?>app/img/nurse.png"></img>
              <p>
                Enfermería
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=BASEURL?>ControlCateteres/Iniciar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control Catéteres</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASEURL?>ControlSondasVesicales/Iniciar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control sondas vesicales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASEURL?>RegistroDispositivos/Iniciar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registro dispositivos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <img src="<?=BASEURL?>app/img/doctor.png"></img>
              <p>
                Médico General
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=BASEURL?>Inicio/Iniciar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresos</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="<?=BASEURL?>app/img/lungs.png"></img>
              <p>
                Terapia respiratoria
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estadística</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <img src="<?=BASEURL?>app/img/injury.png"></img>
              <p>
                Terapia Física
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=BASEURL?>EstadisticaTerapiaFisica/Iniciar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estadística</p>
                </a>
              </li>
             
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <img src="<?=BASEURL?>app/img/settings.png"></img>
              <p>
                Configuración
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=BASEURL?>Usuario/GetVistaActualizarPerfil" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mi Perfil</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=BASEURL?>Reportes/Iniciar" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reportes</p>
                  </a>
                </li>
              <?php if($_SESSION["perfilUsuario"]=="ADMINISTRADOR"):?>
                <li class="nav-item">
                  <a href="<?=BASEURL?>Usuario/Iniciar" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>