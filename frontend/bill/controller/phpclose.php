<?php
require '../../../clases/AutoCarga.php';

$bd = new Database();
$manager = new ManagerBill($bd);

$bill = $manager->get(Request::get('idBill'));

if($bill){
    $bill->setStatus('close');
    $manager->set($bill);
}

header('Location:../../index.php');



