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
  
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>CSS/estilos-propios.css">
  <link rel="stylesheet" href="compras.css">
 
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/codoacodo-min.png" type="image/x-icon">

  <title>Venta de tickets para Conferencia de Buenos Aires</title>
</head>




<body class="body">

<?php include_once("../includes/header.php");
      include_once("../includes/main_compras.php");
      include_once("../includes/footer_compras.php"); ?>