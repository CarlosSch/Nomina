<?php
require "conexion.php";

if(isset($_POST['update_item'])){
    $id_asistencias =$_POST['id_asistencias'];
    $faltas = $_POST['faltas'];
    $permisos = $_POST['permisos'];
    $dia =$_POST['dia'];
    $h_entrada = $_POST['h_entrada'];
    $h_salida = $_POST['h_salida'];
    $in_comida = $_POST['in_comida'];
    $out_comida = $_POST['out_comida'];
    $id_empleado = $_POST['id_empleado'];
}



?>


