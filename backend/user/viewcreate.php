<?php
require '../../clases/AutoCarga.php';
$s = new Session();
$msj = '';
if ($s->get('firsttime')) {
    $msj = 'Debes crear obligatoriamente el primer usuario administrador de la aplicación.<br/>'
            . 'Podrás crear nuevos administradores más adelante';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DMS BUSINNES MANAGER</title>
        <link rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        <div id="wrapper">
            
            <h3>Alta de usuarios</h3>
            <label id="msj"><?php echo $msj; ?></label>
            <form method="POST" action="controller/phpcreate.php" id="createform">
                <label>Nombre de usuario</label>
                <input type="text" name="userName" id="username"/>
                <label>Contraseña</label>
                <input type="password" name="password" id="password"/>
                <label>Repite contraseña</label>
                <input type="password" name="rpassword" id="rpassword"/>
                <input type="submit" value="ACEPTAR"/>
            </form>
        </div>
    </body>
    <script src="js/process.js"></script>
</html>
