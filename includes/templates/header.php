<?php
    //si no se ha iniciado sesion, se inicia desde el header
    if(!isset($_SESSION)){
        session_start();
    }

    //si no existe o el usuario no se autentico, placeholder de null
    $auth = $_SESSION['login'] ?? null;

    $db = conectarDB();
    $query = "SELECT * FROM carrito";
    $resultado = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE -->
    <link rel="stylesheet" href="/build/css/app.css" as="style">

    <!-- TITLE -->
    <title>Shop-Corner</title>
    <link rel="icon" href="" type="image/png">
</head>
<body>
    <header class="header">
        <div class="contenedor">
            <div class="header-contenido">
                <a href="/index.php">
                    <img src="" alt="Logo Empresa" type="image/png" class="logo">
                </a>

                <div class="botones">
                    <button class="btn btn-verde btn_carrito" onclick="mostrarCarrito()">Ver Carrito</button>

                    <div id="overlay" onclick="cerrarCarrito()"></div>
                    <div id="carrito">
                        <span class="cerrar" onclick="cerrarCarrito()">X</span>
                        <h3>Tu carrito</h3>
                        <ul id="lista-carrito">
                            <!-- AGREGAR PRODUCTOS AL CARRITO -->
                            <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
                                <li>
                                    <?php echo $producto['nombre'].":"; ?> 
                                    <?php echo "$".$producto['precio']; ?> x
                                    <?php echo $producto['cantidad']; ?> = <?php echo "$".number_format( $total = intval($producto['precio']) * intval($producto['cantidad']), 2, ".", ","); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <a class="pagar" href="pagar.php">Pagar</a>
                    </div>
    
                    <?php if(!$auth): ?>
                        <a class="btn btn-azulOsc btn_login" href="/login.php">Iniciar Sesión</a>
                    <?php else: ?>
                        <a class="btn btn-azulOsc btn_login" href="/cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </header>