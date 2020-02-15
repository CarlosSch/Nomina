<?php
    require 'conexion.php';

    $sql = "SELECT id_empleado, correo, photo, area, estado, CONCAT(nombre,' ',a_paterno,' ',a_materno) AS nombreC FROM datos";
    $result = $conn->query($sql);
    $dataE=array();
    
    if ($result->num_rows>0){

        while($row = $result->fetch_assoc()){
            $photo = $row['photo'];

            $dataE[] = array(
                "id_empleado" => $row['id_empleado'],
                "nombre" => "<img src='assets/profiles/$photo' class='img-profile rounded-circle mr-2' width=30>" . $row['nombreC'],
                "area" => $row['area'],
                "correo" => $row['correo'],
                "estado" => $row['estado'],
                "accion" => "
                            <a href='#edit' data-toggle='modal'><button type='button' class='btn btn-warning btn-sm'><i class='far fa-edit'></i></button></a>  
                            <a href='#read' data-toggle='modal'><button type='button' class='btn btn-info btn-sm'><i class='far fa-eye'></i></button></a>
                            <a href='#delete' data-toggle='modal'><button type='button' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></button></a>
                            "
            );        
  
        }

    }else{
        echo "No hay registros";
        echo json_encode(array('error'=>true));    
        exit;
    }
    
    $results = array(
        "Echo" => 1,
        "TotalRecords" => count($dataE),
        "TotalDisplayRecords" => count($dataE),
        "data"=>$dataE);
        echo json_encode($results);
?>