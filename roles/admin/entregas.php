<?php
session_start();
//validar la variable de sesión
extract($_REQUEST);
if (!isset($_SESSION['user'])) {
    header("location:../../login.php");
}
include("../../logic/conexion.php");

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

                <div id="name" style="font-size: 18px;">
				<span>
						Administrador
					</span></div>
            </div>

           <!-- Items -->
			<div id="menu-items">
				<div class="item">
					<a href="index.php?usu=<?php $usu?>">
						<div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
						<div class="title"><span>Home / Dashboard</span></div>
					</a>
				</div>
				<div class="item separator"></div>
				<div class="item">
					<a href="clientes.php?usu=<?php $usu?>">
						<div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
						<div class="title"><span>Clientes / Administracion</span></div>
					</a>
				</div>
				<div class="item">
					<a href="entregas.php?usu=<?php $usu?>">
						<div class="icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="title"><span>Entregas / Administracion</span></div>
					</a>
				</div>
				<div class="item">
                    <a href="mensajeros.php?usu=<?php $usu?>">
                        <div class="icon"><i class="fa fa-motorcycle" aria-hidden="true"></i></div>
                        <div class="title"><span>Mesajeros / Administracion</span></div>
                    </a>
                </div>
			</div>
		</div>
		<!-- End Items -->

        <div class="main">
            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                <button class="navbar-toggler toggle" type="button" data-toggle="collapse" id="menu-btn"
                    onclick="toggleMenu();" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Dashboard / Home </a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Configuracion
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../logic/salir.php" style="color:#f00;"><i
                                        class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
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
                    <div class="col-md-12">
                        <!-- Large modal -->
                        <div class="d-flex justify-content-between">
                            <div>
                                <h2>Pedidos</h2>
                            </div>
                            <div><button type="button" class="btn btn-primary btn-insert" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                    Registrar Pedido</button></div>

                        </div>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <form action="nuevaEntrega.php?" method="POST" class=" form-sigin needs-validation" novalidate>
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
                                                <input required type="date" name="fecha" id="fecha"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="h-servicio"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    Hora de Servicio:</label>
                                                <input required type="time" name="hora" id="hora"
                                                    class="form-control">
                                                    <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <label for="d-recogida"><i class="fa fa-truck" aria-hidden="true"></i> Direccion de Recogida:</label>
                                                <input required type="text" name="dir" id="dir"
                                                    placeholder="EJ: Cll 132 #136-17 bloq 1 apt 1029" class="form-control" autofocus>
                                                    <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="d-entrega"><i class="fa fa-truck" aria-hidden="true"></i> Direccion de Entrega:</label>
                                                <input required type="text" name="dir2" id="dir2"
                                                    placeholder="EJ: Cll 132 #136-17 bloq 1 apt 1029" class="form-control">
                                                    <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <label for="d-paquete"><i class="fa fa-archive" aria-hidden="true"></i> Decripcion:</label>
                                                <input required type="text" name="desc" id="desc"
                                                    placeholder="EJ: Controlador para Xbox One" class="form-control">
                                                    <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="n-recibe"><i class="fa fa-id-badge" aria-hidden="true"></i>
                                                    Nombre del Cliente:</label>
                                                <input required type="text" name="client" id="client"
                                                    placeholder="EJ: Andres Jimenez" class="form-control">
                                                    <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6 mt-1">
                                                <label for="telf"><i class="fa fa-phone-square"
                                                        aria-hidden="true"></i> Telefono:</label>
                                                <input required type="number" name="tel" id="tel"
                                                    placeholder="EJ: 3224213424" class="form-control">
                                                    <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                            </div>
                                            <div class="col-md-6 mt-1">
                                                <label for="v-pago"><i class="fa fa-money" aria-hidden="true"></i>
                                                    Valor a Pagar:</label>
                                                <input required type="number" name="pago" id="pago"
                                                    placeholder="EJ: 320000" class="form-control">
                                                    <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                            </div>
                                            <div class="col-md-6 mt-1">
                                                <label for="a"><i class="fa fa-money" aria-hidden="true"></i>
                                                    Cliente:</label>
                                                <input required type="number" name="idCliente" id="idCliente"
                                                    placeholder="EJ: idCliente" class="form-control">
                                                    <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                            </div>
                                            <div class="col-md-6 mt-1">
                                                <label for="v-pago"><i class="fa fa-money" aria-hidden="true"></i>
                                                    Mensajero:</label>
                                                <input required type="number" name="mensajero" id="mensajero"
                                                    placeholder="EJ: idMensajero" class="form-control">
                                                    <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                    <label for="validationCustom03" class="form-label" for="nombre"> Estado:</label>
                                                    <select class="form-control" id="est" name="est" aria-label="Default select example">
                                                    <option selected value="En espera">En espera</option>
                                                    <option value="Enviado">Enviado</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Cancelado">Cancelado</option>
                                                </select>
                                                <div class="valid-feedback">
                                                        Campo Aceptado
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Porfavor llene el campo
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button class="btn btn-primary" type="submit"> Guardar </button>
                                        </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <!-- End Modal -->

                        <table id="example" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Fecha y Hora</th>
                                    <th scope="col">Direccion Recogida</th>
                                    <th scope="col">Direccion Entrega</th>
                                    <th scope="col">Descriciopn</th>
                                    <th scope="col">Destinatario</th>
                                    <th scope="col">telefono</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">estado</th>
                                    <th scope="col">Mensajero</th>
                                    <th scope="col">Opciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                $query = "SELECT * FROM `pedidos` WHERE estado != 'Cancelado' ORDER BY estado ASC;";
                                $result_prove = mysqli_query($objConexion, $query);    

                                while($row = mysqli_fetch_assoc($result_prove)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['Fecha'] . "-" . $row['Hora']; ?></td>
                                        <td><?php echo $row['DireccionRecogida']; ?></td>
                                        <td><?php echo $row['DireccionEntrega']; ?></td>
                                        <td><?php echo $row['Descripcion']; ?></td>
                                        <td><?php echo $row['nombreDestinatario']; ?></td>
                                        <td><?php echo $row['telefonoDestinatario']; ?></td>
                                        <td><?php echo $row['valorEnvio']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td><?php echo $row['idEmpleado']; ?></td>
                                        <td>
                                         </div>       <a style="color: green; font-size: 23px;" href="entregasact.php?id=<?php echo $row['id'] ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>    <i class="fa fa-minus" aria-hidden="true"></i>
                                        </div><a style="color: red; font-size: 23px;" href="borrarEntrega.php?id=<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                                        </td>

                    

                    
                    </tr>
                <?php } ?>
                </tbody>
                </table>
                <div class="d-flex justify-content-between">
                            <div>
                                <h3>Pedidos Cancelados</h3>
                            </div>


                        </div>

                <table id="example" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Fecha y Hora</th>
                                    <th scope="col">Direccion Recogida</th>
                                    <th scope="col">Direccion Entrega</th>
                                    <th scope="col">Descriciopn</th>
                                    <th scope="col">Destinatario</th>
                                    <th scope="col">telefono</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">estado</th>
                                    <th scope="col">Mensajero</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                $query = "SELECT * FROM pedidos WHERE estado = 'Cancelado'";
                                $result_prove = mysqli_query($objConexion, $query);    

                                while($row = mysqli_fetch_assoc($result_prove)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['Fecha'] . "-" . $row['Hora']; ?></td>
                                        <td><?php echo $row['DireccionRecogida']; ?></td>
                                        <td><?php echo $row['DireccionEntrega']; ?></td>
                                        <td><?php echo $row['Descripcion']; ?></td>
                                        <td><?php echo $row['nombreDestinatario']; ?></td>
                                        <td><?php echo $row['telefonoDestinatario']; ?></td>
                                        <td><?php echo $row['valorEnvio']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td><?php echo $row['idEmpleado']; ?></td>

                    

                    
                    </tr>
                <?php } ?>
                </tbody>
                </table>
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

      <!-- Validacion BootsTrap -->
      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
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