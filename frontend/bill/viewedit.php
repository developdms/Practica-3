<?php
require '../../clases/AutoCarga.php';
$id = Request::req('idBill');
$bd = new Database();
$manager = new ManagerBill($bd);
$bill = $manager->get($id);
$manager = new ManagerOrderDetail($bd);
$params['idBill'] = $id;
$products = $manager->getList($params);
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
            <h3>Edición de factura</h3>
            <label>Factura<?= $id ?></label><br/>
            <form method="POST" action="controller/phpupdate.php">
                <input name="idBill" type="hidden" value="<?= $id ?>"/>
                <label>Estado:<br/>
                    <select name="status">
                        <option value="open" <?php if($bill !== NULL && $bill->getStatus()==='open'){ echo 'selected'; } ?>>Abierta</option>
                        <option value="close" <?php if($bill !== NULL && $bill->getStatus()==='close'){ echo 'selected'; } ?>>Cerrada</option>
                    </select>
                </label><br/>
                <input type="submit" value="Acualizar"/>
            </form>
        </div>
    </body>
</html>
<?php
$bd->close();
?>