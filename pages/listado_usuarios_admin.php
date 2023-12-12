<?php include '../includes/conexion.php'; ?>

<?php $conexion = new conexion();
 $usuarios= $conexion->consultar("SELECT * FROM `usuarios`");
 ?>
 <?php
        #si nos envian por url, get 
        #if($_GET){

            #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
        if(isset($_GET['borrar'])){
                $id = $_GET['borrar'];
                # creo un objeto de conexion a la base
                $conexion = new conexion();

                #recuperamos la imagen de la base antes de borrar 
               # $imagen = $conexion->consultar("select imagen FROM  `oradores` where id_orador=".$id_orador);
                #la borramos de la carpeta 
               # unlink("../assets/upload/".$imagen[0]['imagen']);

                #borramos el registro de la base 
                $sql ="DELETE FROM `usuarios` WHERE `usuarios`.`id` =".$id; 
                $borrar= $conexion->ejecutar($sql);
                #para que no intente borrar muchas veces
                header("Location:listado_usuarios_admin.php");
                die();
            

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


 <?php include_once("../includes/main_listado_usuarios_admin.php")?>
   
 <?php include_once("../includes/footer.php")?>