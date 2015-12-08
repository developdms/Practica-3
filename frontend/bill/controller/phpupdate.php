<?php

    require '../../../clases/AutoCarga.php';
    
    $bd = new Database();
    $manager = new ManagerBill($bd);
    $params = Request::reqFull();
    $bill = $manager->get($params['idBill']);
    $bill->set($params);
    $manager->set($bill);
    header('Location:../../index.php');
    
  