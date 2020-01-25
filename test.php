<?php
    require 'include/conexion.php';  
    
    $sql = "SELECT * FROM datos;";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $idata = array();
            $idata[] = $row["id_asistencias"];
            $idata[] = $row["nombre"];
            $idata[] = $row["nombreC"];
            $idata[] = $row["usuario"];

            $data[] = $idata;
        
        }
    }else{
        echo "No hay registros";
        echo json_encode(array('error'=>true));
    }
    echo json_encode($data);
?>