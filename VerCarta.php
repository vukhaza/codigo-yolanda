<?php

include 'La-carta.php';
$cart = new Cart;
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

    <!-- Actualizar carrito -->
    <script>
    function updateCartItem(obj,id){
        $.get("AccionCarta.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>

<style>
        #fondo{
        background-color: #e6f0f7 ;    
        }

        #boton{
        background-color:#84A9C4 ;
        border: black;
        color: black;
        }

        #barra{
        background-color:#447191;
        }

</style>

</head>
<body>
    <!-- Barra de navegacion -->
    <header>
        <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid" id="barra">
                <a class="navbar-brand" href="index.php">El Baulito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"     > 
                    <span class="navbar-toggler-icon"></span>
                </button>
                <hr class="d-lg-none text-white-50">
                <div class="container-fluid">
                </div>
                <a type="button" class="btn btn-outline-dark btn-lg" href="VerCarta.php" id="boton">Carrito</a>
            </div>
        </nav>
    </header>

    <!-- Productos en carrito -->
    <div class="container" id="fondo">
        <div class="vstack gap-3 pt-4">
            <div class="p-2">
                <h3>Carrito</h3>
                <hr>
            </div>
            
            <!-- Elemento dinamico del carro -->
            <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Sub total</th>
                    <th>&nbsp;</th>
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
                    <td>
                        <a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="5"><p>Tu carro esta vacio.....</p></td>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="index.php" class="btn btn-warning" id="boton"><i class="glyphicon glyphicon-menu-left" ></i> Continue Comprando</a></td>
                    <td colspan="2"></td>
                    <?php if($cart->total_items() > 0){ ?>
                    <td class="text-center"><strong>Total <?php echo '$'.$cart->total().'MX'; ?></strong></td>
                    <td><a href="Pagos.php" class="btn btn-success btn-block" id="boton">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td>
                    <?php } ?>
                </tr>
            </tfoot>
            </table>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>