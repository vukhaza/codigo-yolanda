<?php
include './functions/conexion.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Papeleria el baulito</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <!-----------------------------------buscador-------------------------------------------------->
    <div class="logo">
    <link rel="stylesheet" href="styles.css">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <img src="./img/Captura de pantalla 2023-10-25 230838.png" width="400">

        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  articulos
                </a>
                <ul class="dropdown-menu">
        
                  <li><a class="dropdown-item" href="./login.php">login</a></li>
                  <li><a class="dropdown-item" href="./carrito1.php">carrito</a></li>
              
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>
    </div>
      <div class="container">
        <h1>Novedades</h1>

  <!--------------------------------------------carrusel---------------------------------
        <div id="carouselExample" class="carousel slide">
          <nav class="navbar" style="background-color: #e3f2fd;">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="activate">
                <img src="./img/Calculadora.png"  width="400"    ><h5>  </h5>
              </div>
              </div>
              <div class="carousel-item">
                <img src="./img/plumas duo.png"  width="600" ><h5>  </h5>
              </div>
              <div class="carousel-item">
                <img src="./img/plumes de pisarron.png"  width="650" ><h5> </h5>

              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </nav>
          </div>
-->

<br>

<!-- <div class="grid text-center" style="--bs-columns: 4;">
<div class="contenedor">
  <div class="card" style="width: 18rem;">
    <img src="" width="300"> IMAGENES DESHABILITADAS TEMPORALMENTE
    <div class="card-body">
      <h5 class="card-title">Resistol</h5>
      <p class="card-text">$10.</p>
      <a type="accion.php" class="btn btn-primary">Agregar</a>
    </div>
  </div>
</div> -->

<div id="products" class="row row-cols-4">
  <?php
  $query = $db->query("SELECT * FROM inventario ORDER BY id DESC");
  if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
  ?>
  <div class="p-3">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row["name"]; ?></h5>
        <p class="card-text"><?php echo $row["description"] ?></p>
        <footer class="footer"><?php echo $row["price"]; ?></footer>
        <a class="btn btn-primary">Agregar al carrito</a>
      </div>
    </div>
  </div>
  <?php } } else{ ?>
    <p>Producto(s) no existe...</p>
  <?php } ?>
</div>


<div class="contenedor2">
<!-- <nav aria-label="Page navigation example"> DESACTIVADO POR PRUEBAS ARRIBA
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="pagina2.php">2</a></li>
    <li class="page-item"><a class="page-link" href="pagina3.php">3</a></li>
    <li class="page-item"><a class="page-link" href="pagina2.php">Siguiente</a></li>
  </ul>
</nav> -->
</div>
</div>
  <!-------------------------------------------------------------------------------------------->



      </div>
      <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>