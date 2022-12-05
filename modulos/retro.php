<?php
global $mysqli;
    $strsql = "SELECT idproducto, nombre_producto, descripcion, precio, cantidad, url_imagen FROM productos WHERE idcategoria=1 OR idcategoria=4 OR idcategoria=5";
    if($stmt = $mysqli->prepare($strsql)){
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $descripcion, $precio, $cantidad, $url_imagen);
           while ($stmt->fetch()){
            ?>
            <div class="row">
            <div class="col l6 m6 s12">
                <img class="responsive-img" width="300px" height="500px" src="<?php echo $url_imagen ?>" alt="">
            </div>
            <div class="col l6 m6 s12">
                <h4><?php echo $nombre_producto ?></h4>
                Descripcion del producto: <b><span><?php echo $descripcion ?></span></b>
                Cantidad en existencia: <b><span><?php echo $cantidad ?></span></b>
                <h5>Precio: <b><?php echo "L ".number_format($precio, 2) ?></b></h5>
                <a class="red darken-3 btn"><i class="material-icons left">add_shopping_cart</i>Agregar al Carrito</a>
            </div>
            </div>
            <?php
           }

        } else{
            echo "No hay nada que mostrar";
        }
    } else{
        echo "No se pudo preparar la consulta";
    }
?>