<?php

require '../../../clases/AutoCarga.php';

$bd = new Database();
$manager = new ManagerBill($bd);
$manager->insert(new Bill(NULL, 'open'));

header('Location:../../../nodevices.html');


