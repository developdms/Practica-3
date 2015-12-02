<?php
require '../../clases/AutoCarga.php';
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
        <h3>Administración de dispositivos</h3>
        <a href="viewread.php">Buscar dispositivos</a>
        </div>
    </body>
</html>
