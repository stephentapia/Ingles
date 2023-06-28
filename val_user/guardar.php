<?php

require '../conexion/conn.php';

$email= $_POST['email'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$pass = $_POST['pass'];

$stmt1 = mysqli_prepare($conn, "SELECT * FROM Login WHERE email= ?");
    
mysqli_stmt_bind_param($stmt1, 's', $email);    

mysqli_stmt_execute($stmt1);
var_dump("por aca paso");
var_dump($insert_value1);
var_dump("por aca paso");
$result = mysqli_stmt_get_result($stmt1);

if (mysqli_num_rows($result) > 0)
{
 
    echo'<script type="text/javascript"> alert("Este correo ya esta ingresado");
    window.location.href="../login/registro.html";</script>';
 
} else {

    $stmt = mysqli_prepare($conn, "INSERT INTO Login (email, nombre, apellido, pass) VALUES (?, ?, ?, ?)");
    
    $stmt->bind_param("ssss", $email, $nombre, $apellido, $pass);    

	$stmt->execute();

    
	
    echo'<script type="text/javascript"> alert("¡¡¡ Ingreso exitoso !!!");
    window.location.href="../login/index.html";</script>';
}
 
mysqli_stmt_close($stmt);
mysqli_close($conn);
		
?>