<?php

require 'partials/header.php';
require '../src/Service/UrlService.php';
require '../src/Repository/CarRepository.php';

$carRepository = new CarRepository;
$urlService = new UrlService;
[$carId] = $urlService->getUrlParameters();
$car = $carRepository->findOne($carId);

?>

<div class="container">
    <div class="detail-card">
        <div class="shadow p-3 m-auto bg-light rounded">
            <div><?= ($car['id']) ?></div>
            <div><?= ($car['name']) ?></div>
            <div><?= ($car['price']) ?></div>
            <div><?= ($car['kilometer']) ?></div>
            <div><?= ($car['registration']) ?></div>
            <div><?= ($car['fuel_type']) ?></div>
        </div>
    </div>
</div>

<?php require('partials/footer.php'); ?>