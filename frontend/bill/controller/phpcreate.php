<?php

require '../../../clases/AutoCarga.php';

$bd = new Database();
$manager = new ManagerBill($bd);
$manager->insert(new Bill(NULL, 'open','NOW'));

header('Location:../../index.php');

