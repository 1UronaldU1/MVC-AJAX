<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema MVC</title>

    <!--===================================================
    PlUGINS DE CSS
    ===================================================----> 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!--===================================================
    PlUGINS DE JS
    ===================================================---->

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest compiled Footawesome -->
    <script src="https://kit.fontawesome.com/60213d354c.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <!--===================================================
    LOGOTIPO
    ===================================================---->

    <div class="container-fluid bg-dark">
        <h3 class="text-center py-3 text-white m-0">RONALDVM</h3>
    </div>

    <!--===================================================
    BOTONERA
    ===================================================---->

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">CONTACTO</a><span class="text-white">|</span>
            <ul class="navbar-nav">

            <?php if(isset($_GET["pagina"])): ?>

                <!-- PRIMERO BOTON -->

                <?php if($_GET["pagina"] == "registrar"): ?>

                    <li class="nav-item">
                        <a href="registrar" class="nav-link active">Registrar</a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a href="registrar" class="nav-link">Registrar</a>
                    </li>

                <?php endif ?>

                <!-- SEGUNDO BOTON -->

                <?php if($_GET["pagina"] == "ingresar"): ?>

                    <li class="nav-item">
                        <a href="ingresar" class="nav-link active">Ingresar</a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a href="ingresar" class="nav-link">Ingresar</a>
                    </li>

                <?php endif ?>

                <!-- TERCERO BOTON -->

                <?php if($_GET["pagina"] == "inicio"): ?>

                    <li class="nav-item">
                    <a href="inicio" class="nav-link active">Inicio</a>
                </li>

                <?php else: ?>

                <li class="nav-item">
                    <a href="inicio" class="nav-link">Inicio</a>
                </li>

                <?php endif ?>

                <!-- CUARTO BOTON -->

                <?php if($_GET["pagina"] == "salir"): ?>

                    <li class="nav-item">
                        <a href="salir" class="nav-link active">Salir</a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a href="salir" class="nav-link">Salir</a>
                    </li>

                <?php endif ?>
            
            <?php else: ?>

                <li class="nav-item active">
                    <a href="registrar" class="nav-link">Registrar</a>
                </li>
                <li class="nav-item">
                    <a href="ingresar" class="nav-link">Ingresar</a>
                </li>
                <li class="nav-item">
                    <a href="inicio" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="salir" class="nav-link">Salir</a>
                </li>

            <?php endif ?>

            </ul>
    </nav>

    <!--===================================================
    Contenido
    ===================================================---->

    <div class="container-fluid">
        <div class="container py-5">
            <?php
            
                #ISSET: isset() Determina si una variable está definida y no es NULL

                if(isset($_GET["pagina"])){

                    if($_GET["pagina"] == "registrar" ||
                        $_GET["pagina"] == "ingresar" ||
                        $_GET["pagina"] == "inicio" ||
                        $_GET["pagina"] == "editar" ||
                        $_GET["pagina"] == "salir"){

                            include "paginas/".$_GET["pagina"].".php";

                    }else{

                        include "paginas/error404.php";

                    }

                }else{

                    include "paginas/registrar.php";
                    
                }

            ?>
        </div>
    </div>

<!-- personal -->
<script src="vistas/js/script.js"></script>

</body>
</html>