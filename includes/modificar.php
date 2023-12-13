<?php ob_start();
      include 'conexion.php';?>
<?php if($_GET){
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
}?>
<?php include 'header.php'; ?>
<?php include 'main_modificar.php'; ?>
<?php include 'footer.php'; ?>