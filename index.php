<?php

require_once 'src/Repository/CarRepository.php';
$db = new CarRepository;
$rows = $db->findAllByMaxPrice();

print_r($rows);