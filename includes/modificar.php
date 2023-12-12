<?php include 'conexion.php'; ?>

<?php include 'header.php'; 
# lo primero que pasa es que trae el id del orador que viene desde listado_admin.php si toco modificar
if($_GET){
    if(isset($_GET['modificar'])){
        $id_orador = $_GET['modificar'];
        #dentro de session creo una nueva key para guardar el orador
        $_SESSION['id_orador'] = $id_orador;
        #vamos a consultar para llenar la tabla 
        $conexion = new conexion();
        $oradores= $conexion->consultar("SELECT * FROM `oradores` where id_orador=".$id_orador);
     
    }
}
# cuando el usuario modifique los datos del orador, entonces hay un post
if($_POST){
    $conexion = new conexion();
    $id_orador = $_SESSION['id_orador'];
    #debemos recuperar la imagen actual y borrarla del servidor para lugar pisar con la nueva imagen en el server y en la base de datos
    #recuperamos la imagen de la base antes de borrar 
    $imagen = $conexion->consultar("select imagen FROM  `oradores` where id_orador=".$id_orador);
    #la borramos de la carpeta 
    unlink("../assets/upload/".$imagen[0]['imagen']);
   
   
    #levantamos los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $tema = $_POST['tema'];
    #nombre de la imagen
    $imagen_form = $_FILES['archivo']['name'];
  
        
    #tenemos que guardar la imagen en una carpeta 
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
    $fecha = new DateTime();
    $imagen_form= $fecha->getTimestamp()."_".$imagen_form;
    move_uploaded_file($imagen_temporal,"../assets/upload/".$imagen_form);
    
   
   
    #creo una instancia(objeto) de la clase de conexion
   
    $sql = "UPDATE `oradores` SET `nombre` = '$nombre' , `imagen` = '$imagen_form', `apellido` = '$apellido' , `tema` = '$tema', `email` = '$email'    WHERE `oradores`.`id_orador` = '$id_orador';";
    $id_orador = $conexion->ejecutar($sql);

    header("location:../pages/listado_admin.php");
    die(); 
}
?>






<?php
    #defino una constante con la url base , cuando suban a 000webhost es otra la url, para armar rutas relativas
    #define('BASE_URL', 'http://localhost/gisele/base-gisele/');
   # define('BASE_URL', 'https://crudgisephp.000webhostapp.com/');
   #si no hay iniciada ninguna session, entonces la iniciamos
    /* if (session_status() == PHP_SESSION_NONE) {
        session_start();
    } */
   
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


<?php include 'main_modificar.php'; ?>

<?php include 'footer.php'; ?>