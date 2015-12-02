<?php
require '../../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
if (!$d) {
    header('Location:../../index.php');
}
$msj = '';
switch (Request::get('e')) {
    case '1':
        $msj = 'Usuario eliminado';
        break;
    case '0':
        $msj = 'No se ha podido eliminar al usuario<br/>Revisa los datos';
        break;
    case '-1';
        $msj = 'El usuario no existe';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style/style.css"/>
        <link rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        <div id="wrapper">
            <h3>Borrado de usuarios</h3>
            <label><?= $msj ?></label>
            <form method="POST" action="controller/phpdelete.php" id="createform">
                <label>Nombre de usuario</label>
                <input type="text" name="userName" id="username"/>
                <label>Contraseña</label>
                <input type="password" name="password" id="password"/>
                <input type="submit" value="ACEPTAR"/>
            </form>
        </div>
    </body>
    <script src="js/process.js"></script>
</html>
