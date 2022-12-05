<?php
global $mysqli;
?>

<div id="bigol">
  
  <div id="clint" class="teal lighten-3 nav-bar  row">
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="?modulo=detalle_marca&idcategoria= 1">NES</a></li>
      <li><a href="?modulo=detalle_marca&idcategoria= 5">Nintendo GameCube</a></li>
      <li><a href="?modulo=detalle_marca&idcategoria= 4">Sega Genesis</a></li>
      <li><a href="?modulo=detalle_marca&idcategoria= 2">PlayStation 4</a></li>
      <li><a href="?modulo=detalle_marca&idcategoria= 3">XBox One X</a></li>
    </ul>
    <nav class="teal col s12">
      <div class="nav-wrapper">
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <img width="300" height="75" class="resp-img" src="http://localhost/ProyectoWeb/Proyecto/app/img/storelogo.jpg" alt="">
        </ul>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Consolas<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="?modulo=inventario"><i class="material-icons right">store</i>Todos Nuestros Productos</a></li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col s12">
        <div class="slider">
          <ul class="slides">
            <li>
              <a href="?modulo=retro">
                <img src="http://localhost/ProyectoWeb/Proyecto/app/img/retroback.webp" class="responsive-img">
                <div class="caption center-align">
                  <h3>Tenemos Juegos Retro!</h3>
                  <h5>Click aqui para ver más.</h5>
                </div>
              </a>
            </li>
            <li>
              <a href="?modulo=nxtgen">
                <img src="http://localhost/ProyectoWeb/Proyecto/app/img/nxtgen.jpg" class="responsive-img">
                <div class="caption left-align">
                  <h3 >Tenemos Juegos de Última Generación!</h3>
                  <h5 >Click aqui para ver más.</h5>
                </div>
              </a>
            </li>
            <li>
              <a href="?modulo=shooter">
                <img src="http://localhost/ProyectoWeb/Proyecto/app/img/shoot.jpg" class="responsive-img">
                <div class="caption right-align">
                  <h3>Tenemos Juegos de Disparos!</h3>
                  <h5 >Click aqui para ver más.</h5>
                </div>
              </a>
            </li>
            <li>
              <a href="?modulo=fight">
                <img src="http://localhost/ProyectoWeb/Proyecto/app/img/pelea.jpg" class="responsive-img">
                <div class="caption center-align">
                  <h3>Tenemos Juegos de Pelea!</h3>
                  <h5 >Click aqui para ver más.</h5>
                </div>
              </a>
            </li>
            <li>
              <a href="?modulo=explore">
                <img src="http://localhost/ProyectoWeb/Proyecto/app/img/explore.webp" class="responsive-img">
                <div class="caption center-align">
                  <h3>Tenemos Juegos de Exploración!</h3>
                  <h5 >Click aqui para ver más.</h5>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="eastwood" class=" section teal lighten-3">
    <div>
      <div class="card-panel teal">
        <h5 class="white-text">Los Mejores Juegos.</h5>
      </div>
      <div class="row center">
        <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` LIMIT 4";
        if($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $url_imagen);
            while($stmt->fetch()){
            ?>
            <a class="white-text" href="?modulo=detalle_productos&idproducto= <?php echo $idproducto ?>">
            <div class="col l3 s12 m3">
              <img class="responsive-img" src="<?php echo $url_imagen ?>" alt="">
              <h6><?php echo $nombre_producto ?></h6>
              <div><span><?php echo "L ".number_format ($precio, 2) ?></span></div>
            </div>
            </a>
            <?php
            }
            } else{
              echo "No hay datos a mostrar";
            }
          } else {
            echo "No se pudo hacer la consulta";
        }?>
                  
      </div>
    </div>
    <div class=" section ">
      <div class="row card-panel teal">
        <h5 class="white-text">Los Juegos Más Populares.</h5>
      </div>
      <div class="row">
      <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` WHERE idproducto = 19";
        if($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $url_imagen);
            while($stmt->fetch()){
            ?>
            <a class="white-text" href="?modulo=detalle_productos&idproducto= <?php echo $idproducto ?>">
            <div class="center col l6 s12 m6">
              <img class="responsive-img" src="<?php echo $url_imagen ?>" alt="">
              <h6><?php echo $nombre_producto ?></h6>
              <div><span><?php echo "L ".number_format ($precio, 2) ?></span></div>
            </div>
            </a>
            <?php
            }
            } else{
              echo "No hay datos a mostrar";
            }
          } else {
            echo "No se pudo hacer la consulta";
        }
      ?>
      <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` WHERE idproducto = 24";
        if($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $url_imagen);
            while($stmt->fetch()){
            ?>
            <a class="white-text" href="?modulo=detalle_productos&idproducto= <?php echo $idproducto ?>">
            <div class="center col l6 s12 m6">
              <img class="responsive-img" src="<?php echo $url_imagen ?>" alt="">
              <h6><?php echo $nombre_producto ?></h6>
              <div><span><?php echo "L ".number_format ($precio, 2) ?></span></div>
            </div>
            </a>
            <?php
            }
            } else{
              echo "No hay datos a mostrar";
            }
          } else {
            echo "No se pudo hacer la consulta";
        }
      ?>
      </div>
    </div>
    <div class=" section ">
      <div class="row card-panel teal">
        <h5 class="white-text">Oferta Especial de 15% de Descuento.</h5>
      </div>
      <div class="center row">
        <?php
          $strsql = "SELECT idproducto, nombre_producto, idcategoria, descripcion, precio, url_imagen FROM productos WHERE cantidad >20 LIMIT 3;";
          if($stmt = $mysqli->prepare($strsql)){
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
              $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $url_imagen);
              while($stmt->fetch()){
              ?>
              <a class="white-text" href="?modulo=detalle_oferta&idproducto= <?php echo $idproducto ?>">
              <div class="center col l4 s12 m4">
                <img class="responsive-img" src="<?php echo $url_imagen?>" alt="">
                <h6><?php echo $nombre_producto ?></h6>
                <div><span><?php $oferta=$precio-($precio*0.15); echo "L ".number_format ($oferta, 2) ?></span></div>
                <div><span>Precio Original: <?php echo "L ".number_format ($precio, 2) ?></span></div>
              </div>
              </a>
              <?php
              }
              } else{
                echo "No hay datos a mostrar";
              }
          } else {
              echo "No se pudo hacer la consulta";
          }
        ?>
      </div>
      
    </div>
    <div class=" section ">
      <div class="row card-panel teal">
        <h5 class="white-text">Compra por Consolas.</h5>
      </div>
      <div  class="center  row">
        <a class="white-text" href="?modulo=detalle_marca&idcategoria= 3">
          <div class="col m2 offset-m1 center"><img class="responsive-img" src="http://localhost/ProyectoWeb/Proyecto/app/img/xboxlogo.jpg" alt=""><p>XBox One X</p></div>
        </a>
        <a class="white-text" href="?modulo=detalle_marca&idcategoria= 1">
          <div class="col m2 center"><img class="responsive-img" src="http://localhost/ProyectoWeb/Proyecto/app/img/NES_Logo.png" alt=""><p>Nintendo Entertainment System</p></div>
        </a>
        <a class="white-text" href="?modulo=detalle_marca&idcategoria= 2">
          <div class="col m2 center"><img class="responsive-img" src="http://localhost/ProyectoWeb/Proyecto/app/img/playlogo.png" alt=""><p>PlayStation 4</p></div>
        </a>
        <a class="white-text" href="?modulo=detalle_marca&idcategoria= 4">
          <div class="col m2 center"><img class="responsive-img" src="http://localhost/ProyectoWeb/Proyecto/app/img/segalogo.png" alt=""><p>Sega Genesis</p></div>
        </a>
        <a class="white-text" href="?modulo=detalle_marca&idcategoria= 5">
          <div class="col m2 center"><img class="responsive-img" src="http://localhost/ProyectoWeb/Proyecto/app/img/GClogo.png" alt=""><p>Nintendo GameCube</p></div>
        </a>
      </div>
    </div>
  </div>
</div>