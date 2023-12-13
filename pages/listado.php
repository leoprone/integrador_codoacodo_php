<?php include '../includes/conexion.php';
       $conexion = new conexion();
       $oradores= $conexion->consultar("SELECT * FROM `oradores`");
       include_once("../includes/header.php");
       include_once("../includes/main_listado.php");
       include_once("../includes/footer.php");
?>