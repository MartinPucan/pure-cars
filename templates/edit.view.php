<?php

require 'partials/header.php';
require 'src/Service/UrlService.php';
require 'src/Repository/CarRepository.php';

$carRepository = new CarRepository;
$urlService = new UrlService;
[$carId] = $urlService->getUrlParameters();
$car = $carRepository->findOne($carId);

?>

<div class="container">
    <div class="w-50 m-auto p-2">
        <div class="shadow p-3 mb-5 bg-light rounded-1">
            <h3 class="tc">Edit car</h3>

            <form action="edit.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="<?= $car['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" value="<?= $car['brand_id'] ?>">
                </div>
                <div class="form-group">
                    <label for="brand">Price</label>
                    <input type="text" class="form-control" value="<?= $car['price'] ?>" >
                </div>
                <div class="form-group">
                    <label for="brand">Kilometers</label>
                    <input type="text" class="form-control" value="<?= $car['kilometer'] ?>" >
                </div>
                <div class="form-group">
                    <label for="brand">Registration</label>
                    <input type="text" class="form-control" value="<?= $car['registration'] ?>">
                </div>
                <div class="form-group">
                    <label for="brand">Fuel Type</label>
                    <input type="text" class="form-control" value="<?= $car['fuel_type'] ?>">
                </div>
                <div class="tc">        
                    <button type="submit" class="btn btn-primary mb-2">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'partials/footer.php'; ?>
