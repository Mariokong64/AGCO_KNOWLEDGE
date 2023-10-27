<?php

class ControladorOtros
{

    /* ==================================================
            MÉTODO PARA MOSTRAR TEMAS
    ===================================================*/

    static public function ctrMostrarTemasOtros($item, $valor)
    {

        $tabla = "temas_otros";

        $respuesta = ModeloEditorTexto::mdlMostrarTemas($tabla, $item, $valor);

        return $respuesta;
    }


    /*-----------------------------------------------
            MÉTODO PARA CREAR NUEVOS TEMAS
    -------------------------------------------------*/

    static public function ctrCrearTemaOtros()
    {

        if (isset($_POST["nuevoTemaOtros"])) {

            $tabla = "temas_otros";
            $tema = trim($_POST["nuevoTemaOtros"]);
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
                            window.location = "otros";
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

        $tabla = "temas_otros";

        $respuesta = ModeloEditorTexto::mdlMostrarContenido($tabla, $item, $valor);

        return $respuesta;
    }
}
