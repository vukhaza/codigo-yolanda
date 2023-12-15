<?php
include 'Configuracion.php';
include 'La-carta.php';
$cart = new Cart;

if($cart->total_items() <= 0){
    header("Location: index.php");
}

$_SESSION['sessCustomerID'] = 2;

$query = $db->query("SELECT * FROM usuario WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
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
#botton{
  background-color: #84A9C4;
  color: black;
  border: black;
}

#barra{
 background-color: #447191;
}

#body{
 background-color:  #84A9C4;
}

#bot{
background-color: #447191;
color: white;
}

</style>

</head>
<body>
    <!-- Barra de navegacion -->
    <header>
        <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" >
            <div class="container-fluid" id="barra">
                <a class="navbar-brand" href="index.php">El Baulito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <hr class="d-lg-none text-white-50">
                <div class="container-fluid">
                </div>
                <a type="button" class="btn btn-outline-dark btn-lg" href="VerCarta.php" id="botton">Carrito</a>
            </div>
        </nav>
    </header>

    <!-- Productos en carrito -->
    <div class="container" id="body">
        <div class="vstack gap-3 pt-4">
            <div class="p-2">
                <h3>Vista de la orden</h3>
                <hr>
            </div>
            
            <!-- Elementos del carro -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Sub total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($cart->total_items() > 0){
                        
                        $cartItems = $cart->contents();
                        foreach($cartItems as $item){
                    ?>
                    <tr>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php echo '$'.$item["price"].'MX'; ?></td>
                        <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                        <td><?php echo '$'.$item["subtotal"].'MX'; ?></td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5"><p>Tu carro esta vacio.....</p></td>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <?php if($cart->total_items() > 0){ ?>
                        <td class="text-center"><strong>Total <?php echo '$'.$cart->total().'MXN'; ?></strong></td>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <!-- Datos del cliente -->
            <div class="shipAddr">
                <h4>Detalles de envío</h4>
                <p><?php echo $custRow['nombres']; ?></p>
                <p><?php echo $custRow['correo']; ?></p>
                <p><?php echo $custRow['numero']; ?></p>
                <p><?php echo $custRow['ubicacion']; ?></p>
            </div>
            <div class="footBtn">
                <a href="index.php" class="btn btn-warning" ><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
                <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn" >Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
            </div>

        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>