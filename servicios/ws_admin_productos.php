<?php
global $mysqli;
require "../config.php";
$accion = isset($_GET['accion']) ? $_GET['accion'] : "default";

    switch($accion)
    {
        case "eliminar":
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            if(isset($data))
            {
                $strsql = "DELETE FROM productos WHERE idproducto = ?";
                $stmt = $mysqli->prepare($strsql);
                $stmt->bind_param("i", $data->idproducto);
                $stmt->execute();
                if($stmt->errno == 0){
                    $text = "El producto se elimino correctamente";
                } else{
                    $text = "No se pudo ejecutar la consulta";
                }
            } else {
                $text = "No se recibieron los parametros.";
            }
        break;
        case "eliminarcon":
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            if(isset($data))
            {
                $strsql = "DELETE FROM categorias WHERE idcategoria = ?";
                $stmt = $mysqli->prepare($strsql);
                $stmt->bind_param("i", $data->idcategoria);
                $stmt->execute();
                if($stmt->errno == 0){
                    $text = "La consola se elimino correctamente";
                } else{
                    $text = "No se pudo ejecutar la consulta";
                }
            } else {
                $text = "No se recibieron los parametros.";
            }
        break;
        case "default":
            break;
    }

    $jsonreturn = array(
        "text" => $text
    );

    echo json_encode($jsonreturn);

?>