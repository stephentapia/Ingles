<?php

include '../conexion/conn.php';

$ano= $_POST['ano'];
$mes = $_POST['mes'];
$dia = $_POST['dia'];
$pais = $_POST['pais'];
$region = $_POST['region'];
$ciudad = $_POST['ciudad'];
$tipo_actividad = $_POST['tipo_actividad'];
$actividad = $_POST['actividad'];
$institucion = $_POST['institucion'];
$nombre_actividad = $_POST['nombre_actividad'];
$nombre_pcp = $_POST['pcp'];
$autor = $_POST['autor'];
$coautor1 = $_POST['coautor1'];
$coautor2 = $_POST['coautor2'];
$coautor3 = $_POST['coautor3'];
$coautor4 = $_POST['coautor4'];
$organizador = $_POST['organizador'];
$tipo_organizador = $_POST['tipo_organizador'];
$nombre_organizador = $_POST['nombre_organizador'];
$financiamiento_actividad = $_POST['financiamiento_actividad'];
$financiamiento_participacion = $_POST['finaciamiento_participacion'];


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