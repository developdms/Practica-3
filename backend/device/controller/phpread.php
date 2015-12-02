<?php

require '../../../clases/AutoCarga.php';
$bd = new Database();
$manager = new ManagerDevice($bd);
$d = Request::req('idDevice');
$devices = array();
if ($d === NULL) {
    $devices = $manager->getList();
}else{
    $devices[] = $manager->get($d);
}

if (count($devices) > 0) {
    $session = new Session();
    $session->set('devices', $devices);
}

$bd->close();
header('Location:../viewread.php');