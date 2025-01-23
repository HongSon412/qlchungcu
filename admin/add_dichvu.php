
<?php
include '../config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MaDV = $_POST['MaDV'];
    $TenDV = $_POST['TenDV'];
    $PhiDV = $_POST['PhiDV'];

    $stmt = $pdo->prepare('INSERT INTO DichVu (MaDV, TenDV, PhiDV) VALUES (?, ?, ?)');
    $stmt->execute([$MaDV, $TenDV, $PhiDV]);

    header('Location: dichvu.php');
}
?>
