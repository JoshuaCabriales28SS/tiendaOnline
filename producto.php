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
        <a class="btn btn-naranja btn-volver" href="/categoria.php?id=<?php echo $producto['categorias_id']; ?>">Volver</a>
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

                        <input class="btn" type="submit" value="Agregar al carrito">
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>