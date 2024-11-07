<?php
session_start();
include './admin/db.php';

// // Check if the user is logged in
// if (!isset($_SESSION['username'])) {
//     header('Location: index.php');
//     exit();
// }

// Fetch total dues count
$totalDuesQuery = "SELECT COUNT(*) AS total_dues FROM dues";
$totalDuesResult = $conn->query($totalDuesQuery);
$totalDues = $totalDuesResult->fetch_assoc()['total_dues'];

// Fetch total paid dues
$totalPaidQuery = "SELECT SUM(total_due - remaining_due) AS total_paid FROM dues WHERE status = 'paid'";
$totalPaidResult = $conn->query($totalPaidQuery);
$totalPaid = $totalPaidResult->fetch_assoc()['total_paid'] ?: 0;  // Handle NULL case

// Fetch remaining dues
$totalRemainingQuery = "SELECT SUM(remaining_due) AS total_remaining FROM dues WHERE status = 'unpaid'";
$totalRemainingResult = $conn->query($totalRemainingQuery);
$totalRemaining = $totalRemainingResult->fetch_assoc()['total_remaining'] ?: 0;  // Handle NULL case
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dues Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Dues Dashboard</h1>

        <div class="row">
            <!-- Total Dues Card -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Dues</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $totalDues ?></h5>
                        <p class="card-text">Total number of dues.</p>
                    </div>
                </div>
            </div>

            <!-- Total Paid Dues Card -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Paid</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= number_format($totalPaid, 2) ?> BDT</h5>
                        <p class="card-text">Total amount of paid dues.</p>
                    </div>
                </div>
            </div>

            <!-- Remaining Dues Card -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Remaining Dues</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= number_format($totalRemaining, 2) ?> BDT</h5>
                        <p class="card-text">Total amount of unpaid dues.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
