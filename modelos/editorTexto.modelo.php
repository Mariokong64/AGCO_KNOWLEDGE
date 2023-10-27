<?php

require_once "conexion.php";

class ModeloEditorTexto
{

    /* ==================================================
            MÉTODO PARA MOSTRAR TEMAS
    ===================================================*/

    static public function mdlMostrarTemas($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            $resultado["tabla"] = $tabla;

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY tema ASC");

            $stmt->execute();

            $resultado["tabla"] = $tabla;

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /* ========================================================
            METODO PARA GUARDAR EL CONTENIDO DEL EDITOR DE TEXTO
        ===========================================================*/

    static public function mdlEditarContenido($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET contenido = :contenido, id_usuario_editor = :id_usuario_editor, fecha_edicion = NOW() WHERE id_contenido = :id_contenido");

        $stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario_editor", $datos["id_usuario_editor"], PDO::PARAM_STR);
        $stmt->bindParam(":id_contenido", $datos["id_contenido"], PDO::PARAM_STR);

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


    /* =======================================================
        MÉTODO PARA MOSTRAR CONTENIDO EN EL EDITOR DE TEXTO
    =========================================================*/

    static public function mdlMostrarContenido($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT *, :tabla AS nombre_tabla FROM $tabla  INNER JOIN usuarios as us ON $tabla.id_usuario_editor = us.id_usuario WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->bindParam(":tabla", $tabla, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;
    }


    /* ========================================================
                METODO PARA EDITAR EL TÍTULO DE LOS TEMAS
        ===========================================================*/

    static public function mdlEditarTitulos($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tema = :tema WHERE id_contenido = :id_contenido");

        $stmt->bindParam(":tema", $datos["tema"], PDO::PARAM_STR);
        $stmt->bindParam(":id_contenido", $datos["id_contenido"], PDO::PARAM_STR);

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

    /*-----------------------------------------------
            MÉTODO PARA CREAR NUEVOS TEMAS
    -------------------------------------------------*/

    static public function mdlCrearTema($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tema, id_usuario_creador, id_usuario_editor) VALUES (:tema, :id_usuario_creador, :id_usuario_editor)");

        $stmt->bindParam(":tema", $datos["tema"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario_creador", $datos["id_usuario_creador"], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario_editor", $datos["id_usuario_editor"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt = null;
    }

    /* ==================================================
            MÉTODO PARA ELIMINAR TEMAS
    ===================================================*/

    static public function mdlBorrarTema($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_contenido = :id_contenido");

        $stmt->bindParam(":id_contenido", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }
}
