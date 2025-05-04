<?php
session_start();
include("setup/config.php"); // Incluye el archivo de configuración para la conexión a la base de datos

if(isset($_SESSION['usuario']))
{

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <header class="header">
        <div class="header-izquierda">
            <img src="img/Logo.png" alt="Logo PNK" class="logo">
            <div class="titulo">PNK INMOBILIARIA</div>
        </div>
    </header>

    <main class="main">
        <div class="dashboard">
            <div class="contenido-dashboard">
                <div class="texto-icono">
                    <span><img src="img/dash.png" alt="Dashboard">  Bienvenido <br><?php echo $_SESSION['usuario']; ?>
                    </span>
                </div>
                <div class="texto-icono cerrar-sesion">
                    <img src="img/exit.png" alt="Cerrar sesión">
                    <a href="cerrar.php">Cerrar sesión</a>
                </div>
            </div>
            <div id="formulario"> 
                // avanzar en clases

            </div>
        </div>
        <div class="botones-panel">
            <a href= "mantenedor-u.html" class="boton-icono">
                <img src="img/usuario.png" alt="Usuarios">
                <span>Mantenedor Usuarios</span>
            </a>
            <a href="mantenedor-p.html" class="boton-icono">
                <img src="img/iccasa.png" alt="Propiedades">
                <span>Mantenedor Propiedades</span>
            </a>
        </div>
        <br>
        <div id="mostrarusuarios">
            <div class="card">
                <div class="card-header">Lista de los Usuarios (<b>Total de Usuarios en la BD (<?php echo contarusu();?>) </b>)</div>
                <div class="card-body">
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "select * from usuarios";
                                $result = mysqli_query(conectar(), $sql); // Ejecuta la consulta SQL "query"
                                while($datos=mysqli_fetch_array($result))
                                {
                            ?>
                                <tr>
                                    <td><?php echo $datos['rut'];?></td>
                                    <td><?php echo $datos['nombres'];?></td>
                                    <td><?php echo $datos['ap_paterno']." ".$datos['ap_materno'];?></td>
                                    <td><?php echo $datos['usuario'];?></td>
                                    <td>
                                            <?php
                                            if($datos['estado']==1)
                                            {
                                            ?>
                                                <img src="img/check.png" width="16px">
                                            <?php
                                            }else{
                                            ?>
                                                <img src="img/ina.png" width="16px">
                                            <?php    
                                            }
                                            ?>
                                    </td>
                                    <td><img src="img/update.png" width="16px">|<img src="img/borrar.png" width="16px"></td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<?php
}else{
    header("Location: error.html");
}
?>