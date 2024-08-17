<?php
require 'db_conexion.php';
session_start();

if (isset($_POST['buscar'])) {
    $producto = $_POST['producto'];
    $query = $cnnPDO->prepare("SELECT * FROM juegos WHERE producto = :producto");
    $query->bindParam(':producto', $producto);

    $query->execute();
    $campo = $query->fetchAll(PDO::FETCH_ASSOC);

    // Guardar resultados en la sesión
    $_SESSION['resultados'] = $campo;

    // Redirigir a la página para mostrar resultados
    header('Location: buscar.php');
    exit();
}

// Obtener los resultados de la sesión si existen
if (isset($_SESSION['resultados'])) {
    $campo = $_SESSION['resultados'];
} else {
    $campo = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="CSSp/mercado.css">
    <link rel="stylesheet" href="CSSp/.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <header class="search-bar">
                <input type="text" placeholder="Buscar juegos..." class="search-input" name="titulo">
                <button type="submit" class="search-button" name="buscar">Buscar</button>
            </header>
        </form>

        <?php
        if (!empty($campo)) {
            foreach ($campo as $row) {
                echo '<div class="card">  
                        <div class="card-body">
                        <img src="data:image/png;base64,' . base64_encode($row['img']) . '" alt="' . htmlspecialchars($row['titulo']) . '" class="card-img">
                        <h3 class="card-title">' . htmlspecialchars($row['titulo']) . '</h3>
                        <p class="card-text">$ ' . htmlspecialchars($row['precio']) . '</p>
                        <p class="card-description">' . htmlspecialchars($row['descripcion']) . '</p>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#gameModal" 
                                data-titulo="' . htmlspecialchars($row['titulo']) . '" 
                                data-precio="' . htmlspecialchars($row['precio']) . '" 
                                data-descripcion="' . htmlspecialchars($row['descripcion']) . '" 
                                data-img="data:image/png;base64,' . base64_encode($row['img']) . '">Ver más</button>
                        </div>
                      </div>';
            }
        } else {
            echo 'No se encontraron resultados.';
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="gameModal" tabindex="-1" role="dialog" aria-labelledby="gameModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="gameModalLabel">Detalles del Juego</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="modal-img" src="" alt="" class="img-fluid">
                        <h3 id="modal-titulo"></h3>
                        <p id="modal-precio"></p>
                        <p id="modal-descripcion"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <a href="carrito.php?add_to_cart=<?php echo urlencode('Título del Juego'); ?>">Añadir al Carrito</a>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $('#gameModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var titulo = button.data('titulo');
        var precio = button.data('precio');
        var descripcion = button.data('descripcion');
        var img = button.data('img');

        var modal = $(this);
        modal.find('#modal-titulo').text(titulo);
        modal.find('#modal-precio').text('$ ' + precio);
        modal.find('#modal-descripcion').text(descripcion);
        modal.find('#modal-img').attr('src', img);
    });
    </script>

</body>

</html>