<?php
session_start();
include("setup/config.php"); // Incluye el archivo de configuración para la conexión a la base de datos

if (isset($_SESSION['usuario']) && isset($_SESSION['tipo']) && $_SESSION['tipo'] == 3)
{

    $tipoTexto = '';

    switch ($_SESSION['tipo']) {
        case 1:
            $tipoTexto = 'Gestor Inmobiliario Free';
            break;
        case 2:
            $tipoTexto = 'Dueño de Inmueble';
            break;
        case 3:
            $tipoTexto = 'Administrador';
            break;
        default:
            $tipoTexto = 'Desconocido';
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/dashboard.css">
    

    <script>
        function enviar(op)
        {
            document.formulario.opoculto.value=op;
            document.formulario.submit();
        }
    </script>
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
                    <span><img src="img/dash.png" alt="Dashboard">  Bienvenido <br><?php echo $_SESSION['usuario']; ?><br><?php echo $tipoTexto; ?></span>
                    </span>
                </div>
                <div class="texto-icono cerrar-sesion">
                    <img src="img/exit.png" alt="Cerrar sesión">
                    <a href="cerrar.php">Cerrar sesión</a>
                </div>
            </div>
        </div>
        <div id="formulario"> 
            <div class="card">
                <div class="card-header"><b>CRUD Gestor Inmobiliario Free</b> </div>
                <div class="card-body">
                    <form action="crudGestor.php" name="formulario" method="post">
                        <div class="campos">
                            <div class="row">
                                <div class="col-sm">Rut</label></div>
                                <div class="col-sm"><input type="rut" class="form-control" id="rut" name="rut"></div>
                                <div class="col-sm">Nombres</div>
                                <div class="col-sm"><input type="nombres" class="form-control" id="nombres" name="nombres"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm">Apellido Paterno</div>
                                <div class="col-sm"><input type="appaterno" class="form-control" id="appaterno" name="appaterno"></div>
                                <div class="col-sm">Apellido Materno</div>
                                <div class="col-sm"><input type="apmaterno" class="form-control" id="apmaterno" name="apmaterno"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm">Correo</label></div>
                                <div class="col-sm"><input type="usuario" class="form-control" id="usuario" name="usuario"></div>
                                <div class="col-sm">Fecha de Nacimiento</div>
                                <div class="col-sm"><input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm">Sexo</div>
                                <div class="col-sm"><input type="sexo" class="form-control" id="sexo" name="sexo"></div>
                                <div class="col-sm">Tipo</div>
                                <div class="col-sm"><input type="Tipo" class="form-control" id="tipo" name="tipo"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm">Telefono</div>
                                <div class="col-sm"><input type="telefono" class="form-control" id="telefono" name="telefono"></div>
                                <div class="col-sm">N° Propiedad</div>
                                <div class="col-sm"><input type="npropiedad" class="form-control" id="npropiedad" name="npropiedad"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm">Contraseña</div>
                                <div class="columa-sm"><input type="password" class="form-control" id="clave" name="clave"></div>

                            </div>
                        </div>
                        
                        <br><center>
                        <button type="button" class="boton-formulario" onclick="enviar(this.value);" value="Ingresar">Ingresar</button>
                        <button type="button" class="boton-formulario" onclick="enviar(this.value);" value="Modificar">Modificar</button>
                        <button type="button" class="boton-formulario" onclick="enviar(this.value);" value="Eliminar">Eliminar</button>
                        <button type="button" class="boton-formulario" onclick="enviar(this.value);" value="Cancelar">Cancelar</button></center>
                        <br>
                        <input type="hidden" name="opoculto">
                    </form>
                </div>
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
                <div class="card-header"> (<b>Total de Usuarios en la BD <?php echo contarusu();?></b>)</div>
                <div class="card-body">
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Usuario</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Teléfono Móvil</th>
                                    <th>N° de propiedad</th>
                                    <th>Sexo</th>
                                    <th>Tipo de usuario</th>
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
                                    <td><?php echo $datos['fechanacimiento'];?></td>
                                    <td><?php echo $datos['telefono'];?></td>
                                    <td><?php echo $datos['npropiedad'];?></td>
                                    <td>
                                        <?php
                                            if($datos['sexo']=='M')
                                            {
                                                echo "Masculino";
                                            }elseif($datos['sexo']=='F')
                                            {
                                                echo "Femenino";
                                            }else{
                                                echo "No especificado";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($datos['tipo']==1)
                                            {
                                                echo "Gestor Inmobiliario Free";
                                            }elseif($datos['tipo']==2)
                                            {
                                                echo "Dueño de Inmueble";
                                            }else{
                                                echo "Administrador";
                                            }
                                        ?>
                                    </td>

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