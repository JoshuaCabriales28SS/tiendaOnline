<?php
    require 'includes/app.php';
    incluirTemplate('header');

    //obtener id de la variable que se pasó
    $id=$_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    //si no hay id, se redirecciona
    if(!$id){
        header('Location: /tiendaOnline/index.php');
    }

    $db = conectarDB();
    
    // Pedir nombre de categoria
    $queryCat = "SELECT * from categorias where id=${id}";
    $resultadoCat = mysqli_query($db, $queryCat);
    $resultadoCat = mysqli_fetch_assoc($resultadoCat);

    $query = "SELECT * from productos where categorias_id=${id}";

    // LEER RESULTADOS
    $resultado=mysqli_query($db, $query);
    // si no hay productos con esa categoria, se redirecciona
    if($resultado->num_rows === 0){
        header('Location: /tiendaOnline/index.php');
    }
?>


<main class="categoria">
        <a class="btn btn-naranja btn-volver btn-izq" href="/tiendaOnline/index.php">Volver</a>

        <div class="contenedor">
            <h1> <?php echo $resultadoCat['nombre']; ?> </h1>
            <div class="productos">
                <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
                    <a href="/tiendaOnline/producto.php?id=<?php echo $producto['id']; ?>">
                        <div class="producto_cat">
                            <img src="images/<?php echo $producto['imagen']; ?>" alt="imagen producto">
                            <div class="producto_cat-contenido">
                                <p class="nombre"><?php echo $producto['nombre'];?></p>
                                <p class="precio"><?php echo $producto['precio']; ?></p>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>