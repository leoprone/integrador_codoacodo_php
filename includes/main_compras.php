<main>
    <section class="container pt-section">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                <div class="row row-cols-1 row-cols-md-3 text-center">
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-primary">
                            <div class="card-header py-3 text-white bg-primary border-primary">
                                <h4 class="my-0 fw-normal">Estudiante</h4>
                            </div>
                            <div class="card-body">
                                <p>Tienen un descuento</p>
                                <h3 class="card-title pricing-card-title">80%</h3>
                                <small class="fw-light text-muted mt-3">* Presentar documentación</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-info">
                            <div class="card-header py-3 text-white bg-info border-info">
                                <h4 class="my-0 fw-normal">Trainee</h4>
                            </div>
                            <div class="card-body">
                                <p>Tienen un descuento</p>
                                <h3 class="card-title pricing-card-title">50%</h3>
                                <small class="fw-light text-muted mt-3">* Presentar documentación</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-warning">
                            <div class="card-header py-3 text-white bg-warning border-warning">
                                <h4 class="my-0 fw-normal">Junior</h4>
                            </div>
                            <div class="card-body">
                                <p>Tienen un descuento</p>
                                <h3 class="card-title pricing-card-title">15%</h3>
                                <small class="fw-light text-muted mt-3">* Presentar documentación</small>
                            </div>
                        </div>
                    </div>
                </div>

                


          <h1 class="h1-tickets">
            <div class="h1-tickets__venta">VENTA</div>
            <div class="contenedorValor">
                 <div class="h1-tickets__valor">VALOR DE TICKET $200</div>
                 <span></span>
                 <span></span>
                 <span></span>
                 <span></span>
            </div>
          </h1>
<?php  if ( !isset( $_SESSION['usuario'])) {?>
                <p class="text-center">Debes <a class="ancla-azul" href="<?php echo BASE_URL;?>includes/registrarse.php?origen=formulario-compra">registrarte</a> o <a class="ancla-azul" href="<?php echo BASE_URL;?>includes/login.php?origen=formulario-compra">iniciar sesión</a> para hacer tu compra</p>
<?php } ?>
<?php if ( isset( $_SESSION['usuario'])) { ?>
         <div id="formulario-compra"></div>
                <form action="" method="post">
                    <div class="row gx-2">
                        <div class="col-md mb-3">
                            <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" id="nombre" required>
                            <div class="invalid-feedback" id="mensajeErrorNombre">
                               <p>Ingrese su nombre</p>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <input type="text" class="form-control" placeholder="Apellido" aria-label="Apellido" id="apellido" required>
                            <div class="invalid-feedback" id="mensajeErrorApellido">
                                <p>Ingrese su apellido</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <input type="email" class="form-control" placeholder="Email" aria-label="Email" id="mail" required>
                            <div class="invalid-feedback" id="mensajeErrorMail">
                                <p>Ingrese un mail y valido</p>
                            </div>
                           
                        </div>
                    </div>
                    <div class="row gx-2">
                        <div class="col-md mb-3">
                            <label for="cantidadTickets" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad" id="cantidadTickets" min="1" required>
                            <div class="invalid-feedback" id="mensajeErrorCantTickets">
                                <p>Ingrese cantidad de tickets</p>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <label for="categoriaSelect" class="form-label">Categoría</label>
                            <select class="form-select" aria-label="Categoría" id="categoriaSelect">
                                <option value="" selected>-- Seleccione --</option>
                                <option value="0">Sin Categoria</option>
                                <option value="1">Estudiante</option>
                                <option value="2">Trainee</option>
                                <option value="3">Junior</option>
                            </select>
                            <div class="invalid-feedback" id="mensajeErrorCategoria">
                                <p>Ingrese una categoria</p>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-primary mt-2 mb-4" role="alert">
                        Total a pagar: $ <span id="totalPago" class="align-middle"></span>
                    </div>
                    <div class="row gx-2">
                        <div class="col-md mb-3">
                            <button type="reset" class="w-100 btn btn-lg btn-form" id="btnBorrar">Borrar</button>
                        </div>
                        <div class="col-md mb-3">
                            <button type="button" class="w-100 btn btn-lg btn-form" id="btnResumen">Resumen</button>
                        </div>
                    </div>
                    

                </form>
<?php } ?>
            </div>
        </div>
    </section>

</main>