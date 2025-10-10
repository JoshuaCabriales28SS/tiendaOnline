<?php
    require 'includes/app.php';
    incluirTemplate('header', $inicio = true);
?>

    <div class="banner">
        <div class="contenedor">
            <div class="banner-contenido">
                <h2>Los productos de mejor calidad</h2>
                <h3>Shop-Corner</h3>
            </div>
        </div>
    </div>

<?php
    incluirTemplate('navegacion');
?>

    <main>
        <div class="contenedor">
            <h1>BASE PARA TRABAJAR</h1>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>