
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

$stmt = $pdo->prepare('UPDATE CuDan SET TenCD = ?, GioiTinh = ?, SDT = ?, NgSinh = ?, QueQuan = ?, MaHo = ?, NgVaoO = ? WHERE MaCD = ?');
$stmt->execute([$TenCD, $GioiTinh, $SDT, $NgSinh, $QueQuan, $MaHo, $NgVaoO, $MaCD]);

header('Location: cudan.php');
?>
