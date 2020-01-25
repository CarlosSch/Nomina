<?php
    require 'include/conexion.php';  
    
    $sql = "SELECT * FROM nomina;";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $dataN = array();
            $dataN[] = $row["id_asistencias"];
            $dataN[] = $row["fecha"];
            $dataN[] = $row["quincena"];
            $dataN[] = $row["usuarios"];

            $data[] = $dataN;
        
        }
    }else{
        echo "No hay registros";
        echo json_encode(array('error'=>true));
    }
    echo json_encode($data);
?>