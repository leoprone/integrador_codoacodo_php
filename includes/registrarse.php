<?php ob_start();
session_start(); ?>
<?php 

if($_GET){
  #origen del enlace hacia registrarse.php
  $origen=$_GET['origen'];
}
     

     
 


    #validar datos
    if ($_POST){
      #conexion a la base
      /*<?php include 'includes/conexion.php'; ?>
        <?php $conexion = new conexion(); # me conecto a la base de datos
        $user= $conexion->consultar("SELECT * FROM `usuarios` where mail =".$_POST['email'] ."and password="..$_POST['pass']);
        $user['es_admin'];  #tiene que ser un campo de la base de datos de la tabla usuarios
        $user['password']  # levanto la contraseña
       
       ?> */
      #mail
      #contraseña
      #es_admin s o n 
      /*
      select mail, pass
      from usuarios where
      es_admin = 'S';*/
      /* USUARIOS["mail"] */
        if( ($_POST['email']=="administrador") && ($_POST['password']=='cac') ){
          $_SESSION['usuario']="Admin";
          $_SESSION['logueado']='S';
          #redirecciono porque ingreso ok 
          header("location:../pages/listado_admin.php");
          die();
         // exit;
        }
        else{
            # aca me da igual quien se loguea
           $_SESSION['usuario'] = $_POST['email'];
           header("location:../pages/listado.php");
          
           die();
        }
    }?>




<?php
    #defino una constante con la url base , cuando suban a 000webhost es otra la url, para armar rutas relativas
    define('BASE_URL', 'http://localhost/gisele/base-gisele/');
   # define('BASE_URL', 'https://crudgisephp.000webhostapp.com/');
   #si no hay iniciada ninguna session, entonces la iniciamos
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
   
?>



<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/estilos-propios.css">
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/codoacodo-min.png" type="image/x-icon">

  <title>Trabajo Integrador</title>
</head>



<body class="body">

    <?php include_once("../includes/header.php")?>
    <?php include_once("../includes/main_registrarse.php")?>
    <?php include_once("../includes/footer.php")?>