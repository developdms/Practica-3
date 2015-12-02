<?php
require '../../clases/AutoCarga.php';
$session = new Session();
$msj = "";
if ($session->get('firsttime')) {
    $msj = 'No hay equipos administradores registrados.<br/>Para operar debes registrar uno obligatoriamente';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        <div id="wrapper">
            <h3>Registro de dispositivo</h3>
            <label><?= $msj ?></label>
            <form method="POST" action="controller/phpcreate.php">            
                <input type="hidden" name="idDevice" id="idDevice" value="<?= gethostbyaddr($_SERVER['REMOTE_ADDR']) ?>"/>
                <label>Rol:<br/>
                    <select name="rol" id="rol">
                        <?php if ($msj === '') { ?>
                            <option value="term">Terminal de trabajo</option>
                        <?php } ?>
                        <option value="admin">Terminal de administración</option>
                    </select>
                </label><br/>
                <label>Asignar a un usuario:<br/>
                    <input type="text" name="user" id="user" placeholder="Nombre de ususario"/>
                </label><br/>
                <label>Introduce tus credenciales:<br/>
                    <input type="text" name="userName" id="userName" placeholder="Nombre de ususario"/><br/>
                    <input type="password" name="password" id="password" placeholder="Contraseña"/>
                </label><br/>
                <input type="submit" value="ACEPTAR"/>
            </form>
        </div>
    </body>
</html>
