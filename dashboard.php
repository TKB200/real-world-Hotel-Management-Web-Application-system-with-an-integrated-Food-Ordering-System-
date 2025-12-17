<?php
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("location: login.php");
    exit;
}

$role = $_SESSION['role'];

// Redirect to specific dashboard based on role
switch ($role) {
    case 'admin':
        header("location: admin/dashboard.php");
        break;
    case 'receptionist':
        header("location: admin/room_management.php"); // Or a specific staff page
        break;
    case 'kitchen':
        header("location: kitchen/index.php");
        break;
    case 'customer':
        header("location: customer/dashboard.php");
        break;
    default:
        // Default to home page if role is unknown
        header("location: index.php");
        break;
}
exit;
?>