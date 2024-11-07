<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['markPaid'])) {
    $due_id = $_POST['due_id'];
    $amount_paid = $_POST['amount_paid'];

    // Get the current remaining due
    $query = "SELECT remaining_due FROM dues WHERE id = '$due_id'";
    $result = $conn->query($query);
    $due = $result->fetch_assoc();
    $remaining_due = $due['remaining_due'];

    // Calculate the new remaining due
    $new_remaining_due = $remaining_due - $amount_paid;

    // Update the dues record
    if ($new_remaining_due <= 0) {
        $status = 'paid';
        $new_remaining_due = 0; // Ensure remaining_due doesn't go negative
    } else {
        $status = 'unpaid';
    }

    $updateQuery = "UPDATE dues SET remaining_due = '$new_remaining_due', status = '$status' WHERE id = '$due_id'";
    $conn->query($updateQuery);

    header('Location: dues_list.php');
    exit();
}

// Fetch all dues
$query = "SELECT * FROM dues";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dues List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Customers with Dues</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Total Due</th>
                <th>Remaining Due</th>
                <th>Status</th>
                <th>Mark Paid</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['customer_name'] ?></td>
                <td><?= $row['total_due'] ?></td>
                <td><?= $row['remaining_due'] ?></td>
                <td><?= ucfirst($row['status']) ?></td>
                <td>
                    <?php if ($row['status'] === 'unpaid'): ?>
                    <form method="post">
                        <input type="hidden" name="due_id" value="<?= $row['id'] ?>">
                        <input type="number" name="amount_paid" step="0.01" placeholder="Enter amount" required>
                        <button type="submit" name="markPaid" class="btn btn-success btn-sm">Mark Paid</button>
                    </form>
                    <?php else: ?>
                    <button class="btn btn-secondary btn-sm" disabled>Paid</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
