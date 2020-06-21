<?php

$host = 'localhost:8889';
$db = 'cars';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO('mysql:host='. $host .';dbname='. $db, $user, $password);
}

catch (PDOException $e) {
    exit('Something went wrong..');
}
