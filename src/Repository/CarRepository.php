<?php
declare(strict_types=1);

require_once __DIR__ . '/../../database/Database.php';

class CarRepository
{
    public string $tableName = 'car';
    private PDO $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

     public function findOne($id)
    {
        return $this->findAll(['where' => ['id' => $id]])[0] ?? null;
    }

    public function findAll()
    {
        $sql = <<<SQL
            SELECT car.*, brand.name AS brand_name
            FROM {$this->tableName}
            INNER JOIN brand ON car.brand_id = brand.id
            ORDER BY car.id
        SQL;

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createOne()
    {
        $sql = <<<SQL
        INSERT INTO {$this->tableName} ('name', 'price', 'kilometer', 'registration', 'fuel_type', 'brand_id')
        VALUES (:name, :price, :kilometer, :registration, :fuel_type, :brand_id)
        SQL;

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllByLatestCar()
    {
        $sql = <<<SQL
            SELECT car.*, brand.name AS brand_name
            FROM {$this->tableName}
            INNER JOIN brand ON car.brand_id = brand.id
            ORDER BY car.registration DESC 
        SQL;

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllByHighestPrice()
    {
        $sql = <<<SQL
            SELECT car.*, brand.name AS brand_name
            FROM {$this->tableName}
            INNER JOIN brand ON car.brand_id = brand.id
            ORDER BY car.price DESC 
        SQL;

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllByLowestPrice()
    {
        $sql = <<<SQL
            SELECT car.*, brand.name AS brand_name
            FROM {$this->tableName}
            INNER JOIN brand ON car.brand_id = brand.id
            ORDER BY car.price ASC 
        SQL;

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCar()
    {
        $sql = <<<SQL

        SQL;

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
