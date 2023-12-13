<?php include '../includes/conexion.php'; ?>

<?php $conexion = new conexion();
 $oradores= $conexion->consultar("SELECT * FROM `oradores`");
 ?>
 <?php
        #si nos envian por url, get 
        if($_GET){

            #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
        if(isset($_GET['borrar'])){
                $id_orador = $_GET['borrar'];
                # creo un objeto de conexion a la base
                $conexion = new conexion();

                #recuperamos la imagen de la base antes de borrar 
                $imagen = $conexion->consultar("select imagen FROM  `oradores` where id_orador=".$id_orador);
                #la borramos de la carpeta 
                unlink("../assets/upload/".$imagen[0]['imagen']);

                #borramos el registro de la base 
                $sql ="DELETE FROM `oradores` WHERE `oradores`.`id_orador` =".$id_orador; 
                $id_orador = $conexion->ejecutar($sql);
                #para que no intente borrar muchas veces
                header("Location:listado_admin.php");
                die();
            }
        # si toco el modificar, levanta el id del orador que se le envio y redirecciona a una pagina con un formulario para modificar 
        if(isset($_GET['modificar'])){
                $id_orador = $_GET['modificar'];
                header("Location:../includes/modificar.php?modificar=".$id_orador);
                die();
            }
        } 
        #vamos a consultar para llenar la tabla 
        $conexion = new conexion();
        $oradores= $conexion->consultar("SELECT * FROM `oradores`");
?> 
<?php include_once("../includes/header.php")?>
<?php include_once("../includes/main_listadoadmin.php")?>
<?php include_once("../includes/footer.php")?>