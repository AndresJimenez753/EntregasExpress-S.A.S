<?php
session_start();
//validar la variable de sesión
extract($_REQUEST);
if (!isset($_SESSION['user'])) {
    header("location:../../login.php");
}
include("../../logic/conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM clientes WHERE idCliente=$id";
    $result = mysqli_query($objConexion, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $idCliente = $row['idCliente'];
        $documento = $row['documento'];
        $nombres = $row['nombres'];
        $apellidos = $row['apellidos'];
        $correo = $row['correo'];
        $direccion = $row['direccion'];
        $telefono = $row['telefono'];
        $contraseña = $row['contraseña'];
        $estado = $row['estado'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/estiloHome.css">
    <link rel="stylesheet" href="../../css/estiloGeneral.css">
    <link rel="icon" href="../../assets/php.png">

    <!-- Ionicons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../css/adminlte.min.css">

    <title>EntregasExpress S.A.S</title>
</head>

<body>
    <div class="container-fluid">
        <div id="sidemenu" class="menu-expanded navigation">
            <!-- Header -->
            <div id="header">
                <div id="title"><span>EntregasExpress S.A.S</span></div>
                <div id="menu-btn" onclick="toggleMenu();">
                    <i class="fa fa-bars fa-1x" aria-hidden="true" style="margin-left: 25%;"></i>
                </div>
            </div>

            <!-- Profile -->
            <div id="profile">
                <div id="photo"><img src="../../img/user-admin.png" alt="" width="400px"></div>

                <div id="name" style="font-size: 18px;"><span>
                        Administrador
                    </span></div>
            </div>

            <!-- Items -->
            <div id="menu-items">
                <div class="item">
                    <a href="index.php">
                        <div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                        <div class="title"><span>Home / Dashboard</span></div>
                    </a>
                </div>
                <div class="item separator"></div>
                <div class="item">
                    <a href="clientes.php">
                        <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                        <div class="title"><span>Clientes / Administracion</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="entregas.php">
                        <div class="icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="title"><span>Entregas / Administracion</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="mensajeros.php">
                        <div class="icon"><i class="fa fa-motorcycle" aria-hidden="true"></i></div>
                        <div class="title"><span>Mesajeros / Administracion</span></div>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Items -->

        <div class="main">
            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                <button class="navbar-toggler toggle" type="button" data-toggle="collapse" id="menu-btn" onclick="toggleMenu();" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Dashboard / Home </a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Configuracion
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../../logic/salir.php" style="color:#f00;"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Administrador</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Table -->
            <div class="card">
                <div class="row table-home">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" novalidate>

                        <input required type="text" class="form-control" id="id" name="id" value="<?php echo $idCliente; ?>" hidden="true">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modificar
                                Clientes
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="n-doc"><i class="fa fa-id-card" aria-hidden="true"></i> Numero de
                                        Documento:</label>
                                    <input required type="text" name="doc" id="doc" value="<?php echo $documento; ?>" placeholder="EJ: 1001039201" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="direccion"><i class="fa fa-truck" aria-hidden="true"></i> Direccion de
                                        Residencia:</label>
                                    <input required type="text" name="dir" id="dir" value="<?php echo $direccion; ?>" placeholder="EJ: Cll 132c 134-16 bloq 32 apt 401" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="nombres"><i class="fa fa-user-circle" aria-hidden="true"></i> Nombres:</label>
                                    <input required type="text" name="nom" id="nom" value="<?php echo $nombres; ?>" placeholder="EJ: Cristian Alberto" class="form-control" autofocus>
                                </div>
                                <div class="col-md-6">
                                    <label for="apellidos"><i class="fa fa-user-circle" aria-hidden="true"></i> Apellidos:</label>
                                    <input required type="text" name="ape" id="ape" value="<?php echo $apellidos; ?>" placeholder="EJ: Gomez Tabarez" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="telefono"><i class="fa fa-phone-square" aria-hidden="true"></i> Teléfono:</label>
                                    <input required type="number" name="tel" id="tel" value="<?php echo $telefono; ?>" placeholder="EJ: 3224314903" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Email:</label>
                                    <input required type="email" name="cor" id="cor" value="<?php echo $correo; ?>" placeholder="EJ: andresjimenez@email.com" class="form-control">
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label for="con"><i class="fa fa-key" aria-hidden="true"></i>
                                        Contraseña:</label>
                                    <input required type="password" name="con" id="con" value="<?php echo $contraseña; ?>" placeholder="EJ: ******" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button class="btn btn-primary" type="submit"> Confirmar </button>
                            <a href="clientes.php" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Table -->

    </div>
    </div>

    <script>
        function toggleMenu() {
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');
            toggle.classList.toggle('active');
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
    </script>
    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidemenu');
        btn.addEventListener('click', e => {
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");

            document.querySelector('body').classList.toggle('body-expanded');
        });
    </script>

    <!-- Fonts Bootstrap -->
    <script src="https://use.fontawesome.com/bf85c0e67b.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>


</body>

</html>