<?php 
ob_start();
function paginaOrigen($origen) {
    if ($origen == "anotarse-orador") {
        header("Location: ../index.php#anotarse-orador");
    } else if ($origen == "formulario-compra") {
        header("Location: ../pages/comprar-tickets.php#form-compra");
    } else {
        header("Location: ../index.php"); 
    }
    exit;
}

// Capturamos página de origen del logueo
$origen = '';
if (isset($_GET['origen'])) {
    $origen = $_GET['origen'];
}

// Validar datos
if ($_POST) {
    $usuario = htmlentities(addslashes($_POST["usuario"]));
    $password = htmlentities(addslashes($_POST["password"]));

    try {
        include 'conexion.php';
        $conexion = new conexion();

        // Consulta segura con parámetros
        $sql = "SELECT * FROM `usuarios` WHERE `usuario` = :usuario";
        $resultado = $conexion->consultarConParametros($sql, ['usuario' => $usuario]);

        $contador = 0; 
        $admin = 0;  

        foreach ($resultado as $registro) {
            if (password_verify($password, $registro["password"])) {
                $contador++;
                if ($registro["admin"] == "s") {
                    $admin++;
                }
            }
        }

        if ($contador === 1) { 
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['logueado'] = 's'; 
            $_SESSION['administrador'] = ($admin === 1) ? 's' : 'n';
            paginaOrigen($origen);
        } else {
            echo "<p>Usuario incorrecto</p>"; 
            paginaOrigen($origen);
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
include_once("../includes/header.php");
include_once("../includes/main_login.php");
include_once("../includes/footer.php");
?>