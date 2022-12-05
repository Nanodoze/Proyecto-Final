<?php
global $mysqli;
global $urlweb;
?>

<?php
    
?>
<a class="btn waves-light left" href="?modulo=addprod">Agregar Producto</a>
<a class="section btn red waves-light right" href="?modulo=removecon">Administrar Consolas</a>
<a class="btn waves-light right" href="?modulo=addconsole">Agregar Consola</a>

<div class="section row"><h3 class="center">Administración de Productos</h3></div>


<table class="white centered">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $strsql = "SELECT productos.idproducto, productos.nombre_producto, categorias.nombre_categoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM `productos` INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria";
            if($stmt = $mysqli->prepare($strsql)){
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows>0){
                    $stmt->bind_result($idproducto, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
                    while($stmt->fetch()){
                        ?>
                        <tr id="<?php echo $idproducto ?>">
                            <td><?php echo $nombre_producto ?></td>
                            <td><?php echo $categoria ?></td>
                            <td><?php echo $descripcion ?></td>
                            <td><img src="<?php echo $url_imagen ?>" width="150px" height="200px" alt=""></td>
                            <td><?php echo $precio ?></td>
                            <td><?php echo $cantidad ?></td>
                            <td><a class="btn green" href="?modulo=editprod&idproducto= <?php echo $idproducto ?>">Editar</a></td>
                            <td><a class="btn red" href="javascript:eliminar(<?php echo $idproducto ?>)">Eliminar</a></td>
                        </tr>
                        <?php
                    }
                }else{
                    echo "No Hay Registros";
                }
            }else{
                echo "No se pudo hacer la consulta";
            }
        ?>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>

<script>
    function eliminar(idproducto){
        var url = '<?php echo $urlweb ?>servicios/ws_admin_productos.php?accion=eliminar';
        fetch(url, {
            method: 'POST',
            body: JSON.stringify({
                "idproducto": idproducto
            })
        })
        .then((response)=> response.json())
        .then ((data)=> {
            console.log(data);
            const row = document.getElementById(idproducto);
            row.remove();
        })
        .catch((error) => {
            console.error(error);
        })
    }
</script>
