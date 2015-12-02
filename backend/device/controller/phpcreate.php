<?php

require '../../../clases/AutoCarga.php';

$param = Request::reqFull();
$param['idUser'] = NULL;
$bd = new Database();
$user = new User();
$user->set($param);
$manager = new ManagerUser($bd);

if ($manager->login($user)) {
    $p['userName'] = $param['user'];
    $user = $manager->read($p);
    $manager = new ManagerDevice($bd);
    $device = new Device();
    $device->set($param);
    if ($user !== NULL) {
        $device->setIdUser($user->getIdUser());
    }

    $r = $manager->insert($device);

}

$session = new Session();
$session->erase('firsttime');
$bd->close();

header('Location:../../../index.php');

