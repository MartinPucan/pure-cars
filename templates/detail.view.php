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
            <?= print_r($car) ?>
        </div>
    </div>
</div>

<?php require('partials/footer.php'); ?>