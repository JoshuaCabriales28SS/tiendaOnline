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
                    <button onclick="mostrarCarrito()" class="add-to-cart">
                        <span>Carrito</span>
                        <svg class="morph" viewBox="0 0 64 13">
                            <path d="M0 12C6 12 17 12 32 12C47.9024 12 58 12 64 12V13H0V12Z" />
                        </svg>
                        <div class="cart">
                            <svg viewBox="0 0 36 26">
                                <path d="M1 2.5H6L10 18.5H25.5L28.5 7.5L7.5 7.5" class="shape" />
                                <path
                                    d="M11.5 25C12.6046 25 13.5 24.1046 13.5 23C13.5 21.8954 12.6046 21 11.5 21C10.3954 21 9.5 21.8954 9.5 23C9.5 24.1046 10.3954 25 11.5 25Z"
                                    class="wheel" />
                                <path
                                    d="M24 25C25.1046 25 26 24.1046 26 23C26 21.8954 25.1046 21 24 21C22.8954 21 22 21.8954 22 23C22 24.1046 22.8954 25 24 25Z"
                                    class="wheel" />
                                <path d="M14.5 13.5L16.5 15.5L21.5 10.5" class="tick" />
                            </svg>
                        </div>
                    </button>

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
                        <a class="pagar btn btn-verde" href="/pagar.php">Pagar</a>
                    </div>

                    <?php if(!$auth): ?>
                        <a href="/login.php" aria-label="User Login Button" tabindex="0" role="button" class="user-profile">
                            <div class="user-profile-inner">
                                <svg
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                >
                                <g data-name="Layer 2" id="Layer_2">
                                    <path
                                    d="m15.626 11.769a6 6 0 1 0 -7.252 0 9.008 9.008 0 0 0 -5.374 8.231 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 9.008 9.008 0 0 0 -5.374-8.231zm-7.626-4.769a4 4 0 1 1 4 4 4 4 0 0 1 -4-4zm10 14h-12a1 1 0 0 1 -1-1 7 7 0 0 1 14 0 1 1 0 0 1 -1 1z"
                                    ></path>
                                </g>
                                </svg>
                                <p>Iniciar Sesión</p>
                            </div>
                        </a>
                    <?php else: ?>
                        <a href="/cerrar-sesion.php" aria-label="User Login Button" tabindex="0" role="button" class="user-profile">
                            <div class="user-profile-inner">
                                <svg
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                >
                                <g data-name="Layer 2" id="Layer_2">
                                    <path
                                    d="m15.626 11.769a6 6 0 1 0 -7.252 0 9.008 9.008 0 0 0 -5.374 8.231 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 9.008 9.008 0 0 0 -5.374-8.231zm-7.626-4.769a4 4 0 1 1 4 4 4 4 0 0 1 -4-4zm10 14h-12a1 1 0 0 1 -1-1 7 7 0 0 1 14 0 1 1 0 0 1 -1 1z"
                                    ></path>
                                </g>
                                </svg>
                                <p>Cerrar Sesión</p>
                            </div>
                        </a>
                        <a class="btn btn-azulOsc btn_login" href="/admin/index.php">Administrar</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </header>