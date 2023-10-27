<!------------------------------------------------
       MODAL PARA EDITAR LOS TÍTULOS DE LOS TEMAS
-------------------------------------------------->

<div class="modal fade" id="ModalEditarTitulo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <div class="modal-header color-cool">

                    <h5 class="modal-title">Editar Título</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <!-- Aquí va el contenido del modal -->

                    <div class="form-group row">

                        <div class="">

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <input type="text" class="form-control input-lg" id="EditarTitulo" name="EditarTitulo" placeholder="Ingresa el nuevo tema" required>
                                <input type="hidden" name="idTitulo" id="idTitulo">
                                <input type="hidden" name="nombreTabla" id="nombreTabla">

                            </div>

                        </div>

                    </div>

                    <!-- Aquí se acaba el contenido del modal -->

                </div>

                <div class="modal-footer color-cool">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    <button type="submit" class="btn btn-primary">Editar título</button>

                </div>

                <?php

                $editarTítulo = new ControladorEditorTexto();
                $editarTítulo->ctrEditarTitulos();

                ?>

            </form>

        </div>

    </div>

</div>