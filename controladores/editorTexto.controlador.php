<?php

class ControladorEditorTexto
{

    /* ==================================================
            MÉTODO PARA EDITAR TÍTULOS DE LOS TEMAS
    ===================================================*/

    static public function ctrEditarTitulos()
    {

        if (isset($_POST["EditarTitulo"])) {

            $tabla = $_POST["nombreTabla"];
            $titulo = trim($_POST["EditarTitulo"]);

            $datos = array(
                "id_contenido" => $_POST["idTitulo"],
                "tema" => $titulo,
            );

            $respuesta = ModeloEditorTexto::mdlEditarTitulos($tabla, $datos);

            switch ($tabla) {
                case 'temas_windows':
                    $ruta = "windows";
                    break;
                case 'temas_intelisis':
                    $ruta = "intelisis";
                    break;
            }

            if ($respuesta == "ok") {

                echo '<script>

                    swal({
    
                       type: "success",
                       title: "El título ha sido editado exitosamente",
                       showConfirmButton: true,
                       confirmButtonText: "Cerrar",
                       closeOnConfirm: false
    
                        }).then((result)=>{
                            if (result.value) {
                                window.location = "' . $ruta . '";
                            }
                        });
    
                </script>';
            }
        }
    }

    /* =================================================
       MÉTODO PARA GUARDAR EL CONTENIDO DEL EDITOR
    ===================================================*/

    static public function ctrGuardarCambios()
    {

        if (isset($_POST["contenidoDelTema"])) {

            $contenido = $_POST["contenidoDelTema"];

            //i want to print in the console the variable $contenido

            echo "<script>console.log('" . $contenido . "');</script>";

            $tabla = $_POST["tabla"];
            $datos = array(
                "contenido" => $contenido,
                "id_usuario_editor" => $_SESSION["id_usuario"],
                "id_contenido" => $_POST["idTema"]
            );

            $respuesta = ModeloEditorTexto::mdlEditarContenido($tabla, $datos);

            switch ($tabla) {

                case 'temas_windows':
                    $ruta = "windows";
                    break;

                case 'temas_intelisis':
                    $ruta = "intelisis";
                    break;

                case 'temas_af_system':
                    $ruta = "afsystem";
                    break;

                case 'temas_agco_solutions':
                    $ruta = "agcosolutions";
                    break;

                case 'temas_internet':
                    $ruta = "internet";
                    break;

                case 'temas_office':
                    $ruta = "office";
                    break;

                case 'temas_servidores':
                    $ruta = "servidores";
                    break;
            }

            if ($respuesta == "ok") {

                echo '<script>

                 swal({

                    type: "success",
                    title: "El contenido ha sido guardado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                     }).then((result)=>{

                         if (result.value) {

                             window.location = "' . $ruta . '";
                     
                         }
                     });

             </script>';
            }
        }
    }


    /* ==================================================
            MÉTODO PARA BORRAR TEMAS
    ===================================================*/

    static public function ctrBorrarTema()
    {

        if (isset($_GET["nombreTabla"])) {

            $tabla = $_GET["nombreTabla"];

            $datos = $_GET["idTema"];

            $respuesta = ModeloEditorTexto::mdlBorrarTema($tabla, $datos);

            switch ($tabla) {

                case 'temas_windows':
                    $ruta = "windows";
                    break;

                case 'temas_intelisis':
                    $ruta = "intelisis";
                    break;

                case 'temas_af_system':
                    $ruta = "afsystem";
                    break;

                case 'temas_agco_solutions':
                    $ruta = "agcosolutions";
                    break;

                case 'temas_internet':
                    $ruta = "internet";
                    break;

                case 'temas_office':
                    $ruta = "office";
                    break;

                case 'temas_servidores':
                    $ruta = "servidores";
                    break;

                case 'temas_wiki':
                    $ruta = "wiki";
                    break;

                case 'temas_otros':
                    $ruta = "otros";
                    break;
            }

            if ($respuesta == "ok") {

                echo '<script>

                swal({

                   type: "success",
                   title: "El tema ha sido eliminado exitosamente",
                   showConfirmButton: true,
                   confirmButtonText: "Cerrar",

                    }).then(function(result){
                        if (result.value) {
                            window.location = "' . $ruta . '";
                        }
                    });

            </script>';
            }
        }
    }
}
