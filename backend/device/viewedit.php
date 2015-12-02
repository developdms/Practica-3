<?php
require '../../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
if (!$d) {
    $bd->close();
    header('Location:../../index.php');
}
$manager = new ManagerUser($bd);
$user = $manager->getList();
$manager = new ManagerDevice($bd);
$device = $manager->get(Request::req('idDevice'));
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
            <h3>Edición de dispositivo</h3>
            <form method="POST" action="controller/phpupdate.php">
                <label>Identificador de dispositivo: <input type="text" name="idDevice" id="idDevice" value="<?= $device->getIdDevice() ?>" /></label><br/>
                <label>Tipo de dispositivo:<br/><select name="rol" id="rol">
                        <?php if ($manager->count() !== '1') { ?>
                            <option value="term" <?php
                            if ($device->getRol() === 'term') {
                                echo 'selected';
                            }
                            ?>>Terminal de trabajo</option>
                                <?php } ?>
                        <option value="admin" <?php
                        if ($device->getRol() === 'admin') {
                            echo 'selected';
                        }
                        ?>>Terminal de administración</option>
                    </select></label>
                <label>Vincular a usuario:
                    <select name="user">
                        <option value="0">Sin usuario</option>
                        <?php
                        foreach ($user as $key => $value) {
                            if (strpos($value->getUserName(), '-') !== 0) {
                                ?>
                                <option value="<?= $value->getUserName() ?>" <?php
                                if ($device->getIdUser() === $value->getIdUser()) {
                                    echo 'selected';
                                }
                                ?>><?= $value->getUserName() ?></option>
                                        <?php
                                    }
                                }
                                ?>
                    </select>
                </label>
                <label>Usuario:<input type="text" name="userName"/></label>
                <label>Contraseña:<input type="password" name="password"/></label>
                <input type="submit" value="ACEPTAR"/>
            </form>
        </div>
    </body>
</html>
<?php
$bd->close();
?>