<?php

class Connection
{
    public $pdo;

    public function __construct()
    {
        ['host' => $host, 'database' => $database, 'user' => $user, 'password' => $password] = $this->getConfig();

        $this->pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
    }

    public function getAllCars(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM car');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCarsByMaxPrice(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM car ORDER BY price DESC');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCar()
    {

    }

    public function createCar()
    {

    }

    private function getConfig(): array
    {
        $config = file_get_contents(__DIR__ . '/config.json');

        if (!$config) {
            echo 'Config not found!';
            die;
        }

        return json_decode($config, true) ?? [];
    }
}