<?php

require '../../../clases/AutoCarga.php';

$params = Request::reqFull();

$bd = new Database();
$manager = new ManagerUser($bd);
$user = array();
if(in_array('', $params)){
    $user = $manager->getList();
}else{
    $user = $manager->read($params);
}

if($user !== NULL){
    $session = new Session();
    $session->set('usser', $user);
}

$bd->close();
header('Location:../viewread.php');


