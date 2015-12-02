<?php

require '../../../clases/AutoCarga.php';

$bd = new Database();
$manager = new ManagerProduct($bd);
$params = Request::reqFull();
$product = new Product();
$product->set($params);

$manager->set($product);
$bd->close();
header('Location:phpread.php');



