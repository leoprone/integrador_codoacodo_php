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
<?php include_once("../includes/header.php")?>
<?php include_once("../includes/main_listado_usuarios_admin.php")?>
<?php include_once("../includes/footer.php")?>