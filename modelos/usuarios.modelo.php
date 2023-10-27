<?php

require_once "conexion.php";

class ModeloUsuarios
{

    /*===============================================================
        METODO PARA MOSTRAR U OBTENER USUARIOS DE LA BASE DE DATOS
    ================================================================*/

    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /*===========================================================
        METODO PARA ACTUALIZAR EL ÚLTIMO LOGIN DE LOS USUARIOS
    ============================================================*/

    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            //return "error";
            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());

            return;
        }

        $stmt = null;
    }

    /*===========================================================
        METODO PARA REGISTRAR UN NUEVO USUARIO EN LA BASE DE DATOS
    ============================================================*/

    static public function mdlIngresarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, nombre, contrasena, perfil) VALUES (:usuario, :nombre, :contrasena, :perfil)");

        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            //return "error";
            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());

            return;
        }

        $stmt = null;
    }

        /* ==================================================
                         METODO PARA EDITAR USUARIOS
        ===================================================*/

        static public function mdlEditarUsuario($tabla, $datos)
        {
    
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, nombre = :nombre, contrasena = :contrasena, perfil = :perfil WHERE id_usuario = :id_usuario");
    
            $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
    
            if ($stmt->execute()) {
    
                return "ok";
            } else {
    
                //return "error";
                echo "\nPDO::errorInfo():\n";
                print_r(Conexion::conectar()->errorInfo());
    
                return;
            }
    
            $stmt = null;
        }

        /* ==================================================
                    METODO PARA BORRAR USUARIOS
        ===================================================*/

        static public function mdlBorrarUsuarios($tabla, $datos){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :idUsuario");

            $stmt -> bindParam(":idUsuario", $datos, PDO::PARAM_INT);

            if ($stmt->execute()) {

                return "ok";
            } else{
                return "error";
            }

            $stmt = null;
        }
}
