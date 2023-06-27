<?php

include '../conexion/conn.php';

$email= $_POST['email'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$pass = $_POST['pass'];


$stmt1 = mysqli_prepare($conn, "SELECT * FROM login WHERE email= ?");
    
mysqli_stmt_bind_param($stmt1, 's', $email);    

$insert_value1 = mysqli_stmt_execute($stmt1);

$resultado = mysqli_query($conn, $insert_value1);
 
if (mysqli_num_rows($resultado)>0)
{
 
    echo'<script type="text/javascript"> alert("Este correo ya esta ingresado");
    window.location.href="../login/registro.php";</script>';
 
} else {

    $stmt = mysqli_prepare($conn, "INSERT INTO Login (email, nombre, apellido, pass) VALUES (?, ?, ?, ?)");
    
    mysqli_stmt_bind_param($stmt, 'ssss', $email, $nombre, $apellido, $pass);    

	$insert_value = mysqli_stmt_execute($stmt);

    $retry_value = mysqli_query($conn, $insert_value);
 
    if (!$retry_value) {
        echo'<script type="text/javascript"> alert("Fallo el ingresado, porfavor, intentalo nuevamente");
        window.location.href="../login/registro.html";</script>';
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
	
    echo'<script type="text/javascript"> alert("¡¡¡ Ingreso exitoso !!!");
    window.location.href="../login/index.html";</script>';
}
 
mysqli_stmt_close($stmt);
mysqli_close($conn);
		
?>