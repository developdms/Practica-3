<?php
require '../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
if (!$d) {
    $bd->close();
    header('Location:../../index.php');
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
            <h3>Consola de administración</h3>
            <a href="user/index.php">Gestión de usuarios</a>
            <a href="device/index.php">Gestión de dispositivos</a>
            <a href="product/index.php">Gestión de productos</a>
            <a href="../frontend/bill/viewread.php">Gestión de facturas</a>
          
        </div>
    </body>
</html>
<?php $bd->close() ?>