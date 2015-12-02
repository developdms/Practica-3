<?php
require '../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
if (!$d) {
    $bd->close();
    header('Location:../../index.php');
}
$manager = new ManagerBill($bd);
$params['status'] = 'open';
$billes = $manager->getList($params);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="wrapper">
            <a href="bill/controller/phpcreate.php">Nueva factura</a>
            <form method="POST" action="bill/viewbill.php">
                <?php foreach ($billes as $key => $value) { ?>
                    <input type="submit" name="idBill" value="Factura <?= $value->getIdBill() ?> "/>
                <?php } ?>
            </form>
        </div>
    </body>
</html>
<?php
$bd->close()?>