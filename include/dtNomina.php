<?php
    require 'conexion.php';  
    
    $sql = "SELECT * FROM nomina;";
    $result = $conn->query($sql);


    $dataN = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $dataN[] = array(
                "id_nomina" => $row['id_nomina'],
                "inicio" => $row['inicio'],
                "cierre" => $row['cierre'],
                "quincena" => $row['quincena'],
                "accion" => "<a href='#watch' data-toggle='modal'><button type='button' class='btn btn-info btn-sm'><i class='far fa-eye'></i></button></a>"
            );        

        }
    }else{
        echo "No hay registros";
        echo json_encode(array('error'=>true));
        $conn -> close();
    }

    $results = array(
        "Echo" => 1,
        "TotalRecords" => count($dataN),
        "TotalDisplayRecords" => count($dataN),
        "data"=>$dataN);

        echo json_encode($results, JSON_PRETTY_PRINT);        
?>