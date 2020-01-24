 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdnomina";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisar Conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo 'Error de Conexión';
}
?>
