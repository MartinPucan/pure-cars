<?php

require 'partials/header.php';
require __DIR__ . '/../database/Database.php';
require __DIR__ . '/../src/Repository/CarRepository.php';

$db = new Database();
$dbb = $db->getConnection();

$carRepository = new CarRepository($dbb);
$carRepository->createOne();

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

}
?>

<div class="container">
    <div class="w-50 m-auto p-2">

        <div class="m-2 d-flex">
            <button class="btn bg-orange ml-auto">
                <a href="/" class="text-white">Back</a>
            </button>
        </div>

        <div class="shadow p-3 mb-5 bg-light rounded-1">
            <h3 class="tc">Create new car</h3>

            <form action="/" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter brand">
                </div>
                <div class="form-group">
                    <label for="brand">Price</label>
                    <input type="number" class="form-control" name="last_name" id="lastName" placeholder="Enter price">
                </div>
                <div class="form-group">
                    <label for="brand">Kilometers</label>
                    <input type="number" class="form-control" name="last_name" id="lastName" placeholder="Enter kilometers">
                </div>
                <div class="form-group">
                    <label for="brand">Registration</label>
                    <input type="number" class="form-control" name="last_name" id="lastName" placeholder="Enter year of registration">
                </div>
                <div class="form-group">
                    <label for="brand">Fuel Type</label>
                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Enter fuel type">
                </div>
                <div class="tc">        
                    <button type="submit" class="btn btn-primary mb-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
//if(!empty($_POST["add_record"])) {
//    require_once("db.php");
//    $sql = "INSERT INTO posts ( post_title, description, post_at ) VALUES ( :post_title, :description, :post_at )";
//    $pdo_statement = $pdo_conn->prepare( $sql );
//
//    $result = $pdo_statement->execute( array( ':post_title'=>$_POST['post_title'], ':description'=>$_POST['description'], ':post_at'=>$_POST['post_at'] ) );
//    if (!empty($result) ){
//        header('location:index.php');
//    }
//}
//?>
<!--<html>-->
<!--<head>-->
<!--    <title>PHP PDO CRUD - Add New Record</title>-->
<!--</head>-->
<!--<body>-->
<!--<div style="margin:20px 0px;text-align:right;"><a href="index.php" class="button_link">Back to List</a></div>-->
<!--<div class="frm-add">-->
<!--    <h1 class="demo-form-heading">Add New Record</h1>-->
<!--    <form name="frmAdd" action="" method="POST">-->
<!--        <div class="demo-form-row">-->
<!--            <label>Title: </label><br>-->
<!--            <input type="text" name="post_title" class="demo-form-field" required />-->
<!--        </div>-->
<!--        <div class="demo-form-row">-->
<!--            <label>Description: </label><br>-->
<!--            <textarea name="description" class="demo-form-field" rows="5" required ></textarea>-->
<!--        </div>-->
<!--        <div class="demo-form-row">-->
<!--            <label>Date: </label><br>-->
<!--            <input type="date" name="post_at" class="demo-form-field" required />-->
<!--        </div>-->
<!--        <div class="demo-form-row">-->
<!--            <input name="add_record" type="submit" value="Add" class="demo-form-submit">-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->


<?php require 'partials/footer.php'; ?>
