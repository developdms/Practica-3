<?php
require '../../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
if (!$d) {
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
            <h3>Administración de usuarios</h3>
            <a href="viewread.php">Ver usuarios</a>
            <a href="viewcreate.php">Nuevo Administrador</a>
            <a href="viewupdate.php">Editar mi usuario</a>
            <a href="viewdelete.php">Borrar usuarios</a>
            <a href="../index.php">Volver</a>
        </div>
    </body>
</html>
