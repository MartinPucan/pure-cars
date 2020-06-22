<?php
declare(strict_types=1);

require __DIR__ . '/../../database/BaseRepository.php';

class CarRepository extends BaseRepository
{
    public string $tableName = 'car';

    public function findAllByMaxPrice(): array
    {
        return $this->findAll([
            'orderBy' => [
                'column' => 'price',
                'sortType' => 'DESC'
            ],
            'limit' => 3,
            'where' => ['id' => 1]
        ]);
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