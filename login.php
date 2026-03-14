<?php
    require 'includes/app.php';
    incluirTemplate('header');

    $db = conectarDB();

    $errores = [];

    //autenticar usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //SANITIZACION
        $email = mysqli_real_escape_string($db ,filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email){
            $errores[]="El email es obligatorio o no es valido";
        }
        if(!$password){
            $errores[]="El password es obligatorio";
        }

        if(empty($errores)){
            //revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE correo='$email'";
            $resultado = mysqli_query($db, $query);

            //saber si existe
            if($resultado->num_rows){ //el usuario si existe
                $usuario = mysqli_fetch_assoc($resultado);

                //revisar si el password es correcto (funcion para verificar password, si es true la contraseña es correcta)
                $auth = password_verify($password, $usuario['password']);

                if($auth){
                    //usuario autenticado
                    session_start(); //se inicia sesion

                    //llenar arreglo de sesion con informacion que deseas
                           //variable con lo que quieras tener
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    //redireccionar si se inicio sesion correctamente al administrador
                    header('Location: /admin/index.php');
                }else{
                    $errores[]="El password es incorrecto";
                }

            }else{
                $errores[]="El usuario no existe";
            }
        }
    }
?>

    <main class="login">
        <div class="contenedor">

            <?php foreach($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <div class="login-contenido">
                <h2>Inicio de Sesión</h2>
                <form method="POST">
                    <fieldset>
                        <div class="campos">
                            <label for="usuario">Usuario:</label>
                            <input type="email" id="correo" name="correo">
                        </div>
    
                        <div class="campos">
                            <label for="contraseña">Contraseña:</label>
                            <input type="password" name="password" id="password">
                        </div>
                    </fieldset>
                    <input class="btn btn-verde btn-acceder" type="submit" value="Acceder">
                </form>
            </div>
        </div>
    </main>

<?php
    mysqli_close($db);
    incluirTemplate('footer');
?>