<?php
    require 'conexion.php';

    $sql="SELECT * FROM datosA;";
    $result=$conn->query($sql);
    $dataA=array();
    
    if ($result->num_rows>0){

        while($row = $result->fetch_assoc()){

            $dataA[] = array(
                "id_asistencias" => $row['id_asistencias'],
                "nombre" => $row['nombre'],
                "faltas" => $row['faltas'],
                "permisos" => $row['permisos'],
                "fecha" => $row['fecha'],
                "h_entrada" => $row['h_entrada'],
                "h_salida" => $row['h_salida'],
                "in_comida" => $row['in_comida'],
                "out_comida" => $row['out_comida'],
                "accion" => "<a href='#edit' data-toggle='modal'><button type='button' class='btn btn-warning btn-sm'><i class='far fa-edit'></i></button></a>  
                <a href='#delete' data-toggle='modal'><button type='button' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></button></a>"
            );        
  
        }

    }else{
        echo "No hay registros";
        echo json_encode(array('error'=>true));    
        $conn->close();
    }
    
    $results = array(
        "Echo" => 1,
        "TotalRecords" => count($dataA),
        "TotalDisplayRecords" => count($dataA),
        "data"=>$dataA);
        echo json_encode($results);
?>