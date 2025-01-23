
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

    $stmt = $pdo->prepare('UPDATE DichVu SET TenDV = ?, PhiDV = ? WHERE MaDV = ?');
    $stmt->execute([$TenDV, $PhiDV, $MaDV]);

    header('Location: dichvu.php');
}
?>
