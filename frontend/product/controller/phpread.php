<?php

require '../../../clases/AutoCarga.php';
$params = Request::reqFull();


$location = 'Location:../viewread.php';
if(isset($params['location'])){
    $location = 'Location:../viewall.php?idBill='.$params['idBill'];
    $params = array();
}
$bd = new Database();
$manager = new ManagerProduct($bd);
$products = $manager->getList($params);

if(count($products)>0){
    $session = new Session();
    $session->set('products', $products);
}

header($location);

