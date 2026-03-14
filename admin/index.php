<?php
    require '../includes/app.php';
    incluirTemplate('header');

    // Conectar a BD
    $db = conectarDB();

    $query = "SELECT * FROM productos";
    $resultadoProductos = mysqli_query($db, $query);

    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if($id){
            //eliminar archivo
            $query = "SELECT imagen FROM productos WHERE id = $id";
            $resultado = mysqli_query($db, $query);
            $producto = mysqli_fetch_assoc($resultado);
            unlink('../imagenes/'.$producto['imagen']);
            
            //eliminar propiedad
            $query = "DELETE FROM productos WHERE id=$id";
            $resultado = mysqli_query($db, $query);
            if($resultado){
                header('Location: /tiendaOnline/admin/index.php?resultado=3');
            }
        }
    }
?>

    <main class="productos">
        <div class="contenedor">
            <h1>Administrador de Inventario</h1>
            
            <?php if(intval($resultado) === 1):?>
                <p class="alerta exito">Producto añadido correctamente</p>
            <?php elseif(intval($resultado) === 2):?>
                <p class="alerta exito">Producto editado correctamente</p>
            <?php elseif(intval($resultado) === 3):?>
                <p class="alerta exito">Producto eliminado correctamente</p>
            <?php endif; ?>

            <div class="interacciones-admin">
                <a class="btn btn-verdeOsc btn-agregar" href="/admin/productos/crear.php">Agregar producto</a>
            </div>

            <table class="productos-tabla">
                <thead>
                    <th>Stock</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Código de Barras</th>
                    <th>Imagen</th>
                </thead>
                <tbody>
                    <?php while($producto = mysqli_fetch_assoc($resultadoProductos)): ?>
                        <tr>
                            <td> <?php echo $producto['stock']; ?> </td>
                            <td> <?php echo $producto['nombre']; ?> </td>
                            <td> <?php echo '$'.number_format($producto['precio'], 2, '.', ','); ?> </td>
                            <td> <?php echo $producto['descripcion']; ?> </td>
                            <td> <?php echo $producto['codigo']; ?> </td>
                            <td>
                                <img src="../images/<?php echo $producto['imagen']; ?>" alt="imagen">
                            </td>
                            <td>
                                <div class="btns-int">
                                    <a class="btn btn-naranja btn-editar btn-margin-bottom" href="productos/editar.php?id=<?php echo $producto['id']; ?>">Editar</a>
                                    <form method="POST" en>
                                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                        <input class="btn btn-rojo btn-eliminar" type="submit" value="Eliminar">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>

<?php
    mysqli_close($db);

    incluirTemplate('footer');
?>