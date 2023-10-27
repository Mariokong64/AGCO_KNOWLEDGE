<?php

class ControladorIntelisis
{

    /* ==================================================
            MÉTODO PARA MOSTRAR TEMAS
    ===================================================*/

    static public function ctrMostrarTemasIntelisis($item, $valor)
    {

        $tabla = "temas_intelisis";

        $respuesta = ModeloEditorTexto::mdlMostrarTemas($tabla, $item, $valor);

        return $respuesta;
    }


    /*-----------------------------------------------
            MÉTODO PARA CREAR NUEVOS TEMAS
    -------------------------------------------------*/

    static public function ctrCrearTemaIntelisis()
    {

        if (isset($_POST["nuevoTemaIntelisis"])) {

            $tabla = "temas_intelisis";
            $tema = trim($_POST["nuevoTemaIntelisis"]);
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
                   closeOnConform: false

                    }).then((result)=>{
                        if (result.value) {
                            window.location = "intelisis";
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

        $tabla = "temas_intelisis";

        $respuesta = ModeloEditorTexto::mdlMostrarContenido($tabla, $item, $valor);

        return $respuesta;
    }
}
