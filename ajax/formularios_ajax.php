<?php 

require_once "../controladores/formularios_controlador.php";
require_once "../modelos/formularios_modelo.php";

/*===================================================
Clase de AJAX
====================================================*/

class AjaxFormularios{

    /*===================================================
    VALIDAR NUMERO EXISTENTE
    ====================================================*/

    public $validarNumero;

    public function ajaxValidarNumero(){

        $item="numero";
        $valor = $this->validarNumero;

        $respuesta = ControladorFormularios::ctrSeleccionarContactos($item, $valor);
        echo json_encode($respuesta);

    }

    /*===================================================
    VALIDAR TOKEN EXISTENTE
    ====================================================*/

    public $validarToken;

    public function ajaxValidarToken(){

        $item="token";
        $valor = $this->validarToken;

        $respuesta = ControladorFormularios::ctrSeleccionarContactos($item, $valor);
        echo json_encode($respuesta);

    }

}

/*===================================================
Objeto de AJAX que recibe la variable POST
====================================================*/

if(isset($_POST["validarNumero"])){

    $valNumero = new AjaxFormularios();
    $valNumero -> validarNumero = $_POST["validarNumero"];
    $valNumero -> ajaxValidarNumero();

}

/*===================================================
Objeto de AJAX que recibe la variable POST
====================================================*/

if(isset($_POST["validarToken"])){

    $valToken = new AjaxFormularios();
    $valToken -> validarToken = $_POST["validarToken"];
    $valToken -> ajaxValidarToken();

}