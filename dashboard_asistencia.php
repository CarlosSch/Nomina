<?php
include 'include/session.php';

if (isset($_SESSION['usuario'])) {
  if ($_SESSION['tipo'] == "Empleado") {
    header("location:dashboard_empleados.php");
  } else {
    if ($_SESSION['tipo'] == "Administrador") {
      header("location:dashboard_admin.php");
    }
  }
} else {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Sistema de control de nómina</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta http-equiv="refresh" content="700; url='include/logout.php'">-->

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="far fa-id-card"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Control de Nómina</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Control
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Nav Item - EMPLOYEES -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-portrait"></i>
          <span>Empleados</span></a>
      </li>

      <!-- Nav Item - AREAS -->
      <li class="nav-item">
        <a class="nav-link" href="dashboard_nomina.php">
          <i class="fas fa-credit-card"></i>  
          <span>Nómina</span></a>
      </li>

      <!-- Nav Item - Calendario -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Asistencias</span></a>
      </li>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Perfil
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Nav Item - Materias -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-user-edit"></i>
          <span>Datos Personales</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notificaciones
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Nueva Notificación</div>
                    <span class="font-weight-bold">Crear una nueva notificación</span>
                  </div>
                </a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombreC']; ?></span>
                <img class="img-profile rounded-circle" src="assets/profile.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" style="text-align: center;">
                  <?php echo $_SESSION['tipo']; ?>
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style="cursor: pointer;">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Registro de Actividad
                </a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" style="cursor: pointer;">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 mt-4 text-gray-800">Control de Asistencias </h1>
          </div>

          <div class="row mr-1">
            <div class="btn-group ml-auto mb-4" role="group" aria-label="Button group with nested dropdown">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#filesmodal"> <i class="fas fa-upload"></i> Subir Excel</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"> Agregar</button>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-4">
              <h5 class="m-0 font-weight-bold text-primary">Listado de Asistencias
              <div class="btn-group float-right mr-1" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Mes
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item text-dark" onclick="test()" name="enero">Enero</a>
                  <a class="dropdown-item text-dark" href="">Febrero</a>
                  <a class="dropdown-item" href="">Marzo</a>
                  <a class="dropdown-item" href="">Abril</a>
                  <a class="dropdown-item" href="">Mayo</a>
                  <a class="dropdown-item" href="">Junio</a>
                  <a class="dropdown-item" href="">Julio</a>
                  <a class="dropdown-item" href="">Agosto</a>
                  <a class="dropdown-item" href="">Septiembre</a>
                  <a class="dropdown-item" href="">Octubre</a>
                  <a class="dropdown-item" href="">Noviembre</a>
                  <a class="dropdown-item" href="">Diciembre</a>
                </div>
              </div>
              </h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id='asistencias' class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nombre Empleado</th>
                      <th>Faltas</th>
                      <th>Permisos</th>
                      <th>Día</th>
                      <th>Hora de Entrada</th>
                      <th>Hora de Salida</th>
                      <th>Entrada Comida</th>
                      <th>Salida Comida</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nombre Empleado</th>
                      <th>Faltas</th>
                      <th>Permisos</th>
                      <th>Día</th>
                      <th>Hora de Entrada</th>
                      <th>Hora de Salida</th>
                      <th>Entrada Comida</th>
                      <th>Salida Comida</th>
                      <th>Acción</th>
                    </tr>
                  </tfoot>

                  <tbody>
                    <tr>
                  <!-----------------------Agregar Asistencias--------------------->
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Añadir Asistencia</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="id_asistencia" value="<?php ?>">
                              <form id= "addData"> 
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Id empleado:</label>
                                  <input type="number" class="form-control" id="recipient-name" name="id" required>
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Fecha:</label>
                                  <input type="date" class="form-control" id="recipient-name" name="fecha" required>
                                </div>

                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Entrada:</label>
                                    <input type="time" step="1" class="form-control" id="recipient-name" name="in" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Salida:</label>
                                    <input type="time" step="1" class="form-control" id="recipient-name" name="out" required >
                                  </div>
                                </div>

                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="recipient-time" class="col-form-label">Entrada Comida:</label>
                                    <input type="time" step="1" class="form-control" id="recipient-name" name="ineat" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Salida Comida:</label>
                                    <input type="time" step="1" class="form-control" id="recipient-name" name="outeat" required>
                                  </div>
                                </div>

                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Faltas:</label>
                                    <input type="number" min="0" max="14" class="form-control" id="recipient-name" value="0" name="faltas" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Permisos:</label>
                                    <input type="number" min="0" max="10" class="form-control" id="recipient-name" value="0" name="permisos" required>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary" onclick="addData()" name="add">Agregar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-----------------------Editar asistencias--------------------->
                      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Editar Asistencia</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="id_asistencia" value="<?php ?>">
                              <form>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                                  <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Fecha:</label>
                                  <input type="date" class="form-control" id="recipient-name">
                                </div>

                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Entrada:</label>
                                    <input type="time" step="0.001" class="form-control" id="recipient-name">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Salida:</label>
                                    <input type="time" step="0.001" class="form-control" id="recipient-name">
                                  </div>
                                </div>

                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="recipient-time" class="col-form-label">Entrada Comida:</label>
                                    <input type="time" step="0.001" class="form-control" id="recipient-name">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Salida Comida:</label>
                                    <input type="time" step="0.001" class="form-control" id="recipient-name">
                                  </div>
                                </div>

                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Faltas:</label>
                                    <input type="number" min="0" max="14" class="form-control" id="recipient-name" value="0">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Permisos:</label>
                                    <input type="number" min="0" max="10" class="form-control" id="recipient-name" value="0">
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="button" class="btn btn-primary">Editar</button>
                            </div>
                          </div>
                        </div>
                      </div>


                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- End of Main Content -->


        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Sistema de Nómina VARFRA 2020</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Excel Files Modal -->
    <div class="modal fade" id="filesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Subir Excel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" id="filesform" enctype="multipart/form-data" role="form">
            <div class="modal-body">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="files" name="files" accept=".csv" required>
                <label class="custom-file-label" for="customFile">Elegir archivo</label>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" onclick="uploadData()" class="btn btn-primary">Subir archivo</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Elimar registro</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body  alert alert-danger m-4">¿Estas seguro de elimniar el registro?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" type="button">Eliminar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Deseas Cerrar tu Sesión?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecciona "Cerrar Sesión" si quieres terminar con tu sesión actual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="include/logout.php">Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </div>

    <script src="js/dtAsistencia.js"> </script>

</body>

</html>