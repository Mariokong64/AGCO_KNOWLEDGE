<?php

class ControladorServidores
{

    /* ==================================================
            MÉTODO PARA MOSTRAR TEMAS
    ===================================================*/

    static public function ctrMostrarTemas($item, $valor)
    {

        $tabla = "temas_servidores";

        $respuesta = ModeloEditorTexto::mdlMostrarTemas($tabla, $item, $valor);

        return $respuesta;
    }


    /*-----------------------------------------------
            MÉTODO PARA CREAR NUEVOS TEMAS
    -------------------------------------------------*/

    static public function ctrCrearTema()
    {

        if (isset($_POST["nuevoTemaServidores"])) {

            $tabla = "temas_servidores";
            $tema = trim($_POST["nuevoTemaServidores"]);
            $usuario = $_SESSION["id_usuario"];

            $datos = array(
                "tema" => $tema,
                "id_usuario_creador" => $usuario,
                "id_usuario_editor" => $usuario
            );

            $respuesta = ModeloEditorTexto::mdlCrearTema($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                swal({

                   type: "success",
                   title: "El tema ha sido creado exitosamente",
                   showConfirmButton: true,
                   confirmButtonText: "Cerrar",
                   closeOnConfirm: false

                    }).then((result)=>{
                        if (result.value) {
                            window.location = "servidores";
                        }
                    });

            </script>';
            }
        }
    }

    /* =======================================================
        MÉTODO PARA MOSTRAR CONTENIDO EN EL EDITOR DE TEXTO
    =========================================================*/

    static public function ctrMostrarContenido($item, $valor)
    {

        $tabla = "temas_servidores";

        $respuesta = ModeloEditorTexto::mdlMostrarContenido($tabla, $item, $valor);

        return $respuesta;
    }
}
