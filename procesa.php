<?php


include("setup/config.php"); // Incluye el archivo de configuración para la conexión a la base de datos

$sql = "SELECT * FROM usuarios where usuario='".$_POST['usuario']."'and clave='".md5($_POST['password'])."'";
$result = mysqli_query(conectar(), $sql); // Ejecuta la consulta SQL "query"
$datos = mysqli_fetch_array($result); // Obtiene el resultado de la consulta SQL 
$contador= mysqli_num_rows($result); // Cuenta el número de filas devueltas por la consulta SQL

if ($contador!=0) 
{
    session_start(); // Inicia la sesión
    $_SESSION['usuario'] = $datos['nombres']; // Almacena el nombre de usuario en la sesión en una variable

    header("Location: dashboard.php");
} else {
    header("Location: index.html");
}



?>