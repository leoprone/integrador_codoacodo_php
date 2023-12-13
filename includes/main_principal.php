<?php ob_start();
include 'includes/conexion.php';?>
<?php $conexion = new conexion(); # me conecto a la base de datos
    if(isset($_GET['limit'])){
    if($_GET['limit']=="todo"){
        $oradores= $conexion->consultar("SELECT * FROM `oradores`"); # trae TODOS los oradores
    }
    }else{
         $oradores= $conexion->consultar("SELECT * FROM `oradores` LIMIT 3"); # traer los primeros 6 oradores
    }?>
<main>
      <div id="myCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active bg-carousel-ba1">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#000"/></svg>
                <div class="container">
                    <div class="carousel-caption text-end pb-5">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-6">
                                <h3>Conf Bs. As.</h3>
                                <p>Bs. As. llega por primera vez a la Argentina. Un evento para compartir con nuestra comunidad el conocimiento y la experiencia de los expertos que están creando el futuro de internet. Ven a conocer a miembros del evento, a otros estudiantes de Codo a Codo y a los oradores de primer nivel que tenemos para ti. Te esperamos!</p>
                                <p><a class="btn btn-outline-light mb-3" href="#form-orador">Quiero ser orador</a> <a class="btn btn-success ms-2 mb-3" href="./pages/comprar-tickets.php">Comprar tickets</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item bg-carousel-ba2">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#000"/></svg>
                <div class="container">
                    <div class="carousel-caption text-end pb-5">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <h3>Conf Bs. As.</h3>
                                <p>Bs. As. llega por primera vez a la Argentina. Un evento para compartir con nuestra comunidad el conocimiento y la experiencia de los expertos que están creando el futuro de internet. Ven a conocer a miembros del evento, a otros estudiantes de Codo a Codo y a los oradores de primer nivel que tenemos para ti. Te esperamos!</p>
                                <p><a class="btn btn-outline-light mb-3" href="#form-orador">Quiero ser orador</a> <a class="btn btn-success ms-2 mb-3" href="./pages/comprar-tickets.php">Comprar tickets</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item bg-carousel-ba3">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#000"/></svg>
                <div class="container">
                    <div class="carousel-caption text-end pb-5">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <h3>Conf Bs. As.</h3>
                                <p>Bs. As. llega por primera vez a la Argentina. Un evento para compartir con nuestra comunidad el conocimiento y la experiencia de los expertos que están creando el futuro de internet. Ven a conocer a miembros del evento, a otros estudiantes de Codo a Codo y a los oradores de primer nivel que tenemos para ti. Te esperamos!</p>
                                <p><a class="btn btn-outline-light mb-3" href="#form-orador">Quiero ser orador</a> <a class="btn btn-success ms-2 mb-3" href="./pages/comprar-tickets.php">Comprar tickets</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <section class="container mb-4" id="oradores">
        <h2 class="titulo-gral">Conoce a los <span>oradores</span></h2>

        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php #leemos proyectos 1 por 1
                        foreach($oradores as $orador){ 
                ?>
                     <div class="col">
                        <div class="card h-100 shadow p-3 mb-5 bg-body rounded">
                            <img class="img-fluid card-img-top" style="object-fit:cover; width:200px; height:200px;" src="<?php echo BASE_URL; ?>assets/upload/<?php echo $orador['imagen'];?>" alt="<?php echo $orador['nombre'];?>">
                           
                            <div class="card-body">
                                
                                <h5 class="card-title"><?php echo $orador['nombre'];?> <?php echo $orador['apellido'];?></h5>
                                <p class="card-text color-black"><?php echo $orador['email'];?></p>
                                <p class="card-text color-black"><?php echo $orador['tema'];?></p>
                            </div>
                        </div>
                    </div> 
                <?php } ?>
                </div>
            </div>
        </div>
        <?php #BOTÓN para que CUALQUIER visitante no registrado pueda ver TODOS los ORADORES -->
         if(!isset($_GET['btn'])){
        ?>
        <div class="d-flex justify-content-center">
           <a class="btn btn-lg btn-success mt-3 text-center" href="index.php?limit=todo&btn=ocultar-btn">Conoce más oradores</a>
        </div>
        <?php } ?>
        <!--......................................enlaces a CRUD que solo puede ver el ADMINISTRADOR........................................................-->
        <?php if ( isset( $_SESSION['usuario']) and $_SESSION['administrador']=='s') { ?>
            <div class="d-flex justify-content-center margin">
               <a class="btn btn-lg btn-success mt-3 text-center red" href="./pages/listado_admin.php">Crud de ORADORES</a>
            </div> 
            <div class="d-flex justify-content-center margin">
                <a class="btn btn-lg btn-success mt-3 text-center red" href="./pages/listado_usuarios_admin.php">Crud de USUARIOS</a>
            </div>        
        <?php }?>  
    </section>
     <section id="lugarFecha" class="lugarFecha d-flex justify-content-center">
            <div class="lugarFecha__divImg">
                <img class="divImg__img" src="../assets/img/honolulu-min.jpg" width="50%" loading="lazy" alt="Mar del Plata">
            </div>
            <div class="lugarFecha__texto">
                <h2 class="lugarFecha__texto__h2">Buenos Aires - Octubre</h2>
               <p class="lugarFecha__texto__p">Bs As es la provincia y localidad más grande del estado de Argentina. En los Estados Unidos, Honolulu es la más sureá de entre las principales ciudades estadounidenses. Aunque el nombre de Honolulu se refiere al área urbana en la costa sureste de la isla de Oahu, la ciudad y el condado de Honolulu han formado una ciudad-condado consolidada que cubre toda la ciudad (aproximadamente 600 km<sup>2</sup> de superficie).</p> 
                <a href="" class="lugarFecha__texto__ancla">Conoce más</a>
            </div>
    </section>
    <section class="container" id="form-orador">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
            <h2 class="h1-tickets">
            <div class="h1-tickets__venta">CONVIÉRTETE EN UN </div>
            <div class="contenedorValor">
                 <div class="h1-tickets__valor">ORADOR</div>
                 <span></span>
                 <span></span>
                 <span></span>
                 <span></span>
            </div>
          </h2><?php  if ( !isset( $_SESSION['usuario'])) { ?>
                <p class="text-center">Debes <a class="ancla-azul" href="<?php echo BASE_URL;?>includes/registrarse.php?origen=anotarse-orador">registrarte</a> o <a class="ancla-azul" href="<?php echo BASE_URL;?>includes/login.php?origen=anotarse-orador">iniciar sesión</a> para poder anotarte</p>
            <?php } ?>
          <?php if ( isset( $_SESSION['usuario']) and $_SESSION['logueado']='s') {  ?>
                <div id="anotarse-orador" class="margin"></div>
                <form action="./includes/insertar.php" method="post" enctype="multipart/form-data">
                    <div class="row gx-2">
                        <div class="col-md mb-3">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" aria-label="Nombre" required>
                        </div>
                        <div class="col-md mb-3">
                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" aria-label="Apellido" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-label="Email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="archivo">Imagen del Orador</label>
                        <input required class="form-control" type="file" name ="archivo" id="archivo">
                    </div>
                    <div class="col-md mb-3">
                            <label for="categoriaSelect" class="form-label">Categoría de tema</label>
                            <select class="form-select" aria-label="categoria" id="categoriaSelect">
                                <option value="" selected>-- Seleccione --</option>
                                <option value="0">Sin Categoria</option>
                                <option value="1">Javascript</option>
                                <option value="2">PHP</option>
                                
                            </select>
                            <div class="invalid-feedback" id="mensajeErrorCategoria">
                                <p>Ingrese una categoria</p>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col mb-3">
                            <textarea class="form-control" name="tema" id="tema" rows="4"
                                placeholder="Sobre qué quieres hablar?" required></textarea>
                            <div id="emailHelp" class="form-text mb-3">Recuerda incluir un título para tu charla.</div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-lg btn-form" value="Guardar Orador">
                            </div>
                        </div>
                    </div>
                </form>
<?php } ?>
            </div>
        </div>
    </section>

</main>