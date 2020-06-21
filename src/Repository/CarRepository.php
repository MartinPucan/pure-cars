<?php
declare(strict_types=1);

class CarRepository
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

    public function createCar()
    {
        // TODO
        $query = $this->pdo->prepare('INSERT INTO car ');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCar($id)
    {
        $query = $this->pdo->prepare('DELETE FROM products WHERE product_id={$id};');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}