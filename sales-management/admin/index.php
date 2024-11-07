<?php  
    require_once "./header.php";
?>

    <?php require_once "./sidebar.php" ?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "./top-header.php" ?>
        <?php
include 'db.php';

$totalProductSales = $conn->query("SELECT SUM(price * quantity) AS total FROM regular_sales")->fetch_assoc()['total'];
$totalPhotocopySales = $conn->query("SELECT SUM(total_price) AS total FROM photocopy_sales")->fetch_assoc()['total'];
$totalMobileSales = $conn->query("SELECT SUM(amount) AS total FROM mobile_sales")->fetch_assoc()['total'];
$totalDues = $conn->query("SELECT SUM(total_due) AS total FROM dues WHERE status = 'Unpaid'")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daily Sales Overview</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Product Sales</h5>
                    <p>Total: BDT <?php echo $totalProductSales ?: '0.00'; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Photocopy Sales</h5>
                    <p>Total: BDT <?php echo $totalPhotocopySales ?: '0.00'; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Mobile Banking</h5>
                    <p>Total: BDT <?php echo $totalMobileSales ?: '0.00'; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Dues</h5>
                    <p>Unpaid: BDT <?php echo $totalDues ?: '0.00'; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

    </div>
    
    <?php require_once "./footer.php" ?>