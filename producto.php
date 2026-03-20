<?php
    require 'includes/app.php';
    incluirTemplate('header');

    $db = conectarDB();

    //obtener id de la variable que se pasó
    $id=$_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    //si no hay id, se redirecciona
    if(!$id){
        header('Location: /index.php');
    }

    $query = "SELECT * FROM productos WHERE id=$id";
    $resultado = mysqli_query($db, $query);
    $producto = mysqli_fetch_assoc($resultado);

    $errores = [];

    $nombre = '';
    $precio = '';
    $cantidad = '';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $producto_id = $producto['id'];
        $nombre = $producto['nombre'];
        $precio = $producto['precio'];
        $cantidad = mysqli_real_escape_string($db, $_POST['cantidad']);

        if(!$cantidad){
            $errores[] = "Debes elegir una cantidad (minimo 1)";
        }

        if(empty($errores)){
            $queryProd = "INSERT INTO carrito (productos_id, nombre, precio, cantidad) VALUES ('$producto_id','$nombre', '$precio', '$cantidad')";
            $resultadoProd = mysqli_query($db, $queryProd);

            if($resultadoProd){
                header('Location: /index.php');
            }
        }
    }
?>

    <main class="fondo-gris">
        <a class="btn btn-naranja btn-volver" href="/categoria.php?id=<?php echo $producto['categorias_id']; ?>">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#000000"
                stroke-width="1"
                stroke-linecap="round"
                stroke-linejoin="round"
                >
                <path d="M9 14l-4 -4l4 -4" />
                <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
            </svg>
        </a>
        <div class="contenedor">

            <?php foreach($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <div class="producto">
                <img src="images/<?php echo $producto['imagen']; ?>" alt="Producto imagen">
                <div class="producto-info">
                    <p class="producto-nombre"><?php echo $producto['nombre']; ?></p>
                    <p class="producto-precio"><?php echo number_format($producto['precio'], 2, ".", ","); ?></p>
                    <h4>Descripcion:</h4>
                    <ul>
                        <?php echo $producto['descripcion']; ?>
                    </ul>
                    <form action="/producto.php?id=<?php echo $producto['id']; ?>" class="producto-form" method="POST">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" min="1" max="<?php echo $producto['stock']; ?>" >

                        <button class="btn btn-comprar" type="submit">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="#000000"
                                stroke-width="1"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                >
                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M12.5 17h-6.5v-14h-2" />
                                <path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                            </svg>
                            <h3>Comprar</h3>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>