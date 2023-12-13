<?php ob_start();
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<?php define('BASE_URL', 'https://grupounocacphp23586.000webhostapp.com/');
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/estilos-propios.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>index.css">
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/codoacodo-min.png" type="image/x-icon">

  <title>Trabajo Integrador</title>
</head>
<body class="body">
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?php echo BASE_URL; ?>index.php">
                <img src="<?php echo BASE_URL; ?>assets/img/codoacodo-min.png" alt="Codo a Codo logo">
                    Conf Bs As
                </a>

                <?php if(isset( $_SESSION['usuario'])){ ?>
                    <div class="usuario-contenedor">
                        <?php if ($_SESSION['administrador']=='s') { ?>
                            <div class="usuario">
                                <div class="admin">Administrador</div>
                                <div><?php echo $_SESSION['usuario'];?></div>
                            </div> 
                        <?php } ?>
                        <?php if ($_SESSION['administrador']=='n') { ?>
                            <div class="usuario"><?php echo $_SESSION['usuario'];?></div>
                        <?php }?>
                    </div>
                <?php } ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>index.php">La conferencia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#oradores">Los oradores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#lugar">El lugar y la fecha</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#form-orador">Conviértete en orador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-compra-tickets" href="<?php echo BASE_URL; ?>pages/comprar-tickets.php">Comprar tickets</a>
                        </li>
                    <?php if ( isset( $_SESSION['usuario']) and $_SESSION['administrador']=='s') { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo BASE_URL; ?>includes/cerrar.php">Cerrar Sesión de administrador <span><?php echo $_SESSION['usuario']; ?></span></a> 
                        </li>
                    <?php } ?>
                    <?php if ( isset( $_SESSION['usuario']) and $_SESSION['administrador']=='n') { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo BASE_URL; ?>includes/cerrar.php">Cerrar Sesión de <span><?php echo $_SESSION['usuario']; ?></span></a> 
                        </li>
                    <?php }
                    else {
                            // Usuario no logueado: mostrar opción para INICIAR SESIÓN o REGISTRARSE
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>includes/login.php?origen=menu">LogIn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>includes/registrarse.php?origen=menu">Registrarse</a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
</header>