<?php
require '../../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
if (!$d) {
    header('Location:../../index.php');
}
$e = Request::get('e');
$msj = '';
switch ($e) {
    case '-1':
        $msj = 'El usuario no existe';
        break;
    case '0':
        $msj = 'Usuario no actualizado<br/>Puede ser error de datos introducidos';
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
            <h3>Actualizacion de usuarios</h3>
            <label id="msj"></label>
            <label><?= $msj ?></label>
            <form method="POST" action="controller/phpupdate.php" id="createform">
                <label>Nombre de usuario</label>
                <input type="text" name="userName" id="username"/>
                <label>Contraseña</label>
                <input type="password" name="password_old" id="password_old"/>
                <label>Nueva contraseña</label>
                <input type="password" name="password" id="password"/>
                <label>Repite nueva contraseña</label>
                <input type="password" name="rpassword" id="rpassword"/>
                <input type="submit" value="ACEPTAR"/>
            </form>
        </div>
    </body>
    <script src="js/process.js"></script>
</html>
