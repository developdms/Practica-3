<?php

    require '../../../clases/AutoCarga.php';
    
    $bd = new Database();
    $manager = new ManagerUser($bd);
    
    $params = Request::reqFull();
    $user = new User();
    $user->set($params);
        
    if($manager->login($user)){
        if($params['user'] !== '0'){
        $param['userName'] = $params['user'];
        $user = $manager->read($param);
        }
    }else{
     
    }
    $manager = new ManagerDevice($bd);
    $device = new Device();
    $device->set($params);
    $device->setIdUser($user->getIdUser());
    
    $manager = new ManagerDevice($bd);
    $r = $manager->set($device);
    $bd->close();
    header('Location:../viewread.php?e='.$r);
    
  