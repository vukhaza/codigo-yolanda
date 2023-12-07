<?php include 'Configuracion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El baulito</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <!-- Barra de navegacion AUN NO TERMINAS LOS DETALLES DEL CONTAINER DE LA BARRA SUPERIOR NI VENTANA DE CATEGORIAS-->
    <header>
        <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">El Baulito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <hr class="d-lg-none text-white-50">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
                <button type="button" class="btn btn-outline-dark btn-lg">Carrito</button>
            </div>
        </nav>
    </header>

    <!-- Index -->
    <div class="container">

        <!-- Zona superior -->
        <div class="container">
            <div class="row pt-3">
                <div class="col-6">

                <!-- Carrusel -->
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="img/Globos.png" class="img-fluid rounded d-block w-100 object-fit-fill" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="img/Calculadora.png" class="img-fluidrounded d-block w-100 object-fit-fill" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="img/Colores.png" class="img-fluid rounded d-block w-100 object-fit-fill" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Fin del carrusel -->
                </div>
                <div class="col-4">

                <!-- Productos destacados -->
                <div id="products" class="row row-cols-4 d-inline pl-4">
                    <h2>Destacados</h2>
                    <?php
                        $query = $db->query("SELECT * FROM inventario ORDER BY id ASC LIMIT 3");
                        if($query->num_rows > 0){
                            while($row = $query->fetch_assoc()){
                    ?>
                    <div class="p-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                                <p class="card-text"><?php echo $row["description"] ?></p>
                                <footer class="footer"><?php echo $row["price"]; ?></footer>
                                <a class="btn btn-success" href="engine.php?action=addToCart&id=<?php echo $row["id"]; ?>">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                    <?php } } else{ ?>
                        <p>Producto(s) no existe...</p>
                    <?php } ?>
                </div>
                <!-- Fin Productos destacados -->

                </div>
            </div>
        </div>

        <!-- Tarjetas con productos -->
        <div id="products" class="row row-cols-4 pt-4">
            <?php
                $query = $db->query("SELECT * FROM inventario");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
            ?>
            <div class="p-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                        <p class="card-text"><?php echo $row["description"] ?></p>
                        <footer class="footer"><?php echo $row["price"]; ?></footer>
                        <a class="btn btn-success" href="engine.php?action=addToCart&id=<?php echo $row["id"]; ?>">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <?php } } else{ ?>
                <p>Producto(s) no existe...</p>
            <?php } ?>
        </div>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>