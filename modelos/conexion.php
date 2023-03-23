<?php

    class Conexion{

        static public function conectar(){

            $link = new PDO("mysql:host=localhost;dbname=curso-php-problema","root","");

            $link->exec("set names utf8");
            
            return $link;

        }

    }
