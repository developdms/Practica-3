<?php
require '../../../clases/AutoCarga.php';

$bd = new Database();
$manager = new ManagerOrderDetail($bd);

$params = Request::reqFull();
$idBill = $params['idBill'];
$products = $params['idProduct'];
$amounts = $params['amount'];

$p['idBill'] = $idBill;

for($i=0; $i<count($products);$i++){
    $p['idProduct'] = $products[$i];
    $res = $manager->read($p);
    if($res){
        $res->setAmount($res->getAmount()+$amounts[$i]);
        $manager->set($res);
    }else{
        $managerP = new ManagerProduct($bd);
        $product = $managerP->get($products[$i]);
        $manager->insert(new OrderDetail(NULL,$amounts[$i],$product->getPrice(),$idBill,$product->getIdProduct()));
    }
}

$bd->close();
header('Location:../../bill/viewbill.php?idBill='.$idBill);
