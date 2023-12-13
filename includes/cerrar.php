<?php session_start();
      session_destroy();
      #direcciono a index.php, a la pagina principal
      header("location:../index.php");
      
      die();
?>