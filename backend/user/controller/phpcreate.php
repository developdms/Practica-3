<?php

require '../../../clases/AutoCarga.php';

$params['userName'] = Request::req('userName');
$params['password'] = Request::req('password');
$rpass = Request::req('rpassword');

if(Server::getLastAddress() !=='http://localhost/dmsbusinessmanager/backend/user/viewcreate.php'){
    header('Location:../deniedaccess.php');
    exit();
    echo 'Denegado';
}
if(in_array(NULL, $params) || $params['password'] !== $rpass){
   
    header('Location:../viewcreate.php');
    exit();
     
}

$bd = new Database();
$manager = new ManagerUser($bd);
$user = new User(NULL,$params['userName'],  sha1($params['password']));
$res = $manager->insert($user);

$session = new Session();
if($res > 0 && $session->get('firsttime') === '1'){
    $manager->delete(new User(0));
}
$session->erase('firsttime');
$session->destroy();
$bd->close();
header('Location:../../../index.php');
