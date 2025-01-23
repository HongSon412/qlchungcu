
<?php
include '../config/database.php';

$MaCD = $_POST['MaCD'];
$TenCD = $_POST['TenCD'];
$GioiTinh = $_POST['GioiTinh'];
$SDT = $_POST['SDT'];
$NgSinh = $_POST['NgSinh'];
$QueQuan = $_POST['QueQuan'];
$MaHo = $_POST['MaHo'];
$NgVaoO = $_POST['NgVaoO'];

$stmt = $pdo->prepare('INSERT INTO CuDan (MaCD, TenCD, GioiTinh, SDT, NgSinh, QueQuan, MaHo, NgVaoO) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$MaCD, $TenCD, $GioiTinh, $SDT, $NgSinh, $QueQuan, $MaHo, $NgVaoO]);

header('Location: cudan.php');
?>
