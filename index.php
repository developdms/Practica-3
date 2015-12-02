<?php

require './clases/AutoCarga.php';
$session = new Session();
$usuario = $session->get('usuario');

$e = Request::req('e');

if (!$e) {
    $bd = new Database();
    $manager = new ManagerUser($bd);

    if ($manager->count() === '0') {
        redirect('Location:backend/user/viewcreate.php');
    }

    $manager = new ManagerDevice($bd);
    if ($manager->count() === '0') {
        redirect('Location:backend/device/viewcreate.php');
    }
    
    $device = $manager->get(gethostbyaddr($_SERVER['REMOTE_ADDR']));
    if(!$device){
        header('Location:backend/device/viewcreate.php');
        exit();
    }else{
        if(($device->getIdUser() !== NULL)){
            if(!$usuario || $usuario->getIdUser() !== $device->getIdUser()){
            header('Location:backend/user/login.html');
            exit();
            }
        }
        if($device->getRol()==='admin'){
            $bd->close();
            header('Location:backend/');
            exit();
        }
        $bd->close();
        header('Location:frontend/');
    }

    
}

function redirect($param) {
    $s = new Session();
    $s->set('firsttime', '1');
    header($param);
    exit();
}
