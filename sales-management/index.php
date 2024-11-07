<?php
session_start();
include './admin/db.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: ./admin'); // Redirect to dashboard after login
            exit();
        } else {
            $errorMessage = 'Invalid username or password';
        }
    } else {
        $errorMessage = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($errorMessage): ?>
                            <div class="alert alert-danger"><?= $errorMessage ?></div>
                        <?php endif; ?>
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 text-center">
        <a href="./admin/due_llist.php" class="btn btn-success">View Due List</a>
    </div>
    <div class="container mt-5 text-center">
        <a href="./due_dashboard.php" class="btn btn-success">View Due Dashboard</a>
    </div>
</body>
</html>
