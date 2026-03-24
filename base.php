<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>
    <div class="barra_nav">
        <div class="contenedor">
            <nav class="navegacion">
                <?php while($categoria = mysqli_fetch_assoc($resultado)): ?>
                    <a href="categoria.php?id=<?php echo $categoria['id'];?>"> <?php echo $categoria['nombre']; ?> </a>
                <?php endwhile; ?>
            </nav>
        </div>
    </div>
    
    <main>
        <div class="contenedor">
            <h1>BASE PARA TRABAJAR</h1>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>