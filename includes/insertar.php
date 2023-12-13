<?php ob_start(); #esto evita los errores de envios de headers
    set_error_handler("var_dump");
    include 'conexion.php';
    session_start();
?>
<?php if ($_POST) {
        # Validación de campos obligatorios
        $errores = [];
        
        if (empty($_POST['nombre'])) {
            $errores['nombre'] = 'El campo nombre es obligatorio.';
        }
        if (empty($_POST['apellido'])) {
            $errores['apellido'] = 'El campo apellido es obligatorio.';
        }
        if (empty($_POST['email'])) {
            $errores['email'] = 'El campo email es obligatorio.';
        }
        if (empty($_POST['tema'])) {
            $errores['tema'] = 'El campo tema es obligatorio.';
        }
        if (empty($_FILES['archivo']['name'])) {
            $errores['archivo'] = 'Debe subir una imagen.';
        }

        # Si no hay errores, procede con la inserción en la base de datos
        if (count($errores) == 0) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $categoria=$_POST['categoría'];
            $tema = $_POST['tema'];

            # Manejo de la imagen
            $imagen = $_FILES['archivo']['name'];
            $imagen_temporal = $_FILES['archivo']['tmp_name'];
            $fecha = new DateTime();
            #hago que la imagen sea uno e irrepetible
            $imagen = $fecha->getTimestamp() . "_" . $imagen;
            move_uploaded_file($imagen_temporal, "../assets/upload/" . $imagen);

            # Instancia de la clase de conexión
            $conexion = new conexion();


            # Preparar y ejecutar la consulta de forma segura
            $sql="INSERT INTO `oradores` (`id_orador`, `nombre`, `apellido`, `email`, `categoria`, `tema`,`imagen`) VALUES (NULL, '$nombre' , '$apellido','$email','$categoria', '$tema','$imagen')";
           
           
            $id_orador = $conexion->ejecutar($sql);

            header("Location: ../index.php");
           
            # Redireccionar para evitar reenvíos del formulario
          /*   if (isset( $_SESSION['usuario'])=='Admin') {
                header("Location: ../pages/listado_admin.php");
            }else{
                header("Location: ../index.php");
            } */
           
            exit; #die();
        } else {
            # Manejar los errores, por ejemplo, mostrarlos en el formulario
            foreach ($errores as $campo => $mensaje) {
                echo "Error en $campo: $mensaje<br>";
            }
        }
    }?>

