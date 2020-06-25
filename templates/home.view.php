<?php

require 'partials/header.php';
require __DIR__ . '/../database/Database.php';
require __DIR__ . '/../src/Repository/CarRepository.php';

$db = new Database();
$dbb = $db->getConnection();

$carRepository = new CarRepository($dbb);
$cars = $carRepository->findAll();

?>

<div class="container">
    <div class="tc">
        <h1>Cars</h1>
    </div>

    <div class="m-2 d-flex">
        <button class="btn bg-orange ml-auto">
            <a href="/create" class="text-white">Create new record</a>
        </button>
    </div>

    <div class="row border bg-light rounded-1 m-0 mb-2 p-2 tc">
        <div class="col">Nejlevnejsi</div>
        <div class="col">Nejdrazsi</div>
        <div class="col">Nejnovejsi</div>
        <div class="col">Min Km</div>
    </div>

    <table class="table table-hover bg-white rounded">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Kilometers</th>
                <th>Registration</th>
                <th>Fuel Type</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($cars as $car) : ?>
                <tr>
                    <th scope="row"><?= $car['id']; ?></th>
                    <td>
                        <a class="fs-md td_none" href="detail/<?= $car['id'] ?>">
                            <?= $car['brand_name']." ".$car['name']; ?>
                        </a>
                    </td>
                    <td><?= $car['brand_id']; ?></td>
                    <td><?= number_format($car['price']); ?> Kc</td>
                    <td><?= $car['kilometer']; ?> km</td>
                    <td><?= $car['registration']; ?></td>
                    <td><?= $car['fuel_type']; ?></td>
                    <td>
                        <a href="/edit/<?= $car['id'] ?>" class="btn bg-primary text-white">Edit</a>
                        <a href="delete.php" class="btn bg-danger text-white">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>

<?php require('partials/footer.php'); ?>
