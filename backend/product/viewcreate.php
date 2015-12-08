<?php
require '../../clases/AutoCarga.php';
$msj = "";
if (Request::req('e') === '1062') {
    $msj = "El producto ya existe.<br/>Puedes editarlo o cambiar el nombre del nuevo producto a insertar";
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
            <h3>Nuevo producto</h3>
            <label><?= $msj ?></label>
            <form method="POST" action="controller/phpcreate.php" enctype="multipart/form-data">
                <label>Nombre de producto:<input type="text" name="description" id="description"/></label>
                <label>Precio (€):<input type="number" name="price" id="price"/></label>
                
                <input type="submit" value="GUARDAR"/>
            </form>
        </div>
    </body>
</html>
