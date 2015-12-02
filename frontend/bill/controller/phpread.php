<?php

require '../../../clases/AutoCarga.php';

$session = new Session();
$bd = new Database();
$manager = new ManagerDevice($bd);
$device = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
$manager = new ManagerBill($bd);
$billes = array();
if ($device->getRol() === 'term') {
    $params['status'] = 'open';
    $billes = $manager->getList($params);
} else {
    $params = Request::reqFull();
    $p = array();
    foreach ($params as $key => $value) {
        if ($value !== '' && $value !== 'todos') {
            $p[$key] = $value;
        }
    }
    if (count($p) === 0) {
        $billes = $manager->getList();
    }else{
        $billes = $manager->getListTime($p);
    }
}
$session->set('billes', $billes);
header('Location:../viewread.php');
