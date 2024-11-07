<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_role"] !== 'admin') {
    header("Location: ../index.php"); // Redirect to login if not an admin
    exit();
}
?>