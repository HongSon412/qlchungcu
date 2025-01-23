
<?php
include '../config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MaNV = $_POST['MaNV'];
    $TenNV = $_POST['TenNV'];
    $GioiTinh = $_POST['GioiTinh'];
    $SDT = $_POST['SDT'];
    $DiaChi = $_POST['DiaChi'];
    $NgVL = $_POST['NgVL'];
    $LoaiNV = $_POST['LoaiNV'];

    $stmt = $pdo->prepare('INSERT INTO NhanVien (MaNV, TenNV, GioiTinh, SDT, DiaChi, NgVL, LoaiNV) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$MaNV, $TenNV, $GioiTinh, $SDT, $DiaChi, $NgVL, $LoaiNV]);

    header('Location: nhanvien.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include '../includes/sidebar.php'; ?>
    <div class="container">
        <h2>Add Employee</h2>
        <form method="post">
            <div class="form-group">
                <label>MaNV:</label>
                <input type="text" class="form-control" name="MaNV" required>
            </div>
            <div class="form-group">
                <label>TenNV:</label>
                <input type="text" class="form-control" name="TenNV" required>
            </div>
            <div class="form-group">
                <label>GioiTinh:</label>
                <input type="text" class="form-control" name="GioiTinh" required>
            </div>
            <div class="form-group">
                <label>SDT:</label>
                <input type="text" class="form-control" name="SDT" required>
            </div>
            <div class="form-group">
                <label>DiaChi:</label>
                <input type="text" class="form-control" name="DiaChi" required>
            </div>
            <div class="form-group">
                <label>NgVL:</label>
                <input type="date" class="form-control" name="NgVL" required>
            </div>
            <div class="form-group">
                <label>LoaiNV:</label>
                <input type="text" class="form-control" name="LoaiNV" required>
            </div>
            <button type="submit" class="btn btn-success">Add Employee</button>
        </form>
    </div>
</body>
</html>
