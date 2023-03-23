<?php

    require_once "controladores/plantilla_controlador.php";
    require_once "controladores/formularios_controlador.php";
    require_once "modelos/formularios_modelo.php";

    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrTraerPlantilla();