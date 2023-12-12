<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>
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

<style>
    #barra{
        background-color: #447191;
        }

    #caja{
        background-color:#84A9C4 ;
    }

    #boton{
        background-color: #447191;
        border: black;  
    }
</style>



</head>
<body>
    <!-- Barra de navegacion AUN NO TERMINAS LOS DETALLES DEL CONTAINER DE LA BARRA SUPERIOR NI VENTANA DE CATEGORIAS-->
    <header>
            <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid" id="barra">
                    <!-- Nombre e logo (logo falta por agregar) -->
                    <a class="navbar-brand" href="index.php">El Baulito</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
    </header>

    <!-- Contenido -->
    <div class="container">
        <div class="pt-5">
        <div class="card mx-auto" style="width: 18rem;" id="caja">
            <div class="card-header text-center" id="caja">Compra completada</div>
            <div class="card-body" id="caja">
                <p>Su pedido ha sido enviado exitosamente. La ID del pedido es #<?php echo $_GET['id']; ?></p>
            </div>
            <a class="btn btn-success mx-auto" href="index.php" id="boton">Volver al inicio</a><br>
        </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>