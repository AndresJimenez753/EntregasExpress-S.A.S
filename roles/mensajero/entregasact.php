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
    $query = "SELECT * FROM `pedidos` WHERE id=$id";
    $result = mysqli_query($objConexion, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $fecha = $row['Fecha'];
        $hora = $row['Hora'];
        $dir = $row['DireccionRecogida'];
        $dir2 = $row['DireccionEntrega'];
        $desc = $row['Descripcion'];
        $client = $row['nombreDestinatario'];
        $tel = $row['telefonoDestinatario'];
        $pago = $row['valorEnvio'];
        $idCliente = $row['idCliente'];
        $mensajero = $row['idEmpleado'];
        $est = $row['estado'];
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
                <div id="photo"><img src="../../img/user-mensajero.png" alt="" width="400px"></div>

                <div id="name" style="font-size: 18px;"><span>
                        Repartidor / Mensajero
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
                    <a href="entregas.php">
                        <div class="icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="title"><span>Entregas / Administracion</span></div>
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
                            <a class="nav-link disabled" href="#">Repartidor / Mesajero</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Table -->
            <div class="card">
                <div class="row table-home">
                    <form action="editarEntrega.php?id=<?php echo $_GET['id']; ?>" method="POST" class=" form-sigin" novalidate>
                        <input required type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" hidden="true">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Registro de Pedidos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="f-pedido"><i class="fa fa-calendar" aria-hidden="true"></i>
                                            Fecha de Servicio:</label>
                                        <input required type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="h-servicio"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                            Hora de Servicio:</label>
                                        <input required type="time" name="hora" id="hora" value="<?php echo $hora; ?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label for="d-recogida"><i class="fa fa-truck" aria-hidden="true"></i> Direccion de Recogida:</label>
                                        <input required type="text" name="dir" id="dir" value="<?php echo $dir; ?>" placeholder="EJ: Cll 132 #136-17 bloq 1 apt 1029" class="form-control" autofocus disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="d-entrega"><i class="fa fa-truck" aria-hidden="true"></i> Direccion de Entrega:</label>
                                        <input required type="text" name="dir2" id="dir2" value="<?php echo $dir2; ?>" placeholder="EJ: Cll 132 #136-17 bloq 1 apt 1029" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label for="d-paquete"><i class="fa fa-archive" aria-hidden="true"></i> Decripcion:</label>
                                        <input required type="text" name="desc" id="desc" value="<?php echo $desc; ?>" placeholder="EJ: Controlador para Xbox One" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="n-recibe"><i class="fa fa-id-badge" aria-hidden="true"></i>
                                            Nombre del Cliente:</label>
                                        <input required type="text" name="client" id="client" value="<?php echo $client; ?>" placeholder="EJ: Andres Jimenez" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 mt-1">
                                        <label for="telf"><i class="fa fa-phone-square" aria-hidden="true"></i> Telefono:</label>
                                        <input required type="number" name="tel" id="tel" value="<?php echo $tel; ?>" placeholder="EJ: 3224213424" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="v-pago"><i class="fa fa-money" aria-hidden="true"></i>
                                            Valor a Pagar:</label>
                                        <input required type="number" name="pago" id="pago" value="<?php echo $pago; ?>" placeholder="EJ: 320000" class="form-control" disabled>
                                    </div>

                                    <div class="col-md-6 mt-1">
                                        <label for="a"><i class="fa fa-money" aria-hidden="true"></i>
                                            Cliente:</label>
                                        <input required type="number" disabled name="idCliente" id="idCliente" value="<?php echo $idCliente; ?>" placeholder="EJ: idCliente" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="v-pago"><i class="fa fa-money" aria-hidden="true"></i>
                                            Mensajero:</label>
                                        <input required type="number" name="mensajero" id="mensajero" value="<?php echo $mensajero; ?>" placeholder="EJ: idMensajero" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <label for="validationCustom03" class="form-label" for="nombre"> Estado:</label>
                                        <select class="form-control" id="est" name="est" aria-label="Default select example">
                                            <option selected value="<?php echo $est; ?>"><?php echo $est; ?></option>
                                            <option value="En espera">En espera</option>
                                            <option value="Enviado">Enviado</option>
                                            <option value="Entregado">Entregado</option>
                                            <option value="Cancelado">Cancelado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a href="entregas.php" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                                <button class="btn btn-primary" type="submit"> Confirmar </button>
                            </div>
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