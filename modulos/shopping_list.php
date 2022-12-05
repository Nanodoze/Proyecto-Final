<?php
global $mysqli;
    $strsql = "SELECT idproducto, nombre_producto, descripcion, precio, url_imagen FROM productos";
    if($stmt = $mysqli->prepare($strsql)){
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $descripcion, $precio, $url_imagen);
           while ($stmt->fetch()){
            ?>
            <div class="row">
                <div class="col l6 m6 s12">
                    <img class="responsive-img" width="300px" height="500px" src="<?php echo $url_imagen ?>" alt="">
                </div>
                <div class="col l6 m6 s12">
                    <h4><?php echo $nombre_producto ?></h4>
                    Descripcion del producto: <b><span><?php echo $descripcion ?></span></b>
                    Cantidad a comprar: <b><span><?php $cantidad=1; echo $cantidad ?></span></b>
                    <h5>Precio: <b><?php $preciofinal=$precio*$cantidad; echo "L ".number_format($preciofinal, 2) ?></b></h5>
                    <button class="btn waves-effect waves-light teal" type="add" onclick=agregar()><i class="material-icons right">add</i></button>
                </div>
            </div>
            <?php
            if(isset($total)){
            $total= $preciofinal+$total;
            } else {
                $total=$preciofinal;
            }
           }
        } else{
            echo "No hay nada que mostrar";
        }
    } else{
        echo "No se pudo preparar la consulta";
    }
    
?>
<div>
    <h5>Total a Pagar: <b><?php echo "L ".number_format($total, 2)?> </b></h5>
</div>


<script>
    function agregar(){
        <?php $cantidad= $cantidad+1 ?>
    }
</script>