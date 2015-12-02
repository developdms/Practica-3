<?php
    require '../../../clases/AutoCarga.php';
    
    $params = Request::reqFull();
    $bd = new Database();
    $manager = new ManagerUser($bd);
    $user = $manager->login(new User(NULL, $params['userName'], $params['password']));
    $bd->close();
    if($user){
        $session = new Session();
        $session->set('usuario', $user);
        header('Location:../../../index.php');
        exit();
    }
    
    header('Location:../deniedaccess.php');

