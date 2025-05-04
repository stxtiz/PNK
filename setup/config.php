<?php


function conectar() 
{
    $con = mysqli_connect("localhost", "root", "", "penka");
    return $con;
}

function contarusu()
{
    $sql = "select * from usuarios";
    $result = mysqli_query(conectar(), $sql); // Ejecuta la consulta SQL "query"
    $contador= mysqli_num_rows($result); // Cuenta el número de filas devueltas por la consulta SQL
    return $contador;
}







?>