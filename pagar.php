<?php
    require './includes/app.php';
    incluirTemplate('header');

    $db = conectarDB();

    $query = "SELECT * FROM carrito";
    $resultado = mysqli_query($db, $query);

    $total = 0;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $query = "DELETE FROM carrito";
        $resultado = mysqli_query($db, $query);

        if($resultado){
            header('Location: /index.php');
        }
    }
?>

    <main class="pago contenedor">
        <div class="contenedor pago-contenedor">
            <h1>Forma de pago</h1>
            <div class="productos_pago">
                <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
                    <div class="producto_pago">
                        <p class="nombre-producto_pago">
                            <?php echo $producto['nombre']; ?>
                        </p>
                        <p>
                            <?php echo number_format($producto['precio'], 2, ".", ",") ." x ". $producto['cantidad']; ?>
                        </p>
                        <p>
                            <?php echo number_format($subtotal = $producto['precio'] * $producto['cantidad'], 2, ".", ","); ?>
                            <?php $total += $subtotal; ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
            <hr>
            <h2 class="total-text">
                Total: <?php echo number_format($total, 2, ".", ","); ?>
            </h2>
        </div>
        <div class="contenedor">
            <form method="POST" class="form-pago" action="/pagar.php">
                <fieldset>
                    <div class="campo">
                        <label for="">Numero de tarjeta:</label>
                        <input type="number">
                    </div>
                    <div class="campo">
                        <label for="">CVV:</label>
                        <input type="password">
                    </div>
                    <div class="campo">
                        <label for="">Fecha de expiración</label>
                        <input type="date" name="" id="">
                    </div>
                </fieldset>
                <input class="btn btn-naranja btn-pagar" type="submit" value="Pagar">
            </form>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>