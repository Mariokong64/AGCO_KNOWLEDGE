<!------------------------------------------------
       MODAL PARA EDITAR LOS TÍTULOS DE LOS TEMAS
-------------------------------------------------->

<div class="modal fade" id="ModalSubirPDF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" action="uploads/guardar_PDF.php" method="post" enctype="multipart/form-data">

                <div class="modal-header color-cool">

                    <h5 class="modal-title">Subir PDF</h5>

                </div>

                <div class="modal-body">

                    <!-- Aquí va el contenido del modal -->

                    <input type="file" name="file" size="50"/>

                    <!-- Aquí se acaba el contenido del modal -->

                </div>

                <div class="modal-footer color-cool">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    <button type="submit" value="upload" class="btn btn-primary">Subir PDF</button>

                </div>

            </form>

        </div>

    </div>

</div>