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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $total_due = $_POST['total_due'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO dues (customer_name, total_due, due_date) VALUES ('$customer_name', '$total_due', '$due_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Due recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Record Due</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Record Due</h2>
    <form method="post">
        <div class="form-group">
            <label>Customer Name</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Total Due</label>
            <input type="number" step="0.01" name="total_due" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Due Date</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
    </div>
    
    <?php require_once "./footer.php" ?>
