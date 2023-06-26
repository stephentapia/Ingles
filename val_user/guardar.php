<?php

include '../conexion/conn.php';

$email= $_POST['email'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$pass = $_POST['pass'];




$resultado=mysqli_query($conn, "SELECT * FROM login WHERE email= '$email'");
 
if (mysqli_num_rows($resultado)>0)
{
 
    echo'<script type="text/javascript"> alert("Fallo el ingresado, porfavor, intentalo nuevamente");
    window.location.href="../login/registro.php";</script>';
 
} else {

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
	
	$insert_value = "INSERT INTO login (email, nombre, apellido, pass) VALUES ('$ano', '$mes', '$dia ','$pais')";
    mysqli_stmt_execute($stmt);
    $retry_value = mysqli_query($conn, $insert_value);
 
    if (!$retry_value) {
        echo'<script type="text/javascript"> alert("Fallo el ingresado, porfavor, intentalo nuevamente");
        window.location.href="../login/registro.php";</script>';
    }
	
    echo'<script type="text/javascript"> alert("¡¡¡ Ingreso exitoso !!!");
    window.location.href="../login/registro.php";</script>';
}
 
mysqli_close($conn);
		
?>