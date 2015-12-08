<?php
require '../../clases/AutoCarga.php';
$idBill = Request::get('idBill');
$session = new Session();
$products = $session->get('products');
$orderDetail = $session->get('idOrderDetail');
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
            <h3>Lista de productos</h3>
            <form method="POST" action="../orderdetail/controller/create.php"/>
            <input type="hidden" name="idBill" value="<?= $idBill ?>"/>
            <table>
                <?php if (count($products) > 0) { ?>  
                <tr><td class="head">Producto</td><td class="head">Precio por unidad</td><td class="head">Cantidad</td></tr>
                    <?php foreach ($products as $key => $value) { ?>
                        <tr>
                            <td><input type="hidden" name="idProduct[]" value="<?= $value->getIdProduct() ?>"/><?= $value->getDescription() ?></td>
                            <td><?= $value->getPrice() ?> €</td>
                            <td><input type="number" name="amount[]" value="0" min="0"/>
                        </tr>    
                    <?php } ?>
                <?php } else { ?>
                    <tr><td>No hay productos</td></tr>
                <?php } ?>
            </table>
            <input type="submit" value="ACEPTAR"/>
        </form>
    </div>
</body>
</html>
<?php $session->erase('products') ?>
