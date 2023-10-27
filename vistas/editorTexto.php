<!------------------------------------------------
    EDITOR DE TEXTO FUNCIONAL
------------------------------------------------->
<?php include 'vistas/modalEditarTitulo.php'; ?>
<?php include 'vistas/modalPDF.php'; ?>

<div class="content editor-texto" style="padding-top: 30px;">

    <div class="container mi-contenedor" style="display: none;" id="mi-contenedor">

        <div style="display: flex; justify-content: space-between;">

            <div style="width: 100%; text-align: end;">

                <?php
                if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Soporte") {
                    echo '<button class="btn btn-success text-white btnEditarTitulo" data-bs-toggle="modal" data-bs-target="#ModalEditarTitulo">Editar Título</button>';
                }
                ?>

            </div>
            <!--
    <div style="width: 9%;">
 boton del pdf
        <div class="dropdown" style="text-align: end;">

            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100px;">PDF</button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item btnSubirPDF" data-bs-toggle="modal" data-bs-target="#ModalSubirPDF">Subir PDF</a></li>
                <li><a class="dropdown-item" href="#">Descargar PDF</a></li>
            </ul>

        </div>

    </div>
-->
        </div>
        <form role="form" method="post">

            <div style="width: 100%; margin:auto">

                <!-- Aquí empieza el editor de texto -->

                <div>

                    <div style="padding-bottom: 15px" name="tema" id="tema"></div>

                </div>

                <!--    <input type="hidden" name="contenidoTemaWindows" id="contenidoTemaWindows"> -->
                <input type="hidden" name="contenidoTema" id="contenidoTema">
                <input type="hidden" name="idTema" id="idTema">
                <input type="hidden" name="tabla" id="tabla">
                <textarea name="contenidoDelTema" id="editorDeTexto" style="display: none;"></textarea>

                <!-- Aquí termina el editor de texto -->
            </div>

            <!-- Aqui empieza el contenedor para el botón de guardar cambios y la información de ultima modificación. -->
            <div class="container" style="padding-top: 15px">

                <div class="row">

                    <div class="col" style="text-align: start;">
                        <div name="ultimaEdicion" id="ultimaEdicion"></div>
                    </div>

                    <div class="col" style="text-align: end;">

                        <?php
                        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Soporte") {
                            echo '<button type="submit" class="btn btn-info text-white" style="width: 150px;">Guardar cambios</button>';
                        }
                        ?>
                    </div>

                </div>

                <?php
                if ($_SESSION["perfil"] == "Administrador") {
                    echo
                    '<!-- Botón de eliminar -->
                <div class="row" style="padding-top: 20px;">

                    <div class="col" style="text-align: start;">
                        <div name="ultimaEdicion" id="ultimaEdicion"></div>
                    </div>

                    <div class="col" style="text-align: end;">
                        <button type="button" class="btnEliminarTema btn btn-dark text-white" style="width: 150px;">Eliminar tema</button>
                    </div>

                </div>
                <!-- Termina el botón de eliminar -->';
                }
                ?>

            </div>

            <?php

            $guardarTexto = new ControladorEditorTexto();
            $guardarTexto->ctrGuardarCambios();

            ?>

            </fomr>

    </div>

</div>

<?php

$borrarTema = new ControladorEditorTexto();
$borrarTema->ctrBorrarTema();

?>