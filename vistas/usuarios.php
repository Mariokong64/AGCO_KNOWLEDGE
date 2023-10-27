<div class="usuarios-section">

    <div class="container-fluid" style="padding-left: 30px; padding-right:30px">

        <div class="row">

            <div class="col-md-6">

                <div class="detail-box">

                    <div>

                        <h1 class="text-danger">Administrador <br>
                            <span class="text-white">de Usuarios</span>
                        </h1>

                        <p class="text-light">
                            En esta sección es posible crear, editar y eliminar los usuarios que tienen acceso a este sistema.
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- Aquí comienza el contenido de la datatable -->

        <div class="box-body" style="padding: 25px 50px;">

            <div style="height: 50px; text-align: end;">

                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">

                    Agregar Usuario

                </button>

            </div>

            <table id="datatableWindows" class="table table-striped" style="width:100%">
                <thead>
                    <tr>

                        <th>Nombre de usuario</th>
                        <th>Nombre de empleado</th>
                        <th>Perfil</th>
                        <th>Último login</th>
                        <th>Fecha de registro</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    $item = null;
                    $valor = null;

                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                    foreach ($usuarios as $key => $value) {

                        echo '                        
                            <tr>

                              <td>' . $value["usuario"] . '</td>
                              <td>' . $value["nombre"] . '</td>
                              <td>' . $value["perfil"] . '</td>
                              <td>' . $value["ultimo_login"] . '</td>
                              <td>' . $value["fecha_registro"] . '</td>
                              
                                <td>
                                    <div class="btn-group">
    
                                        <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id_usuario"] . '" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario" style="margin-left: 10px;">Editar</button>
                                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id_usuario"] . '" style="margin-left: 5px;">Eliminar</button>
                
                                    </div>

                                </td>

                            </tr>';
                    }

                    ?>

                </tbody>

            </table>

        </div>

        <!-- Aquí termina el contenido de la datatable -->

    </div>

</div>


<!-----------------------------------------
       MODAL PARA CREAR NUEVOS USUARIOS
------------------------------------------->

<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <div class="modal-header bg-danger text-white">

                    <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <!-- Aquí va el contenido del modal -->

                    <div class="box-body">

                        <!-- ESPACIO PARA INGRESAR EL NUEVO NOMBRE DE USUARIO -->

                        <div class="form-group modal-input">

                            <label for="nuevoUsuario"><strong>Nombre de usuario</strong></label>

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <input type="text" class="form-control input-lg" id="nuevoUsuario" name="nuevoUsuario" placeholder="Ingresar nombre de usuario" id="nuevoUsuario" required>

                            </div>

                        </div>

                        <!-- ESPACIO PARA INGRESAR EL NUEVO NOMBRE DE EMPLEADO -->

                        <div class="form-group modal-input">

                            <label for="nuevoNombre"><strong>Nombre de empleado</strong></label>

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <input type="text" class="form-control input-lg" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar nombre de empleado" required>

                            </div>

                        </div>

                        <!-- ESPACIO PARA INGRESAR LA CONTRASEÑA -->

                        <div class="form-group modal-input">

                            <label for="nuevoPassword"><strong>Contraseña</strong></label>

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <input type="password" class="form-control input-lg" id="nuevoPassword" name="nuevoPassword"  placeholder="Ingresar contraseña" required>

                            </div>

                        </div>

                        <!-- ESPACIO PARA INGRESAR EL PERFIL DEL USUARIO -->

                        <div class="form-group modal-input">

                            <label for="nuevoPerfil"><strong>Perfil</strong></label>

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <select class="form-select" aria-label="Default select example" id="nuevoPerfil" name="nuevoPerfil" required>

                                    <option value="">Seleccionar Perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Trabajador">Trabajador</option>
                                    <option value="Soporte">Soporte</option>

                                </select>

                            </div>

                        </div>

                    </div>

                    <!-- Aquí se acaba el contenido del modal -->

                </div>

                <div class="modal-footer color-cool">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    <button type="submit" class="btn btn-danger">Agregar usuario</button>

                </div>

                <?php

                $registrarUsuario = new ControladorUsuarios();
                $registrarUsuario->ctrRegistrarUsuario();

                ?>

            </form>

        </div>

    </div>

</div>


<!-----------------------------------------
       MODAL PARA EDITAR USUARIOS
------------------------------------------->

<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <div class="modal-header bg-danger text-white">

                    <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <!-- Aquí va el contenido del modal -->

                    <div class="box-body">

                        <!-- ESPACIO PARA INGRESAR EL NUEVO NOMBRE DE USUARIO -->

                        <div class="form-group modal-input">

                            <label for="nuevoUsuario"><strong>Nombre de usuario</strong></label>

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <input type="text" class="form-control input-lg" id="editarNombreUsuario" name="editarNombreUsuario" placeholder="Ingresar nombre de usuario" id="nuevoUsuario" required>
                                <input type="hidden" id="idUsuario" name="idUsuario">

                            </div>

                        </div>

                        <!-- ESPACIO PARA INGRESAR EL NUEVO NOMBRE DE EMPLEADO -->

                        <div class="form-group modal-input">

                            <label for="nuevoNombre"><strong>Nombre de empleado</strong></label>

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <input type="text" class="form-control input-lg" id="editarNombreEmpleado" name="editarNombreEmpleado" placeholder="Ingresar nombre de empleado" required>

                            </div>

                        </div>

                        <!-- ESPACIO PARA INGRESAR LA CONTRASEÑA -->

                        <div class="form-group modal-input">

                            <label for="nuevoPassword"><strong>Contraseña</strong></label>

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <input type="password" class="form-control input-lg" id="editarPassword" name="editarPassword"  placeholder="Ingresar contraseña">
                                <input type="hidden" id="passwordActual" name="passwordActual">

                            </div>

                        </div>

                        <!-- ESPACIO PARA INGRESAR EL PERFIL DEL USUARIO -->

                        <div class="form-group modal-input">

                            <label for="nuevoPerfil"><strong>Perfil</strong></label>

                            <div class="input-group">

                                <span class="input-group-addon"></span>

                                <select class="form-select" aria-label="Default select example" id="editarPerfil" name="editarPerfil" required>

                                    <option value="">Seleccionar Perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Trabajador">Trabajador</option>
                                    <option value="Soporte">Soporte</option>

                                </select>

                            </div>

                        </div>

                    </div>

                    <!-- Aquí se acaba el contenido del modal -->

                </div>

                <div class="modal-footer color-cool">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    <button type="submit" class="btn btn-danger">Editar usuario</button>

                </div>

                <?php

                $EditarUsuario = new ControladorUsuarios();
                $EditarUsuario->ctrEditarUsuario();

                ?>

            </form>

        </div>

    </div>

</div>

<?php

$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuarios();

?>