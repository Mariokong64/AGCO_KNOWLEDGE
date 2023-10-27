<?php

class ControladorUsuarios
{

    /*=====================================================================
    MÉTODO PARA EVALUAR EL INGRESO DE LOS USUARIOS A TRAVÉS DEL LOGIN
======================================================================*/

    static public function ctrIngresoUsuario()
    {

        if (isset($_POST["ingUsuario"])) {

            /* AQUÍ DEBEMOS ENCRIPTAR DE MEJOR FORMA EL PASSWORD CUANDO DESCUBRA COMO HACERLO */
            $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $tabla = "usuarios";
            $item = "usuario";
            $valor = $_POST["ingUsuario"];

            $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

            if (is_array($respuesta)) {

                if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["contrasena"] ==  $encriptar) {

                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id_usuario"] = $respuesta["id_usuario"];
                    $_SESSION["usuario"] = $respuesta["usuario"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["perfil"] = $respuesta["perfil"];

                    /*Aquí registramos la hora del login en la base de datos */

                    date_default_timezone_set('America/Mexico_City');

                    $fecha = date('Y-m-d');
                    $hora = date('H:i:s');
                    $fechaActual = $fecha . ' ' . $hora;

                    $item1 = "ultimo_login";
                    $valor1 = $fechaActual;
                    $item2 = "id_usuario";
                    $valor2 = $respuesta["id_usuario"];

                    $utimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                    if ($utimoLogin == "ok") {

                        /* Aquí ya mandamos al usuario a la página de inicio */

                        echo '<script>

                              window.location = "inicio";
  
                              </script>';
                    }
                } else {

                    echo '<br><div class="alert alert-danger">La contraseña no es correcta</div>';
                }
            } else {

                echo '<br><div class="alert alert-danger">El usuario no existe</div>';
            }
        }
    }

    /* ==================================================
            MÉTODO PARA MOSTRAR USUARIOS EN LA TABLA
    ===================================================*/

    static public function ctrMostrarUsuarios($item, $valor)
    {

        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }


    /* ==================================================
        MÉTODO PARA REGISTRAR USUARIO
     ===================================================*/

    static public function ctrRegistrarUsuario()
    {

        if (isset($_POST["nuevoUsuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPassword"])
            ) {

                /* AQUÍ DEBEMOS ENCRIPTAR EL PASSWORD CUANDO DESCUBRA COMO HACERLO */
                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";

                $datos = array(
                    "usuario" => $_POST["nuevoUsuario"],
                    "nombre" => $_POST["nuevoNombre"],
                    "contrasena" => $encriptar,
                    "perfil" => $_POST["nuevoPerfil"]
                );

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
 
                     swal({
 
                        type: "success",
                        title: "El usuario ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConform: false
 
                         }).then((result)=>{
 
                             if (result.value) {
 
                                 window.location = "usuarios";
                         
                             }
                         });
 
                 </script>';
                }
            } else {

                echo '<script>
 
                     swal({
 
                        type: "error",
                        title: "El nombre de usuario no puede ir vacío o llevar caracteres especiales ni espacios",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConform: false
 
                         }).then((result)=>{
 
                             if (result.value) {
 
                                 window.location = "usuarios";
                         
                             }
                         });
 
                 </script>';
            }
        }
    }

    /* ==================================================
            MÉTODO PARA EDITAR USUARIOS
    ===================================================*/

    static public function ctrEditarUsuario()
    {

        if (isset($_POST["editarNombreUsuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreEmpleado"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarNombreUsuario"])
            ) {

                $tabla = "usuarios";

                if ($_POST["editarPassword"] != "") {

                    /* AQUÍ DEBEMOS ENCRIPTAR EL PASSWORD CUANDO DESCUBRA COMO HACERLO */
                    $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    $datos = array(
                        "id_usuario" => $_POST["idUsuario"],
                        "usuario" => $_POST["editarNombreUsuario"],
                        "nombre" => $_POST["editarNombreEmpleado"],
                        "contrasena" => $encriptar,
                        "perfil" => $_POST["editarPerfil"]
                    );

                } else {

                    $datos = array(
                        "id_usuario" => $_POST["idUsuario"],
                        "usuario" => $_POST["editarNombreUsuario"],
                        "nombre" => $_POST["editarNombreEmpleado"],
                        "contrasena" => $_POST["passwordActual"],
                        "perfil" => $_POST["editarPerfil"]
                    );
                }

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
    
                        swal({
    
                           type: "success",
                           title: "El usuario ha sido editado correctamente",
                           showConfirmButton: true,
                           confirmButtonText: "Cerrar",
                           closeOnConform: false
    
                            }).then((result)=>{
    
                                if (result.value) {
    
                                    window.location = "usuarios";
                            
                                }
                            });
    
                    </script>';
                }
            } else {

                echo '<script>
    
                        swal({
    
                           type: "error",
                           title: "El nombre del usuario o del empleado no puede ir vacío o llevar caracteres especiales",
                           showConfirmButton: true,
                           confirmButtonText: "Cerrar",
                           closeOnConform: false
    
                            }).then((result)=>{
    
                                if (result.value) {
    
                                    window.location = "usuarios";
                            
                                }
                            });
    
                    </script>';
            }
        }
    }

    /* ==================================================
            MÉTODO PARA BORRAR USUARIOS
    ===================================================*/

    static public function ctrBorrarUsuarios()
    {

        if (isset($_GET["idUsuario"])) {

            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];

            $respuesta = ModeloUsuarios::mdlBorrarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                swal({

                   type: "success",
                   title: "El usuario ha sido eliminado correctamente",
                   showConfirmButton: true,
                   confirmButtonText: "Cerrar",
                   closeOnConform: false

                    }).then((result)=>{

                        if (result.value) {

                            window.location = "usuarios";
                    
                        }
                    });

            </script>';
            }
        }
    }
}
