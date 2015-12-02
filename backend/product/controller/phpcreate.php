<?php
require '../../../clases/AutoCarga.php';

$params = Request::reqFull();
$file = new FileManager('image');
$params['image'] = $params['description'].'.'.$file->getExtension();


$bd = new Database();
$manager = new ManagerProduct($bd);

$product = new Product();
$product->set($params);

$manager->insert($product);
$r = $manager->getError();
$bd->close();

header('Location:phpread.php');

