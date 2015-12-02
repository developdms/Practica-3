<?php
    require '../../clases/AutoCarga.php';
    $session = new Session();
    $billes = $session->get('billes');
    $bd = new Database();
    $manager = new ManagerOrderDetail($bd);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        <h3>Gestión de facturas</h3>
        <form method="POST" action="controller/phpread.php">
            <label>Filtrar por estado:<br/><select name="status" id="status"><option value="todos">Todos</option><option value="open">Abierto</option><option value="close">Cerrado</option></select></label><br/>
            <label>Filtrar por fecha: <br/>desde <input type="datetime-local" name="fechaini" id="fechaini"/> hasta <input type="datetime-local" name="fechafin" id="fechafin"/></label><br/>
            <input type="submit" value="buscar"/>
        </form>
        <table>
            <?php if($billes){?>
            <tr><td>Identificador</td><td>Precio</td><td>Fecha</td><td>Acciones</td></tr>
        <?php
        foreach ($billes as $key => $value) { $p['idBill']=$value->getIdBill()?>
            <tr><td>Factura <?= $value->getIdBill()?></td><td><?= $manager->sum($p) ?> €</td><td><?= $value->getInfoDateTime()?></td><td><a href="?idBill=<?= $value->getIdBill()?>">Editar factura</a></td><td><a href="?idBill=<?= $value->getIdBill()?>">Cerrar factura</a></td></tr>
            <?php } }?>
        </table>
    </body>
</html>
<?php $bd->close()?>