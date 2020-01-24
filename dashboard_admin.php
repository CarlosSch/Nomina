<?php
include 'include/session.php';
if (isset($_SESSION['usuario'])) {
  if ($_SESSION['tipo'] == "Empleado") {
    header("location:dashboard_empleados.php");
  } else {
    if ($_SESSION['tipo'] == "Contador") {
      header("location:dashboard_contador.php");
    }}
} else {
  header("location:login.php");
}

echo"administrador";
?>