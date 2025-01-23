
<?php
include '../config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$stmt = $pdo->query('SELECT * FROM CuDan');
$cudans = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Residents</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include '../includes/sidebar.php'; ?>
    <div class="container">
        <h2>Residents</h2>
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add Resident</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>MaCD</th>
                    <th>TenCD</th>
                    <th>GioiTinh</th>
                    <th>SDT</th>
                    <th>NgSinh</th>
                    <th>QueQuan</th>
                    <th>MaHo</th>
                    <th>NgVaoO</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cudans as $cd): ?>
                    <tr>
                        <td><?php echo $cd['MaCD']; ?></td>
                        <td><?php echo $cd['TenCD']; ?></td>
                        <td><?php echo $cd['GioiTinh']; ?></td>
                        <td><?php echo $cd['SDT']; ?></td>
                        <td><?php echo $cd['NgSinh']; ?></td>
                        <td><?php echo $cd['QueQuan']; ?></td>
                        <td><?php echo $cd['MaHo']; ?></td>
                        <td><?php echo $cd['NgVaoO']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary editBtn" data-id="<?php echo $cd['MaCD']; ?>" data-tencd="<?php echo $cd['TenCD']; ?>" data-gioitinh="<?php echo $cd['GioiTinh']; ?>" data-sdt="<?php echo $cd['SDT']; ?>" data-ngsinh="<?php echo $cd['NgSinh']; ?>" data-quequan="<?php echo $cd['QueQuan']; ?>" data-maho="<?php echo $cd['MaHo']; ?>" data-ngvaoo="<?php echo $cd['NgVaoO']; ?>" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button type="button" class="btn btn-danger deleteBtn" data-id="<?php echo $cd['MaCD']; ?>" data-toggle="modal" data-target="#deleteModal">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="add_cudan.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Resident</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>MaCD:</label>
                            <input type="text" class="form-control" name="MaCD" required>
                        </div>
                        <div class="form-group">
                            <label>TenCD:</label>
                            <input type="text" class="form-control" name="TenCD" required>
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
                            <label>NgSinh:</label>
                            <input type="date" class="form-control" name="NgSinh" required>
                        </div>
                        <div class="form-group">
                            <label>QueQuan:</label>
                            <input type="text" class="form-control" name="QueQuan" required>
                        </div>
                        <div class="form-group">
                            <label>MaHo:</label>
                            <input type="text" class="form-control" name="MaHo" required>
                        </div>
                        <div class="form-group">
                            <label>NgVaoO:</label>
                            <input type="date" class="form-control" name="NgVaoO">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Resident</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="edit_cudan.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Resident</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="MaCD" id="editMaCD">
                        <div class="form-group">
                            <label>TenCD:</label>
                            <input type="text" class="form-control" name="TenCD" id="editTenCD" required>
                        </div>
                        <div class="form-group">
                            <label>GioiTinh:</label>
                            <input type="text" class="form-control" name="GioiTinh" id="editGioiTinh" required>
                        </div>
                        <div class="form-group">
                            <label>SDT:</label>
                            <input type="text" class="form-control" name="SDT" id="editSDT" required>
                        </div>
                        <div class="form-group">
                            <label>NgSinh:</label>
                            <input type="date" class="form-control" name="NgSinh" id="editNgSinh" required>
                        </div>
                        <div class="form-group">
                            <label>QueQuan:</label>
                            <input type="text" class="form-control" name="QueQuan" id="editQueQuan" required>
                        </div>
                        <div class="form-group">
                            <label>MaHo:</label>
                            <input type="text" class="form-control" name="MaHo" id="editMaHo" required>
                        </div>
                        <div class="form-group">
                            <label>NgVaoO:</label>
                            <input type="date" class="form-control" name="NgVaoO" id="editNgVaoO">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Resident</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="delete_cudan.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Resident</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this resident?</p>
                        <input type="hidden" name="MaCD" id="deleteMaCD">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Edit Modal
            $('.editBtn').on('click', function() {
                $('#editMaCD').val($(this).data('id'));
                $('#editTenCD').val($(this).data('tencd'));
                $('#editGioiTinh').val($(this).data('gioitinh'));
                $('#editSDT').val($(this).data('sdt'));
                $('#editNgSinh').val($(this).data('ngsinh'));
                $('#editQueQuan').val($(this).data('quequan'));
                $('#editMaHo').val($(this).data('maho'));
                $('#editNgVaoO').val($(this).data('ngvaoo'));
            });

            // Delete Modal
            $('.deleteBtn').on('click', function() {
                $('#deleteMaCD').val($(this).data('id'));
            });
        });
    </script>
</body>
</html>

