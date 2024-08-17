<?php
require_once 'db_conexion.php';
session_start();
if (!isset($cnnPDO)) {
    echo "error en la conexion con la base de datos.";
    exit;
} 


if(isset($_POST["registrar"])) 
{
    $nombre = $_POST['nombre'] ?? '';
    $fon_email = $_POST['fon_email'] ?? '';
    $password = $_POST['password'] ?? '';
    $imagen = null;
    $size = getimagesize($_FILES["imagen"]["tmp_name"]);


    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) 
    {
        $cargarImagen = $_FILES['imagen']['tmp_name'];
        $imagen = fopen($cargarImagen, 'rb');
    }
 
    if (!empty($nombre) && !empty($fon_email) && !empty($password)  && $imagen !== null) 
    {
        try {
            $sql = $cnnPDO->prepare("INSERT INTO us_cafe (nombre, fon_email, password, imagen ) VALUES (:nombre, :fon_email, :password, :imagen)");
            $sql->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $sql->bindParam(':fon_email', $fon_email, PDO::PARAM_STR);
            $sql->bindParam(':password', $password, PDO::PARAM_STR);
            $sql->bindParam(':imagen', $imagen, PDO::PARAM_LOB);
            $sql->execute();
            echo '<div class="alert alert-success mt-3" role="alert">Registro guardado exitosamente.</div>';
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger mt-3" role="alert">Error al guardar el registro: ' . $e->getMessage() . '</div>';
        }
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Por favor, completa todos los campos.</div>';
    }
}

try {
    $stmt = $cnnPDO->query("SELECT nombre, fon_email, password, imagen FROM us_cafe");
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
}
?> 

<?php
    if (isset($_POST["entrar"])) {
        $fon_email = $_POST['fon_email'] ?? '';
        $password = $_POST['password'] ?? '';
        
    
        if (!empty($fon_email) && !empty($password)) {

            $sql = $cnnPDO->prepare("SELECT * FROM us_cafe WHERE fon_email = ? AND password = ?");
            $sql->bindParam(':fon_email', $fon_email, PDO::PARAM_STR);
            $sql->execute();
            $user = $sql->fetch(PDO::FETCH_ASSOC);
    
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['fon_email'] = $user['fon_email'];
                $_SESSION['imagen']= $user['imagen'];
                header("Location: sesion_iniciada.php");
                exit();
            } 
            else {
                echo '<div class="alert alert-danger mt-3" role="alert">correo o contraseña incorrectos.</div>';
            }
        } 
    }
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cultura A Tu Paladar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<nav id="navbar" class="navbar bg-body-tertiary px-3 mb-3">
  <a class="navbar-brand" href="#">Cafe</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="#1"> Franquicias </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#2"> Galeria </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#3"> Libros </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#4"> Contactanos </a>
    </li>
    <li>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal2" >
            Iniciar Sesion
        </button>

        <div class="modal fade" id="modal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mod" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="mod">Inicia Sesion Con Tu Cuenta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-control">
                            <form action="sesion_iniciada.php" method="post">
                                <label for="fon_email">Telefono O correo Electronico</label>
                                <input type="text" id="fon_email" name="fon_email" class="form-control" placeholder="Ingrese Su Telefono O correo electronico" required><br>
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" maxlength="6" class="form-control" placeholder="Introduzca Su Contraseña" required><br>
                                <button type="submit" class="btn btn-primary" id="entrar" name="entrar" >Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
  </ul>
</nav>
<div class="co">
    <div class="c">
        <button type="button" class="btnn" data-bs-toggle="modal" data-bs-target="#modal1">
            Crear Una uenta
        </button>
        <div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mod" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="mod">Crea Una Cuenta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-control">
                            <form action="" method="post" enctype="multipart/form-data">
                                <label>Escribe Tu Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required>
                                <label for="contact">Telefono o fon_email Electronico</label>
                                <input type="text" class="form-control" name="fon_email" id="fon_email" placeholder="Ingrese Su Telefono O fon_email Electronico" required><br>
                                <label for="password">Escribe Una Contraseña</label>
                                <input type="password" id="password" name="password" maxlength="6" class="form-control" placeholder="Crea una contraseña" required><br>
                                <div>
                                    <label for="imagen">Selecciona Imagen De Perfil </label>
                                    <input type="file" name="imagen" id="imagen" accept="image/*" >   
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                        Al Crear Una Cuenta, Aceptas Las Condiciones De Uso Y El Aviso De Privacidad 
                                    </li>
                                </ul>
                                <button type="submit" class="btn btn-primary" name="registrar" id="registrar">Crear Cuenta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3 rounded-2" tabindex="0">
    <h1 id="1">Franquicias</h1>
    <h4>Cada Vez Más Cerca De Ti</h4>
    <p>SUCURSAL GRAN PLAZA <br>
    Lunes A Viernes:<br>
    7:00am a 19:00pm hrs<br>
    Sábados Y Domingos:<br>
    7:00am a 15:00pm hrs</p>

    <p>SUCURSAL Plaza Cumbres <br>
    Lunes A Viernes:<br>
    9:00am a 22:00pm hrs<br>
    Sábados Y Domingos:<br>
    8:00am a 17:00pm hrs</p>

    <p>SUCURSAL Plaza La Vega <br>
    Lunes A Sábado:<br>
    8:00am a 20:00pm hrs<br>
    Domingos:<br>
    10:00am a 22:00pm hrs</p>

    <h1 id="2">Galería</h1>
    <div id="carousel" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/imagen5.jpg" class="d-block w-100" alt="Porfavor Carga De Nuevo" height="700">
    </div>
    <div class="carousel-item">
      <img src="images/imagen2.jpg" class="d-block w-100" alt="Porfavor Carga De Nuevo" height="700">
    </div>
    <div class="carousel-item">
      <img src="images/imagen3.jpg" class="d-block w-100" alt="Porfavor Carga De Nuevo" height="900">
    </div>
    <div class="carousel-item">
      <img src="images/imagen1.jpg" class="d-block w-100" alt="Porfavor Carga De Nuevo" height="900">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <h1 id="3">Libros</h1>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  
</div>
    <h4 id="4">Contáctanos</h4>
    <p>...</p>
</div>
</body>
</html>