<?php
    require 'includes/app.php';
    incluirTemplate('header');

    //obtener id de la variable que se pasó
    $id=$_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    //si no hay id, se redirecciona
    if(!$id){
        header('Location: /index.php');
    }

    $db = conectarDB();
    
    // Pedir nombre de categoria
    $queryCat = "SELECT * from categorias where id=$id";
    $resultadoCat = mysqli_query($db, $queryCat);
    $resultadoCat = mysqli_fetch_assoc($resultadoCat);

    $query = "SELECT * from productos where categorias_id=$id";

    // LEER RESULTADOS
    $resultado=mysqli_query($db, $query);
    // si no hay productos con esa categoria, se redirecciona
    if($resultado->num_rows === 0){
        header('Location: /index.php');
    }
?>


<main class="categoria-main">
        <a class="btn btn-naranja btn-volver btn-izq" href="/index.php">
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
            <h1> <?php echo $resultadoCat['nombre']; ?> </h1>
            <div class="productos">
                <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
                    <a href="/producto.php?id=<?php echo $producto['id']; ?>">
                        <div class="producto_cat">
                            <img src="images/<?php echo $producto['imagen']; ?>" alt="imagen producto">
                            <div class="producto_cat-contenido">
                                <p class="nombre"><?php echo $producto['nombre'];?></p>
                                <p class="precio">$<?php echo number_format($producto['precio'], 2,  '.', ','); ?></p>
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