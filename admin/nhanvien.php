
<?php
include '../config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$stmt = $pdo->query('SELECT * FROM NhanVien');
$nhanviens = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include '../includes/sidebar.php'; ?>
    <div class="container">
        <h2>Employees</h2>
        <a href="add_nhanvien.php" class="btn btn-success mb-2">Add Employee</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>MaNV</th>
                    <th>TenNV</th>
                    <th>GioiTinh</th>
                    <th>SDT</th>
                    <th>DiaChi</th>
                    <th>NgVL</th>
                    <th>LoaiNV</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nhanviens as $nv): ?>
                    <tr>
                        <td><?php echo $nv['MaNV']; ?></td>
                        <td><?php echo $nv['TenNV']; ?></td>
                        <td><?php echo $nv['GioiTinh']; ?></td>
                        <td><?php echo $nv['SDT']; ?></td>
                        <td><?php echo $nv['DiaChi']; ?></td>
                        <td><?php echo $nv['NgVL']; ?></td>
                        <td><?php echo $nv['LoaiNV']; ?></td>
                        <td>
                            <a href="edit_nhanvien.php?id=<?php echo $nv['MaNV']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_nhanvien.php?id=<?php echo $nv['MaNV']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
