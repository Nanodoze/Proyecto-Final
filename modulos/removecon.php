<?php
global $mysqli;
global $urlweb;
?>

<table class="white centered">
    <thead>
        <tr>
            <th>Consola</th>
            <th>Descripcion</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $strsql = "SELECT idcategoria, nombre_categoria, descripcion FROM categorias";
            if($stmt = $mysqli->prepare($strsql)){
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows>0){
                    $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion);
                    while($stmt->fetch()){
                        ?>
                        <tr id="<?php echo $idcategoria ?>">
                            <td><?php echo $nombre_categoria ?></td>
                            <td><?php echo $descripcion ?></td>
                            <td><a class="btn green" href="?modulo=editcon&idcategoria= <?php echo $idcategoria ?>">Editar</a></td>
                            <td><a class="btn red" href="javascript:eliminar(<?php echo $idcategoria ?>)">Eliminar</a></td>
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

<div>
    <a class="waves-effect waves-light btn-small" href="?modulo=admin_productos">Volver a Admin</a>
</div>

<script>
    function eliminar(idcategoria){
        var url = '<?php echo $urlweb ?>servicios/ws_admin_productos.php?accion=eliminarcon';
        fetch(url, {
            method: 'POST',
            body: JSON.stringify({
                "idcategoria": idcategoria
            })
        })
        .then((response)=> response.json())
        .then ((data)=> {
            console.log(data);
            const row = document.getElementById(idcategoria);
            row.remove();
        })
        .catch((error) => {
            console.error(error);
        })
    }
</script>