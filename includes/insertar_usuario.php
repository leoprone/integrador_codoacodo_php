<?php ob_start(); #esto evita los errores de envios de headers
    set_error_handler("var_dump");
    include 'conexion.php';
    session_start();
?>
<?php
# cuando alguien quiere grabar un orador se envian los datos a esta pagina, entonces hay envio post
    if ($_POST) {
        # Validación de campos obligatorios
        $errores = [];
        
        if (empty($_POST['usuario'])) {
            $errores['usuario'] = 'El campo usuario es obligatorio.';
        }
        if (empty($_POST['password'])) {
            $errores['password'] = 'El campo password es obligatorio.';
        }
        
       
        # Si no hay errores, procede con la inserción en la base de datos
        if (count($errores) == 0) {

            /* $usuario=htmlentities(addslashes(($_POST["usuario"])));
            $password=htmlentities(addslashes(($_POST["password"])));
             */

           /*  $usuario = $_POST['usuario'];
            $password = $_POST['password']; */
           $origen=$_POST['origen'];





           $usuario=$_POST["usuario"];
           $password=$_POST["password"];
       
           //encriptamos la contraseña
           //PASSWORD_DEFAULT se encarga de agregar la sal de manera automática (lo más 
           // recomendado)
           // el 3er parámetro es el COSTE, cuanto mayor, mayor tiempo y recursos ocupa y
           // mayor seguridad aporta (por defecto es 10, son la posición 4 y 5 del valor encriptado)
           
       
           $pass_encriptado=password_hash($password, PASSWORD_DEFAULT, array("cost"=>12));
       
           try {
       
               require("datos_conexion.php");
                  
               $conexion=new PDO("mysql:host=" . $db_host . "; dbname=" . $db_nombre ,  $db_usuario , $db_contrasena);
       
               $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
               $conexion->exec("SET CHARACTER SET utf8");
       
               //para insertar el usuario, no debe haber una clave primaria, ya que si la hay,
               //habrá que ingresarla, salvo que se setee como AUTO_INCREMENT
               
               $sql="INSERT INTO Usuarios (id, usuario, password, admin) VALUES(NULL, :usu, :contra, NULL)";
       
               $resultado=$conexion->prepare($sql);
       
               $resultado->execute(array(":usu"=>$usuario, ":contra"=>$pass_encriptado));
       
             /*   echo "Registro insertado"; */


             # CREAMOS SESIÓN USUARIO COMÚN
             
          $_SESSION['usuario']=$usuario;
          $_SESSION['administrador']='n';
          $_SESSION['logueado']='s'; 

       
       
           } catch (Exception $e) {
               echo "Línea del error: " . $e->getLine();
           }finally{
               $conexion=null;
           }
       







           /* 
            # Instancia de la clase de conexión
            $conexion = new conexion();

            # Preparar y ejecutar la consulta de forma segura
            $sql="INSERT INTO `usuarios` (`id`, `usuario`, `password`, `admin`) VALUES (NULL, '$usuario' , '$password', NULL)";
            
            $id = $conexion->ejecutar($sql);



            #INICIAMOS SESIÓN del usuario insertado

            $_SESSION['usuario']=$usuario; */
            # Redireccionar para evitar reenvíos del formulario
            /* if (isset( $_SESSION['usuario'])=='Admin') {
                header("Location: ../pages/listado_admin.php");
            }else{
                header("Location: ../index.php");
            }
            */


            #RUTA de destino según ruta de origen:

            if ($origen=="anotarse-orador") {
                header("Location: ../index.php#form-orador");
            }else if ($origen=="formulario-compra") {
                header("Location: ../pages/comprar-tickets.php#form-compra");
            }
            else{
                 header("Location: ../index.php"); 

            }

           
            exit; #die();

        } else {
            # Manejar los errores, por ejemplo, mostrarlos en el formulario
            foreach ($errores as $campo => $mensaje) {
                echo "Error en $campo: $mensaje<br>";
            }
        }
    }?>

