<?php

require '../../../clases/AutoCarga.php';

$bd = new Database();
$manager = new ManagerOrderDetail($bd);
$details = Request::reqFull();

