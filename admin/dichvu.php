
<?php
include '../config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$stmt = $pdo->query('SELECT * FROM DichVu');
$dichvus = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Services</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include '../includes/sidebar.php'; ?>
    <div class="container">
        <h2>Services</h2>
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add Service</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>MaDV</th>
                    <th>TenDV</th>
                    <th>PhiDV</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dichvus as $dv): ?>
                    <tr>
                        <td><?php echo $dv['MaDV']; ?></td>
                        <td><?php echo $dv['TenDV']; ?></td>
                        <td><?php echo $dv['PhiDV']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary editBtn" data-id="<?php echo $dv['MaDV']; ?>" data-tendv="<?php echo $dv['TenDV']; ?>" data-phidv="<?php echo $dv['PhiDV']; ?>" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button type="button" class="btn btn-danger deleteBtn" data-id="<?php echo $dv['MaDV']; ?>" data-toggle="modal" data-target="#deleteModal">Delete</button>
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
                <form method="post" action="add_dichvu.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>MaDV:</label>
                            <input type="text" class="form-control" name="MaDV" required>
                        </div>
                        <div class="form-group">
                            <label>TenDV:</label>
                            <input type="text" class="form-control" name="TenDV" required>
                        </div>
                        <div class="form-group">
                            <label>PhiDV:</label>
                            <input type="text" class="form-control" name="PhiDV" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="edit_dichvu.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="MaDV" id="editMaDV">
                        <div class="form-group">
                            <label>TenDV:</label>
                            <input type="text" class="form-control" name="TenDV" id="editTenDV" required>
                        </div>
                        <div class="form-group">
                            <label>PhiDV:</label>
                            <input type="text" class="form-control" name="PhiDV" id="editPhiDV" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="delete_dichvu.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this service?</p>
                        <input type="hidden" name="MaDV" id="deleteMaDV">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.editBtn').on('click', function() {
                $('#editMaDV').val($(this).data('id'));
                $('#editTenDV').val($(this).data('tendv'));
                $('#editPhiDV').val($(this).data('phidv'));
            });

            $('.deleteBtn').on('click', function() {
                $('#deleteMaDV').val($(this).data('id'));
            });
        });
    </script>
</body>
</html>
