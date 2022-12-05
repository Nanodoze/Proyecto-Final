<?php
global $mysqli;
global $urlweb;
?>

<div class="container">
    <form class="col s12" method="POST">
        <div class="row">
            <div class="input-field col l4 m4 s6">
                <input name="nombre_categoria" type="text" class="validate">
                <label>Nombre de la Consola</label>
            </div>
            <div class="input-field col l6 m6 s12">
                <input name="descripcion" type="text" class="validate">
                <label>Descripcion de la Consola</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="agregar">Agregar Consola
                <i class="material-icons right">send</i>
            </button>
            
        </div>
    </form>
    <div>
        <a class="waves-effect waves-light btn-small" href="?modulo=admin_productos">Volver a Admin</a>
    </div>
</div>

<?php
    if (isset($_POST['agregar'])){
        if (strlen($_POST['nombre_categoria']) >= 1 &&
        strlen($_POST['descripcion']) >= 1)
        {
            $nombre_categoria= trim($_POST['nombre_categoria']);
            $descripcion= trim($_POST['descripcion']);
            $strsql ="INSERT INTO categorias(nombre_categoria, descripcion) VALUES ('$nombre_categoria','$descripcion')";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <h3>Consola agregada de Manera Exitosa</h3>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <h2>Error al agregar la consola.</h2>
                <?php
            }
        }else {
            ?>
            <h3>Debe de llenar todos los campos</h3>
            <?php
        }
    }
?>