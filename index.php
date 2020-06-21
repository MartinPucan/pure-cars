<?php

require_once 'database/config.php';
require_once 'database/Connection.php';
$db = new Connection($pdo);
$rows = $db->getCarsByMaxPrice();

print_r($rows);