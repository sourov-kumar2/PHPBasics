<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $copies = $_POST['copies'];
    $price_per_copy = $_POST['price_per_copy'];
    $total_price = $copies * $price_per_copy;
    $sale_date = $_POST['sale_date'];

    $sql = "INSERT INTO photocopy_sales (copies, price_per_copy, total_price, sale_date) VALUES ('$copies', '$price_per_copy', '$total_price', '$sale_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Photocopy sale recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Photocopy Sales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Record Photocopy Sale</h2>
    <form method="post">
        <div class="form-group">
            <label>Number of Copies</label>
            <input type="number" name="copies" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Price per Copy</label>
            <input type="number" step="0.01" name="price_per_copy" class="form-control" required>
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
