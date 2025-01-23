
<?php
include '../config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MaDV = $_POST['MaDV'];

    $stmt = $pdo->prepare('DELETE FROM DichVu WHERE MaDV = ?');
    $stmt->execute([$MaDV]);

    header('Location: dichvu.php');
}
?>
