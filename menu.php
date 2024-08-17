<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del Café</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body style="background-color: antiquewhite;">
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
                <form class="form-inline ml-auto" id="searchForm" method="post" action="busqueda.php">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Buscar productos" aria-label="Buscar" id="searchInput">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>

            </div>
        </div>
    </nav>
    <div class="container my-4" >
        <h1 class="text-center mb-4">Menú del Café</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/expresso.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" >Café Espresso</h5>
                        <p class="card-text">Un espresso intenso y aromático.</p>
                        <p class="card-text" id="76" name="76"><strong>$76.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Americano.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe2" name="cafe2">Café Americano</h5>
                        <p class="card-text">Café diluido con agua caliente para un sabor más suave.</p>
                        <p class="card-text"id="76" name="76"><strong>$76.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/latte.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe3" name="cafe3">Café Latte</h5>
                        <p class="card-text">Café con leche vaporizada y una fina capa de espuma.</p>
                        <p class="card-text" id="88" name="88"><strong>$88.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/capuchino.jpg" class="card-img-top" alt="C" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe4" name="cafe4">Café Cappuccino</h5>
                        <p class="card-text">Café con una mezcla equilibrada de leche y espuma.</p>
                        <p class="card-text" id="98" name="98"><strong>$98.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/mocha.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe5" name="cafe5">Café Mocha</h5>
                        <p class="card-text">Café con chocolate y crema batida.</p>
                        <p class="card-text"id="116" name="116"><strong>$116.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/cortado.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe6" name="cafe6">Café Cortado</h5>
                        <p class="card-text">Un espresso con un toque de leche.</p>
                        <p class="card-text" id="106" name="106"><strong>$106.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/ristretto.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe7" name="cafe7">Café Ristretto</h5>
                        <p class="card-text">Un espresso más corto y concentrado.</p>
                        <p class="card-text" id="85" name="85"><strong>$85.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Affogato.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe8" name="cafe8">Café Affogato</h5>
                        <p class="card-text">Café espresso servido con una bola de helado.</p>
                        <p class="card-text" id="94" name="94"><strong>$94.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/irish.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe9" name="cafe9">Café Irish</h5>
                        <p class="card-text">Café con un toque de whisky y crema.</p>
                        <p class="card-text" id="104" name="104"><strong>$104.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/vienes.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe10" name="cafe10">Café Vienés</h5>
                        <p class="card-text">Café con crema y chocolate rallado.</p>
                        <p class="card-text" id="91" name="91"><strong>$91.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Conleche.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe11" name="cafe11">Café con Leche</h5>
                        <p class="card-text">Café acompañado de leche caliente.</p>
                        <p class="card-text" id="80" name="80"><strong>$80.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Dalgona.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe12" name="cafe12">Café Dalgona</h5>
                        <p class="card-text">Café espumoso y dulce servido sobre leche fría.</p>
                        <p class="card-text" id="97" name="97"><strong>$97.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Almendras.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="cafe13" name="cafe13">Café con Almendra</h5>
                        <p class="card-text">Café con leche de almendra.</p>
                        <p class="card-text" id="97" name="97"><strong>$97.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Browni.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="postre1" name="postre1">Brownie</h5>
                        <p class="card-text">Todo un clásico con nueces en el interior.</p>
                        <p class="card-text" id="95" name="95"><strong>$95.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Cheesecake.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="postre2" name="postre2">Cheesecake Brulee</h5>
                        <p class="card-text"> un pastel de postre hecho de queso (generalmente queso crema pero a veces ricotta), huevos y azúcar.</p>
                        <p class="card-text" id="104" name="104"><strong>$104.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Sándwich.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="postre3" name="postre3">Sándwich Rústico Trufado</h5>
                        <p class="card-text">Pollo braseado, con setas trufadas, mayonesa de trufa, queso provolone y rúcula, dentro de un pan rústico crujiente.</p>
                        <p class="card-text" id="120" name="120"><strong>$120.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Ensalada.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="postre4" name="postre4">Ensalada César</h5>
                        <p class="card-text"> una ensalada de lechuga romana y croûtons (trozos de pan tostado) con jugo de limón.</p>
                        <p class="card-text" id="90" name="90"><strong>$90.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/Pasteldechocolate.jpg" class="card-img-top" alt="" width="400" height="400">
                    <div class="card-body">
                        <h5 class="card-title" id="postre5" name="postre5">Pastel de Chocolate</h5>
                        <p class="card-text">Azúcar refinada, huevo entero, leche entera, harina de trigo, mantequilla, cocoa, almidón.</p>
                        <p class="card-text" id="100" name="100"><strong>$100.00</strong></p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

