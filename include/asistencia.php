<?php
    require 'conexion.php';
    $sql="SELECT * FROM datosA;";

    $result=$conn->query($sql);

    if ($result->num_rows>0){

        while($row = $result->fetch_assoc()){

            $dataasi=array();
            $datasi[]=$row['id_asistencias'],
            $datasi[]=$row[''],
            $datasi[]=$row['id_asistencias'],
            $datasi[]=$row['id_asistencias'],
            $datasi[]=$row['id_asistencias'],
            
        



            
        }

    }else {
        echo json_encode(array('error=>true'));
    }

    $conn->close();

?>