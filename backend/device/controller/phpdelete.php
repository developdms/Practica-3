<?php

require '../../../clases/AutoCarga.php';

$device = Request::req('idDevice');

$bd = new Database();
$manager = new ManagerDevice($bd);
$device = $manager->get($device);

if ($device->getRol() !== 'admin' ||$manager->count($params) !== '1') {
    $r = $manager->delete($device);
    var_dump($r);
    header('Location:phpread.php?e=' . $r);
    exit();
}

header('Location:../../../nodevices.html');


