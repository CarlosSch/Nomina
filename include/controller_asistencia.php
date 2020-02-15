<?php
    require "conexion.php";
        
    if(isset($_POST['add'])){
        echo "<script>alert('success');</script>";

    }
        //Funcion Para Agregar Datos del Modal 
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $in = $_POST['in'];
        $out =$_POST['out'];
        $ineat = $_POST['ineat'];
        $outeat = $_POST['outeat'];
        $faltas = $_POST['faltas'];
        $permisos =$_POST['permisos'];

        $sql="INSERT INTO asistencias (faltas,permisos,fecha,h_entrada, h_salida, in_comida, out_comida, id_empleado) VALUES ($faltas,$permisos,'$fecha','$in','$out','$ineat','$outeat', $id);";
    
        if($conn->query($sql)==true){

            echo "Si";

        }
        else{
            echo "no ". $conn->error;
        }
        exit;

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