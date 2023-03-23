<?php

class ControladorFormularios{

    /*===================================================
    Registro
    ====================================================*/

    static public function ctrContacto(){

        if(isset($_POST["registroUsuario"])){

            if(preg_match('/^[a-zA-ZnÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["registroUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroNumero"]) && 
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])){

                $tabla = "contacto";

                $token = md5($_POST["registroUsuario"]."+".$_POST["registroNumero"]);

                $encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("token" => $token,
                                "usuario" => $_POST["registroUsuario"],
                                "numero" => $_POST["registroNumero"],
                                "password" => $encriptarPassword);

                $respuesta = ModeloFormularios::mdlContacto($tabla,$datos);

                return $respuesta;

            }else{

                $respuesta = "error";

                return $respuesta;

            }

        }

    }

    /*===================================================
    Seleccionar Registros
    ====================================================*/

    static public function ctrSeleccionarContactos($item, $valor){

        $tabla = "contacto";

        $respuesta = ModeloFormularios::mdlSeleccionarContactos($tabla, $item, $valor);

        return $respuesta;

    }

    /*===================================================
    Ingresar
    ====================================================*/

    public function ctrIngresar(){

        if(isset($_POST["ingresoNumero"])){

            $tabla = "contacto";
            $item = "numero";
            $valor = $_POST["ingresoNumero"];

            $respuesta = ModeloFormularios::mdlSeleccionarContactos($tabla, $item, $valor);

            $encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            if($respuesta == false){

                echo '<script>
                
                if( window.history.replaceState ){

                    window.history.replaceState(null, null, window.location.href );

                }
            
            </script>';

            echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';

            }else if($respuesta["numero"] == $_POST["ingresoNumero"] && $respuesta["password"] == $encriptarPassword){

                ModeloFormularios::mdlActualizarIntentosFallidos($tabla, 0,$respuesta["token"]);
                
                $_SESSION["validarIngreso"] = "ok";

                echo '<script>
                
                    if( window.history.replaceState ){

                        window.history.replaceState(null, null, window.location.href );

                    }

                    window.location = "inicio";
                
                </script>';

            }else{

                if($respuesta["intentos_fallidos"] < 3){

                    $tabla = "contacto";

                    $intentos__fallidos =$respuesta["intentos_fallidos"] + 1;
    
                    ModeloFormularios::mdlActualizarIntentosFallidos($tabla, $intentos__fallidos,$respuesta["token"]);
                    
                }else{

                    echo '<div class="alert alert-warning">RECAPTCHA Debes validar que no eres un robot</div>';

                }

                echo '<script>
                
                    if( window.history.replaceState ){

                        window.history.replaceState(null, null, window.location.href );

                    }
                
                </script>';

                echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';

            }

        }

    }

    /*===================================================
    Actualizar Registro
    ====================================================*/

    static public function ctrActualizarContacto(){

        if(isset($_POST["actualizarUsuario"])){

            if(preg_match('/^[a-zA-ZnÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["actualizarUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["actualizarNumero"])){

                    $usuario = ModeloFormularios::mdlSeleccionarContactos("contacto", "token", $_POST["tokenUsuario"]);

                    //$compararToken = md5($usuario["usuario"]."+".$usuario["numero"]);

                    if($usuario["token"] == $_POST["tokenUsuario"]){

                        if($_POST["actualizarPassword"] != ""){

                            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["actualizarPassword"])){
                                
                                $password = crypt($_POST["actualizarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                            }
        
                        }else{
        
                            $password = $_POST["passwordActual"];
        
                        }

                        $tabla = "contacto";

                        $actualizarToken = md5($_POST["actualizarUsuario"]."+".$_POST["actualizarNumero"]);
        
                        $datos = array("id" => $_POST["idUsuario"],
                                        "token" => $_POST["tokenUsuario"],
                                        "usuario" => $_POST["actualizarUsuario"],
                                        "numero" => $_POST["actualizarNumero"],
                                        "password" => $password);
            
                        $respuesta = ModeloFormularios::mdlActualizarContactos($tabla,$datos);
            
                        return $respuesta;

                }else{

                    $respuesta = "error";

                    return $respuesta;

                }

            }else{

                $respuesta = "error";

                return $respuesta;

            }

        }

    }

    /*===================================================
    Eliminar Registro
    ====================================================*/

    public function ctrEliminarContacto(){

        if(isset($_POST["eliminarRegistro"])){

            $usuario = ModeloFormularios::mdlSeleccionarContactos("contacto", "token", $_POST["eliminarRegistro"]);

            $compararToken = md5($usuario["usuario"]."+".$usuario["numero"]);

            if($compararToken == $_POST["eliminarRegistro"]){

                $tabla = "contacto";
                $valor = $_POST["eliminarRegistro"];

                $respuesta = ModeloFormularios::mdlEliminarContacto($tabla,$valor);

                if($respuesta == "ok"){

                    echo '<script>
                    
                    if( window.history.replaceState ){

                        window.history.replaceState(null, null, window.location.href );

                    }

                    window.location = "inicio";
                
                </script>';

                }

            }

        }

    }

}
