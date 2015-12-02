<?php
require '../../clases/AutoCarga.php';
$session = new Session();
$products = $session->get('products');
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
            <h3>Eliminar productos</h3>
            <label></label>
            <form method="POST" action="controller/phpread.php">
                <label>Filtrar por nombre: <input type="text" name="description" id="description"/></label>
                <label>Filtrar por precio: <input type="text" name="price" id="price"/></label>
                <input type="submit" value="BUSCAR"/>
            </form>
            <table>
                <?php if ($products !== NULL) { ?>
                    <tr><td>Nombre</td><td>Precio</td><td>Imagen</td><td colspan="2">Acciones</td></tr>    
                    <?php foreach ($products as $value) { ?>
                        <tr><td><?= $value->getDescription() ?></td><td><?= $value->getPrice() ?></td><td><img src="<?= $value->getImage() ?>" class="tableicon"/></td>
                            <td><a href="viewupdate.php?idProduct=<?= $value->getIdProduct() ?>">Editar</a></td><td><a href="controller/phpdelete.php?idProduct<?= $value->getIdProduct() ?>">Eliminar</a></td></tr>
                    <?php }
                } else {
                    ?>
                    <tr><td>No hay resultados</td></tr>
<?php } ?>
            </table>
            <a href="../../index.php">Volver</a>
        </div>
    </body>
</html>
