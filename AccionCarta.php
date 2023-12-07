<?php
//Declara la zona horaria e importa configuracion de bd, y otro documento
date_default_timezone_set("America/Lima");
include 'La-carta.php';
include 'Configuracion.php';

//Inicializa un nuevo carrito
$cart = new Cart;

//Verifica que un boton haya sido presionado
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    //Verifica que el boton 'agregar al carrito' haya sido presionado. Luego verifica la id del articulo donde fue presionado
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        //Toma la id del boton presionado y lo vuelve una variable
        $productID = $_REQUEST['id'];

        //Saca la informacion del producto desde la id
        $query = $db->query("SELECT * FROM inventario WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        //Crea un diccionario con la informacion del producto
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => 1
        );

        //Verifica que la operacion haya sido exitosa, luego redirecciona al index
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'VerCarta.php':'index.php';
        header("Location: ".$redirectLoc);
    //Verifica que la orden de actualizar item del carrito haya sido enviada (junto con la id del producto)
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
      //Genera diccionario con la informacion de la cantidad de articulos y la id del articulo
      $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
      );
        //Actualiza la cantidad del item en cuestion y envia un output para demostrar el estatus de la operacion
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    //Verifica que la orden de eliminar item haya sido mandada (y lee la id del producto)
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        //Verifica la id del item a remover
        $deleteItem = $cart->remove($_REQUEST['id']);
        //redireccion a la ventana de el carrito
        header("Location: VerCarta.php");
    //Verifica que la accion de hacer orden haya sido ejecutada, que haya items en el carrito y que haya una id de sesion iniciada
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        //Guarda la orden en la db, y tambien da la fecha y hora !!!!!!!!!!!!!!!!!!!! DESDE AQUI SE MODIFICA LA ORDEN
        $insertOrder = $db->query("INSERT INTO orden (idUsr, monto, date) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."')");
        //Genera una lista de datos para llenar en el query de la orden.
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            
            $cartItems = $cart->contents();
            //genera un query donde almacena cada articulo de la orden (!!!DEBES ALTERAR ESTO. NO TENEMOS ESA TABLA Y NO LA VEMOS NECESARIA!!!)
            foreach($cartItems as $item){
                $sql .= "INSERT INTO ordenArticulos (idOrden, idProd, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            //Ejecuta el query de arriba ^^^^^
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExito.php?id=$orderID");
            }else{
                header("Location: Pagos.php");
            }//Este ^^ y este vv redirigen a la ventana de pagos (que tiene la info de la orden, precio y demas)
        }else{
            header("Location: Pagos.php");
        }
    }else{
        header("Location: index.php");
    }// estos dos ^^vv redirigen al index si todo lo demas falla
}else{
    header("Location: index.php");
}
