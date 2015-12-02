<?php

require '../../../clases/AutoCarga.php';

$params = Request::reqFull();
$file = new FileManager('image');
if ($file->getisFile() !== NULL) {
    $params['image'] = $params['description'] . '.' . $file->getExtension();
}else{
    $params['image'] = NULL;
}

$bd = new Database();
$manager = new ManagerProduct($bd);

$product = new Product();
$product->set($params);

$manager->insert($product);
$r = $manager->getError();
$bd->close();

header('Location:../viewcreate.php?e='.$r);

