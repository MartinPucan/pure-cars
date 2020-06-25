<?php

require 'partials/header.php';
require '../src/Service/UrlService.php';
require 'src/Repository/CarRepository.php';

$carRepository = new CarRepository;
$urlService = new UrlService;
[$carId] = $urlService->getUrlParameters();
$car = $carRepository->findOne($carId);



?>

<div class="container">
    <div class="m-2 d-flex">
        <button class="btn btn-info ml-auto">
            <a href="" class="text-white">Back</a>
        </button>
    </div>

    <div class="detail-card">
        <div class="shadow p-3 m-auto bg-light rounded-1">
            <table class="table">
                <tbody>
                    <tr>
                      <th scope="row">ID</th>
                      <td><?= $car['id'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Name</th>
                      <td><?= $car['name'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Brand</th>
                      <td><?= $car['brand_name'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Price</th>
                      <td><?= $car['price'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Kilometer</th>
                      <td><?= $car['kilometer'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Registration</th>
                      <td><?= $car['registration'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Fuel Type</th>
                      <td><?= $car['fuel_type'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('partials/footer.php'); ?>
