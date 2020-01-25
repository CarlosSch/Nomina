<?php
    require 'conexion.php';
    $sql="SELECT * FROM asistencias;";

    $result=$conn->query($sql);
    $rows=$result->num_rows;

    if ($rows > 0){

    }else {
        echo json_encode(array('error=>true'));
    }

    $conn->close();

?>