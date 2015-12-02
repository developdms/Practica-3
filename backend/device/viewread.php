<?php
require '../../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
if (!$d) {
    $bd->close();
    header('Location:../../index.php');
}
$session = new Session();
$devices = $session->get('devices');
$session->erase('devices');
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
            <form method="POST" action="controller/phpread.php">
                <label>Buscar dispositivo: <br/><input type="text" name="idDevice" id="idDevice"/></label>
                <input type="submit" value="BUSCAR"/>
            </form> 
            <table>
                <?php if (count($devices) === 0) { ?>
                    <tr><td colspan="3">No se han encontrado dispositivos</td></tr>
                <?php
                } else {
                    foreach ($devices as $value) {
                        ?>
                        <tr><td><?= $value->getIdDevice() ?></td><td><?= $value->getRol() ?></td><td><a href="viewedit.php?idDevice=<?= $value->getIdDevice() ?>">Editar</a></td><td><a href="controller/phpdelete.php?idDevice=<?= $value->getIdDevice() ?>">Eliminar</a></td></tr>
                    <?php
                    }
                }
                ?>
            </table>
        </div>
    </body>
</html>
