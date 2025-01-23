<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit();
}

function checkRole($roles) {
    if (!in_array($_SESSION['role'], $roles)) {
        header('Location: no_access.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý chung cư</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>