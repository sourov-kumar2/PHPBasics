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
        <?php 
        $breadcomb = "Orders";
        require_once "./top-header.php"; 
        ?>
        <?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $sale_date = $_POST['sale_date'];

    $sql = "INSERT INTO regular_sales (product_name, quantity, price, sale_date) VALUES ('$product_name', '$quantity', '$price', '$sale_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Sale recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Sales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Record Product Sale</h2>
    <form method="post">
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Sale Date</label>
            <input type="date" name="sale_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

    </div>
    
    <?php require_once "./footer.php" ?>