<?php

    require_once "conexion.php";

    class ModeloFormularios{

        static public function mdlContacto($tabla, $datos){

            $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(token,usuario, numero, password) VALUES (:token, :usuario, :numero, :password)");

            $stmt -> bindParam(":token", $datos["token"], PDO::PARAM_STR);
            $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt -> bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
            $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);

            if($stmt -> execute()){

                return "ok";
    
            }else{
    
                print_r(Conexion::conectar() -> errorInfo());
    
            }

    
            $stmt = null;

        }

        /*===================================================
        Seleccionar Registros
        ====================================================*/

        static public function mdlSeleccionarContactos($tabla, $item , $valor){

            if($item == null && $valor == null){

                $stmt = Conexion::conectar() -> prepare("SELECT *,DATE_FORMAT(fecha,'%d / %m / %Y') as fecha FROM $tabla ORDER BY id DESC");

                $stmt -> execute();

                return $stmt -> fetchAll();

            }else{

                $stmt = Conexion::conectar() -> prepare("SELECT *,DATE_FORMAT(fecha,'%d / %m / %Y') as fecha FROM $tabla WHERE $item =:$item ORDER BY id DESC");

                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetch();

            }

            $stmt = null;

        }

        /*===================================================
        Actualizar Registro
        ====================================================*/

        static public function mdlActualizarContactos($tabla, $datos){

            $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET token = :token, usuario = :usuario, numero = :numero,password = :password WHERE id = :id");

            $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt -> bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
            $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt -> bindParam(":token", $datos["token"], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if($stmt -> execute()){

                return "ok";
    
            }else{
    
                print_r(Conexion::conectar() -> errorInfo());
    
            }

    
            $stmt = null;

        }

        /*===================================================
        Eliminar Contacto
        ====================================================*/

        static public function mdlEliminarContacto($tabla, $valor){

            $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE token = :token");

            $stmt -> bindParam(":token", $valor, PDO::PARAM_INT);

            if($stmt -> execute()){

                return "ok";

            }else{

                print_r(Conexion::conectar() -> errorInfo());

            }

            $stmt = null;

        }

        /*===================================================
    Actualizar Intentos fallidos
    ====================================================*/

    static public function mdlActualizarIntentosFallidos($tabla, $valor, $token){

        $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET intentos_fallidos = :intentos_fallidos WHERE token = :token");

        $stmt -> bindParam(":intentos_fallidos", $valor, PDO::PARAM_INT);
        $stmt -> bindParam(":token", $token, PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar() -> errorInfo());

        }

        $stmt = null;

    }

    }
