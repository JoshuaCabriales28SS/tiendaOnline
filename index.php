<?php
    require 'includes/app.php';
    incluirTemplate('header', $inicio = true);

    $db = conectarDB();

    // se piden las categorias de la db
    $query = 'SELECT * from categorias';

    $resultado = mysqli_query($db, $query);
?>

    <div class="banner">
        <div class="contenedor">
            <div class="banner-contenido">
                <h2>Los productos de mejor calidad</h2>
                <h3>Shop-Corner</h3>
            </div>
        </div>
    </div>

    <div class="barra_nav">
        <div class="contenedor">
            <nav class="navegacion">
                <?php while($categoria = mysqli_fetch_assoc($resultado)): ?>
                    <a href="/tiendaOnline/categoria.php?id=<?php echo $categoria['id'];?>"> <?php echo $categoria['nombre']; ?> </a>
                <?php endwhile; ?>
            </nav>
        </div>
    </div>

    <main>
        <div class="contenedor">
            <div class="eventos">
                <h2>Eventos de la Tienda</h2>
                <div class="evento">
                    <div class="evento-contenido">
                        <img class="evento-img" src="/tiendaOnline/build/img/productos_limpieza.png" alt="banner limpieza">
                        <h3>Mejores productos de limpieza</h3>
                    </div>
                    <a class="btn btn-verde btn-evento" href="/tiendaOnline/categoria.php?id=1">Ver</a>
                </div>
                <div class="evento">
                    <div class="evento-contenido">
                        <img class="evento-img" src="/tiendaOnline/build/img/ropa_primavera.jpg" alt="banner ropa">
                        <h3>Ropa de Primavera</h3>
                    </div>
                    <a class="btn btn-verde btn-evento" href="/tiendaOnline/categoria.php?id=7">Ver</a>
                </div>
                <div class="evento">
                    <div class="evento-contenido">
                        <img class="evento-img" src="/tiendaOnline/build/img/nuevos_celulares.jpg" alt="banner celulares">
                        <h3>Nuevos Modelos de Celulares</h3>
                    </div>
                    <a class="btn btn-verde btn-evento" href="/tiendaOnline/categoria.php?id=2">Ver</a>
                </div>
            </div>
        </div>
    </main>

<?php
    // cerrar conexión con base de datos
    mysqli_close($db);

    incluirTemplate('footer');
?>