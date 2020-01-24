<?php
    require 'include/conexion.php';  
    
    $sql = "SELECT id_empleado,usuario, salario, CONCAT(nombre,' ',a_paterno,' ',a_materno) AS nombreC  FROM empleados ;";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $sc = $row['salario'];
            $name = $row['nombreC'];
            $sb = ($sc/30) / 1.3;
            $b1 = $sb * 1.1;
            $b2 = $sb * 1.2;
            $b3 = $sb * 1.3;


            $idata = array();
            $idata[] = $row["id_empleado"];
            $idata[] = $row["salario"];
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