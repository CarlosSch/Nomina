<?php
include 'conexion.php';
    
$filecontent = $_FILES['files'];
$filecontent = file_get_contents($filecontent['tmp_name']);

$filecontent = explode("\n", $filecontent);
$filecontent = array_filter($filecontent);

//Conversión en arrays
foreach ($filecontent as $content){
    $contentList[] = explode(",", $content);
}

//Insertar los datos
foreach ($contentList as $contentData){
    $conn->query("INSERT INTO asistencias (faltas, permisos, fecha, h_entrada, h_salida, in_comida, out_comida, id_empleado) 
                        VALUES 
                        (
                            {$contentData[0]},
                            {$contentData[1]},
                            '{$contentData[2]}',
                            '{$contentData[3]}',
                            '{$contentData[4]}',
                            '{$contentData[5]}',
                            '{$contentData[6]}',
                            {$contentData[7]}
                        )
                ");

}

//print_r($contentList);
$conn->close();
die("Connection closed");
?>