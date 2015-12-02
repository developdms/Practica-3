<?php
require '../../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
if (!$d) {
    $bd->close();
    header('Location:../../index.php');
}
$id = Request::req('idProduct');
$manager = new ManagerProduct($bd);
$product = $manager->get($id);
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
            <form method="POST" action="controller/phpupdate.php">
                <input type="hidden" name="idProduct" id="idProduct" value="<?= $id ?>"/>
                <label>Nombre de producto:<input type="text" name="description" id="description" value="<?= $product->getDescription()?>"/></label>
                <label>Precio (€):<input type="number" name="price" id="price" value="<?= $product->getPrice()?>"/> €</label>
                
                <input type="submit" value="EDITAR"/>
            </form>
        </div>
    </body>
</html>
