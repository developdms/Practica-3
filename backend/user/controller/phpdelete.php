<?php

require '../../../clases/AutoCarga.php';

$params['userName'] = Request::req('userName');
$params['password'] = sha1(Request::req('password'));

$bd = new Database();
$manager = new ManagerUser($bd);
$r = -1;
if ($user = $manager->read($params)) {
    $user->setUserName('-' . $user->getUserName());
    $r = $manager->set($user);  
}

$bd->close();
header("Location:../viewdelete.php?e=$r");
exit();

