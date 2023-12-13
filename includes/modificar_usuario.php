<?php ob_start();
      include 'conexion.php'; ?>
<?php
# lo primero que pasa es que trae el id del orador que viene desde listado_admin.php si toco modificar
if($_GET){
    if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
        #dentro de session creo una nueva key para guardar el orador
        $_SESSION['id'] = $id;
        #vamos a consultar para llenar la tabla 
        $conexion = new conexion();
        $oradores= $conexion->consultar("SELECT * FROM `usuarios` where id=".$id);
     
    }
}
# cuando el usuario modifique los datos del orador, entonces hay un post
if($_POST){
    $conexion = new conexion();
    $id = $_SESSION['id'];
   
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $sql = "UPDATE `usuarios` SET `usuario` = '$usuario' , `password` = '$password' WHERE `usuarios`.`id` = '$id';";
    $id = $conexion->ejecutar($sql);

    header("location:../pages/listado_admin.php");
    die();
}?>
<?php include 'header.php';?>
<?php include 'main_modificar.php';?>
<?php include 'footer.php';?>