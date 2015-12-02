<?php

require '../../../clases/AutoCarga.php';

$bd = new Database();
$manager = new ManagerUser($bd);
$params = array();
$params['userName'] = Request::req('userName');
$params['password'] = sha1(Request::req('password_old'));
$password = Request::req('password');

if ($u = $manager->read($params)) {
    if ($password === Request::req('rpassword')) {
        $u->setPassword(sha1($password));
        $r = $manager->set($u);
        if ($r !== 0) {
            $bd->close();
            header('Location:../../index.php');
        }
    }
    $bd->close();
    header('Location:../viewupdate.php?e=0');
}

$bd->close();
header('Location:../viewupdate.php?e=-1');

