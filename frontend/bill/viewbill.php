<?php
require '../../clases/AutoCarga.php';

$params['idBill'] = Request::req('idBill');

$ini = strpos($params['idBill'], " ");
$end = strripos($params['idBill'], " ");

$params['idBill'] = trim(substr($params['idBill'], $ini, $end-$ini));

$bd = new Database();
$manager = new ManagerOrderDetail($bd);

$orderDetail = $manager->getList($params);
$total = 0;
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
            <h3>Detalle de factura</h3>
        <a href="../product/controller/phpread.php?idBill=<?= $params['idBill']?>&location=all">Añadir productos</a>
        
            <table>
                <tr><td>Producto</td><td>Precio por unidad</td><td>Precio total</td><td>Cantidad</td></tr>
                <?php
                if(count($orderDetail)> 0){
                    $manager = new ManagerProduct($bd);
                foreach ($orderDetail as $key => $value) {
                    $product = $manager->get($value->getIdProduct());
                    $total = $total + ($product->getPrice() * $value->getAmount());
                    ?>
                    <tr><td><?= $product->getDescription() ?></td><td><?= $product->getPrice() ?> €</td><td><?= $product->getPrice() * $value->getAmount() ?> €</td><td><?= $value->getAmount() ?></td></tr> 
                <?php } }?>
                    <tr><td colspan="2">Total factura:</td><td><?= $total ?> €</td><td></td><td>
            </table>
        <a href="controller/phpclose.php?idBill=<?= $params['idBill']?>">Cerrar factura</a>
        <a href="../index.php">Volver</a>
        </div>
    </body>
</html>
