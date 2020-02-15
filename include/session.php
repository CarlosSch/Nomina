<?php
	require('conexion.php');
	session_start();
	
	if(!empty($_POST))
	{
		$user = mysqli_real_escape_string($conn,$_POST['user']);
		$pass = mysqli_real_escape_string($conn,$_POST['pass']);		
		//$sha1_pass = sha1($password);
		
		$sql = "SELECT usuario, pass, tipo, photo, area, CONCAT(nombre,' ',a_paterno,' ',a_materno) AS nombreC FROM datos WHERE usuario = '$user' AND pass = '$pass'";
		$result = $conn->query($sql);
		$rows = $result->num_rows;

		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['usuario']=$row['usuario'];
			$_SESSION['nombreC']=$row['nombreC'];
			$_SESSION['tipo']=$row['tipo'];
			$_SESSION['photo']=$row['photo'];
			$_SESSION['num_emplo'] = $rows;
			echo json_encode(array('error'=>false, 'tipo'=>$row['tipo']));
			} else {
				session_destroy();
                echo json_encode(array('error'=>true));
		}
	}

?>