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
    $transaction_type = $_POST['transaction_type'];
    $amount = $_POST['amount'];
    $transaction_date = $_POST['transaction_date'];

    $sql = "INSERT INTO mobile_sales (transaction_type, amount, transaction_date) VALUES ('$transaction_type', '$amount', '$transaction_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Mobile banking transaction recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mobile Banking Sales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Record Mobile Banking Sale</h2>
    <form method="post">
        <div class="form-group">
            <label>Transaction Type</label>
            <select name="transaction_type" class="form-control" required>
                <option value="bKash">bKash</option>
                <option value="Nagad">Nagad</option>
            </select>
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Transaction Date</label>
            <input type="date" name="transaction_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

        
    </div>
    
    <?php require_once "./footer.php" ?>