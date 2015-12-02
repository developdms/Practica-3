<?php

require '../../../clases/AutoCarga.php';
$params = Request::reqFull();

$bd = new Database();
$manager = new ManagerProduct($bd);
$products = $manager->getList($params);

if(count($products)>0){
    $session = new Session();
    $session->set('products', $products);
}
$bd->close();
header('Location:../viewread.php');

