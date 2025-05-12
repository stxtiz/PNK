<?php
include("setup/config.php");

switch($_POST['opoculto']){
    case "Ingresar": ingresar();
        break;
    case "Modificar": modificar();
        break;
    case "Eliminar": eliminar();
        break;
    case "Cancelar": cancelar();
        break;
}

function ingresar()
{
    $sql="INSERT INTO usuarios ( rut, nombres, ap_paterno, ap_materno, usuario, clave, sexo, estado, npropiedad, telefono, fechanacimiento, tipo) VALUES ( '".$_POST['rut']."', '".$_POST['nombres']."', '".$_POST['appaterno']."', '".$_POST['apmaterno']."', '".$_POST['usuario']."', '".$_POST['clave']."', '".$_POST['sexo']."', '0', '".$_POST['npropiedad']."', '".$_POST['telefono']."', '".$_POST['fechanacimiento']."', '".$_POST['tipo']."')";
    mysqli_query(conectar(),$sql);
    header("Location: dashboard.php");
}

?>