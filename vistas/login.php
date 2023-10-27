    <div class="container rounded shadow" style="margin-top: 100px;">

        <div class="row align-items-stretch">

            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

            </div>

            <div class="col bg-white p-5 rounded-end">

                <div class="text-end">

                    <img src="vistas/img/agco_logo.png" width="48" alt="">

                </div>

                <h2 class="fw-bold text-center py-5">Bienvenido/a</h2>

                <!-- Login -->

                <form method="post" action="#">

                    <div class="mb-4">

                        <label for="ingUsuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="ingUsuario" id="ingUsuario">

                    </div>

                    <div class="mb-4">

                        <label for="ingPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="ingPassword" id="ingPassword">

                    </div>

                    <div class="d-grid">

                        <button type="submit" class="btn btn-danger" name="btnIngresar">Ingresar</button>

                    </div>

                    <div class="d-grid" style="padding-top: 25px;">

                        <img src="vistas/img/AGCO-Logo.png" alt="" style="margin: auto;">

                    </div>

                    <?php
                    $login = new ControladorUsuarios();
                    $login->ctrIngresoUsuario();
                    ?>

                </form>

            </div>

        </div>

    </div>