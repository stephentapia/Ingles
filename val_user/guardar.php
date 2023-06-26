<?php

include '../conexion/conn.php';

$email= $_POST['email'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$pass = $_POST['pass'];
$region = $_POST['region'];



$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)or die("problemas al conectar al servidor");
$resultado=mysqli_query($conn, "SELECT * FROM difusion WHERE nombre_pcp= '$nombre_pcp' and dia = '$dia' and mes= '$mes' and ano= '$ano'");
 
if (mysqli_num_rows($resultado)>0)
{
 
    echo'<script type="text/javascript"> alert("Fallo el ingresado, porfavor, intentalo nuevamente");
    window.location.href="../difucion.php";</script>';
 
} else {
	
	$insert_value = "INSERT INTO difusion (ano,mes,dia,region,ciudad,tipo_actividad,instituto,nombre_actividad,nombre_pcp,autor,coautor1,coautor2,coautor3,coautor4,organizador,tipo_organizador,nombre_organizador,financiamiento_actividad,financiamiento_participacion) VALUES ('$ano', '$mes', '$dia ','$pais', '$region', '$ciudad', '$tipo_actividad', '$actividad', '$institucion', '$nombre_actividad', '$nombre_pcp', '$autor', '$coautor1', '$coautor2', '$coautor3', '$coautor4', '$organizador', '$tipo_organizador ', '$nombre_organizador', '$financiamiento_actividad', '$financiamiento_participacion ')";
 
    $retry_value = mysqli_query($conn, $insert_value);
 
    if (!$retry_value) {
        echo'<script type="text/javascript"> alert("Fallo el ingresado, porfavor, intentalo nuevamente");
        window.location.href="../difucion.php";</script>';
    }
	
    echo'<script type="text/javascript"> alert("¡¡¡ Ingreso exitoso !!!");
    window.location.href="../difucion.php";</script>';
}
 
mysqli_close($conn);
		
?>