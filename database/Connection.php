<?php

class Connection
{
    public $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
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
}