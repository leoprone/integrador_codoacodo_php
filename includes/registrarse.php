<?php ob_start();
session_start(); ?>
<?php if($_GET){
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
<?php include_once("../includes/header.php")?>
<?php include_once("../includes/main_registrarse.php")?>
<?php include_once("../includes/footer.php")?>