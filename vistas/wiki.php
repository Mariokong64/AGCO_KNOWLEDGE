<div class="sidebar">

    <div style="text-align:end; padding-top: 10px; padding-right: 6px">

    <?php
        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Soporte") {
       echo '<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalNuevoTemaWiki">Agregar tema</button>';
        }
    ?>
    </div>

    <table class="table">

        <thead>

            <tr>

                <th>Wiki</th>
                <th></th>

            </tr>

        </thead>

        <tbody>

            <?php

            $item = null;
            $valor = null;

            $temas = ControladorWiki::ctrMostrarTemasWiki($item, $valor);

            foreach ($temas as $key => $value) {

                echo '<tr>

                <td>' . $value["tema"] . '</td>

                <td>
                <button class="btn btn-primary btnRevisarTemaWiki" idTemaWiki="' . $value["id_contenido"] . '"><i class="bi bi-layout-text-window-reverse"></i></button>
                
                </td>
                
                </tr>';

            }

            ?>

        </tbody>

    </table>

</div>

<!-----------------------------------------
       MODAL PARA CREAR NUEVOS TEMAS
------------------------------------------->

<div class="modal fade" id="ModalNuevoTemaWiki" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <div class="modal-header color-cool">

                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Tema</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <!-- Aquí va el contenido del modal -->

                    <div class="form-group row">

                        <div class="">

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <input type="text" class="form-control input-lg" id="nuevoTemaWiki" name="nuevoTemaWiki" placeholder="Ingresa el nuevo tema" required>

                            </div>

                        </div>

                    </div>

                    <!-- Aquí se acaba el contenido del modal -->

                </div>

                <div class="modal-footer color-cool">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    <button type="submit" class="btn btn-primary">Agregar tema</button>

                </div>

                <?php

                $crearTema = new ControladorWiki();
                $crearTema->ctrCrearTemaWiki();

                ?>

            </form>

        </div>

    </div>

</div>

<?php include 'vistas/editorTexto.php';?>