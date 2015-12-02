<?php

require '../../../clases/AutoCarga.php';

$id = Request::req('idProduct');

$bd = new Database();
$manager = new ManagerProduct($bd);
$product = $manager->get($id);
$manager->delete($product);
$bd->close();
header('Location:phpread.php');

