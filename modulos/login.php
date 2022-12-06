<form method="POST">
    <div class="container section">
        <div class="row">
            <div class="col s12 left">
                <div>
                    <h6 class="white-text coolbar stick">Log-in</h6>
                </div>
            <div class="input-field col s12">
                <input placeholder="Usuario" name="usuario" type="text" class="validate" required>
                <label>Usuario</label>
            </div>
            <div class="input-field col s12">
                <input placeholder="Contraseña" name="contra" type="text" class="validate" required>
                <label>Contraseña</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="inicio">Iniciar Sesión
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
</form>

<?php
if (isset($_POST['inicio'])){
    if (strlen($_POST['usuario']) >= 1 &&
    strlen($_POST['contra']) >= 1)
    {
        $usuario= trim($_POST['usuario']);
        $contra= trim($_POST['contra']);
        if ($usuario="jostor" && $contra="291098") {
            header("Location: http://localhost/ProyectoWeb/Proyecto/?modulo=admin_productos");
        } else {
            ?>
            <h2>Usuario o Contraseña incorrecto.</h2>
            <?php
        }
    }else {
        ?>
        <h3>Debe de llenar todos los campos</h3>
        <?php
    }
}
?>

