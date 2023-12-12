<?php ob_start();
/* session_start(); */ ?>



<?php 

    #capturamos página de origen del logueo
   if($_GET){
     
      $origen=$_GET['origen'];
    
   }






    #validar datos
    if ($_POST){
  
      $variable=$_POST['variable'];
      echo "<p>variable: " . $variable . "</p>";
    
       
        #RUTA de destino según ruta de origen:

        $origen=$_POST['origen'];

         function paginaOrigen($origen){
          if ($origen=="anotarse-orador") {
            header("Location: ../index.php#anotarse-orador");
        }else if ($origen=="formulario-compra") {
            header("Location: ../pages/comprar-tickets.php#form-compra");
        }
        else{
             header("Location: ../index.php"); 
  
        }
        }
 






        
      try {

        $usuario=htmlentities(addslashes(($_POST["usuario"])));
        $password=htmlentities(addslashes(($_POST["password"])));
        

        require_once("datos_conexion.php");

        $contador=0; 
        $admin=0;  

        $conexion=new PDO("mysql:host=" . $db_host . "; dbname=" . $db_nombre ,  $db_usuario , $db_contrasena);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conexion->exec("SET CHARACTER SET utf8");


        //buscamos por nombre de usuario
        
        $sql="SELECT * FROM Usuarios WHERE usuario= :usuario";

        $resultado=$conexion->prepare($sql);

       

        $resultado->execute(array(":usuario"=>$usuario));


        while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
          
            if (password_verify($password, $registro["password"])) {
                
                $contador++;
            }
            if($registro["admin"]=="s"){
              $admin++;
            }


        }




        if ($contador===1) { //lo puse yo al "1", puede ser if($contador>0)
          session_start();

          
          
          if($admin===1){
           

         #  Administrador
            $_SESSION['usuario']=$usuario;
            $_SESSION['logueado']='s'; 
            $_SESSION['administrador']='s';
            paginaOrigen($origen);
                
      
        
        die();
       // exit;
        }else{

          #USUARIO COMÚN
          $_SESSION['usuario']=$usuario;
          $_SESSION['administrador']='n';
          $_SESSION['logueado']='s'; 
                
           paginaOrigen($origen);
        
        die();
       // exit;
        }
     

           // header("Location: pagina de destino para registrados correctamente.php");

       
        }else{
            echo "<p>Usuario incorrecto</p>"; 
            paginaOrigen($origen);
        }




      




        $resultado->closeCursor();

   // .........DUDA MÍA: FALTARÍA VER CÓMO SE PUEDE AGREGAR A ESTO UNA COOKIE QUE GUARDE EL PASSWORD
   // DE MANERA SEGURA (SI ES QUE EXISTE UNA FORMA SEGURA).....................



/* 
        $numero_registros=$resultado->rowCount();

        if ($numero_registros!=0) {
            
            $autenticado=true;

            if (isset($_POST["recordar"])) {
                
                //creamos la cookie que recuerda el nombre de usuario

            */   /*   setcookie("nombre_usuario", $_POST["login"], time()+86400);

            }

        }else{

            echo "Error: Usuario o contraseña incorrectos";
        
        } */

       } catch (Exception $e) {
           
           die("Error: " . $e->getMessage());

            
       }
   















        
/* 

   #conexion a la base
        include 'conexion.php'; 

        $usuario=$_POST['usuario'];
        
        $password=$_POST['password'];
        $conexion = new conexion(); # me conecto a la base de datos
        
      
         $user= $conexion->consultar("SELECT * FROM `Usuarios` where `usuario` =' . $usuario . 'and `password`=' . $password . '");
       
         
        
        echo $user['usuario'];*/
        /*$user['Password']; 
        $user['Administrador']; */  #tiene que ser un campo de la base de datos de la tabla usuarios
        
    
        
      #mail
      #contraseña
      #es_admin s o n 
      /*
      select mail, pass
      from usuarios where
      es_admin = 'S';*/



      /* USUARIOS["mail"] 

        if( ($_POST['usuario']=="administrador") && ($_POST['password']=='cac') ){
        */  
        
        /*  if($usuario==$user['usuario'] && $password==$user['password']){
          if($user['admin']=="si"){
              $_SESSION['usuario']="Admin";
              $_SESSION['logueado']="S";
                 
          header("location:../index.php");
          
          die();
         // exit;
          }else{
            $_SESSION['usuario']=$user[1];
              $_SESSION['logueado']='S';
                 
          header("location:../index.php");
          die();
         // exit;
          }
       
        
        }else{

            # aca me da igual quien se loguea
           #$_SESSION['usuario'] = $_POST['usuario'];
          

            echo "<p>Usuario o contraseña incorrecto</p>";
/* 
          header("location:../index.php"); 
          
           die();
        } */
      }
    ?>

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

  <title>Login</title>
</head>



<body class="body">

    <?php include_once("../includes/header.php")?>
    <?php include_once("../includes/main_login.php")?>
    <?php include_once("../includes/footer.php")?>