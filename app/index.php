<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Video Juegos</title>
    <link rel="stylesheet" href="http://localhost/ProyectoWeb/Proyecto/app/css/stylo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="teal lighten-3">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems);
            var drop=document.querySelectorAll('.dropdown-trigger')
            M.Dropdown.init(drop);
            
        });
    </script>

    <div class="teal">
        <div id="navigate">
            <div  class="nav-bar col s12">
                <nav class="teal" style="padding: 0px 10px;">
                    <div class="teal nav-wrapper">
                      <ul id="nav-mobile" class="teal left hide-on-med-and-down">
                        <li><a href="?modulo=inicio">Bienvenido</a></li>
                        <li><a href="?modulo=ofertas">Ofertas diarias</a></li>
                        <li><a href="https://www.joyfreak.com/">Foro Externo Para Discusión de Juegos</a></li>
                        
                        
                      </ul>
                      <ul id="nav-mobile" class="teal right hide-on-med-and-down">
                        <li><a href="?modulo=shopping_list"><i class="material-icons">shopping_cart</i></a></li>
                        <li><a href="?modulo=login"><i class="material-icons">input</i></a></li>
                      </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    

    <div class="container">
      <?php $funciones->openModule($modulo); ?>
    </div>

    <footer class="section page-footer teal">
            <div class="footer-copyright teal lighten-3">
              <div class="container">
                <div>© 2021 Desarrollo de Aplicaciones en Internet <a class="white-text right" href="https://www.metacritic.com/game">Mas Información de Juegos</a></div>
              </div>
            </div>
        </footer>
</body>
</html>
