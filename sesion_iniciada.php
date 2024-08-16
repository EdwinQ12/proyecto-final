<?php
session_start();
require_once 'db_conexion.php';
if (!isset($cnnPDO)) {
    echo "error en la conexion con la base de datos.";
    exit;
} 

if(isset($_POST["reservar"])) 
{
    $nombre = $_POST['nombre'] ?? '';
    $invitados = $_POST['invitados'] ?? '';
    $fecha_hora = $_POST['fecha_hora'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
 
    if (!empty($nombre) && !empty($invitados) && !empty($fecha_hora) && !empty($telefono) ) 
    {
        try {
            $sql = $cnnPDO->prepare("INSERT INTO reservacion (nombre, invitados, fecha_hora, telefono ) VALUES (:nombre, :invitados, :fecha_hora, :telefono)");
            $sql->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $sql->bindParam(':invitados', $invitados, PDO::PARAM_STR);
            $sql->bindParam(':fecha_hora', $fecha_hora, PDO::PARAM_STR);
            $sql->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $sql->execute();
            echo '<div class="alert alert-success mt-3" role="alert">Registro guardado exitosamente.</div>';
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger mt-3" role="alert">Error al guardar el registro: ' . $e->getMessage() . '</div>';
        }
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Por favor, completa todos los campos.</div>';
    }
}
// muestra los datos de la tabla
try {
    $stmt = $cnnPDO->query("SELECT nombre, invitados, fecha_hora, telefono FROM reservacion");
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
}
?>
<?php
    $sql = $cnnPDO->prepare("SELECT * FROM us_cafe");
    $sql->execute();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café Chido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet" integrity="" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="sesion_iniciada.php">Café</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="sesion_iniciada.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1">
                            Revisar Reservaciones
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Alimentos y Cafés</a>
                    </li>
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="menul" data-bs-toggle="dropdown" aria-expanded="false">
                            Opciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menul">
                            <li><a class="dropdown-item" href="#">Ayuda</a></li>
                            <li><a class="dropdown-item" href="#">Informes </a></li>
                            <li><a class="dropdown-item" href="login.php">Cerrar sesion</a></li>
                        </ul>
                    </div>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <!--  revisar reservaciones -->
    <div class="modal" id="modal1" tabindex="-1" aria-labelledby="m_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" ia-labelledby="modal1Label">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="m_label">Reservaciones realizadas</h5>
                </div>
                <table class="table">
                    <tr>
                        <th><b>Nombre</b></th>
                        <th><b>Invitados</b></th>
                        <th><b>Fecha y Hora</b></th>
                        <th><b>Teléfono</b></th>
                    </tr>
                    <?php
                    while ($cita = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . $cita['nombre'] . '</td>';
                        echo '<td>' . $cita['invitados'] . '</td>';
                        echo '<td>' . $cita['fecha_hora'] . '</td>';
                        echo '<td>' . $cita['telefono'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="jumbotron jumbotron-fluid text-center bg-light p-5 mb-4">
        <div class="container">
            <h1 class="display-4">Bienvenido a Nuestro Café</h1>
            <p class="lead">Disfruta del mejor café, acompáñalo con nuestros deliciosos alimentos y un buen libro.</p>
            <!-- Botón -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal" >
                Agenda Una Reservación
            </button>
            <!--  agendar reservación -->
            <div class="modal" id="modal" tabindex="-1" aria-labelledby="m_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" ia-labelledby="modal1Label">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="m_label">Agenda Una Reservación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Escribe tu Nombre completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="invitados" class="form-label">Invitados</label>
                                <input type="number" class="form-control" id="invitados" name="invitados" required>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_hora" class="form-label">Fecha y hora</label>
                                <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="reservar" name="reservar">Guardar Reservación</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a href="menu.php" class="btn btn-secondary btn-lg">Ver Menú</a>
        </div>
    </div>

    <!--Servicios-->
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4">
                <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Agendar Cita">
                <h2>Agendar Cita</h2>
                <p>Reserva tu lugar para disfrutar de una experiencia única en nuestro café.</p>
                <p><a class="btn btn-outline-primary" href="#">Reservar &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Comprar Alimentos">
                <h2>Comprar Alimentos</h2>
                <p>Explora nuestro menú y ordena tus alimentos favoritos para llevar.</p>
                <p><a class="btn btn-outline-primary" href="#">Ver Menú &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Comprar Productos">
                <h2>Comprar Productos</h2>
                <p>Adquiere nuestro café exclusivo, tazas y más productos en nuestra tienda.</p>
                <p><a class="btn btn-outline-primary" href="#">Tienda &raquo;</a></p>
            </div>
        </div>
    </div>
    <footer class="text-center py-4">
        <p>&copy; 2024 Café. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
