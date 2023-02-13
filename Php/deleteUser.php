<?php
include_once '../PHP/connect.php';
include_once '../PHP/select.php';
$conn = new DBConfig;
$select = new SelectData;

for ($i = 0; $i < 50; $i++) {
    if (isset($_POST['deleteId_' . $i])) {
        // echo "deleteId_" . $i;
        $select->deleteUser($conn, $i);
        $select->resetAutoIncrement($conn);
        header("Location:../Views/adminView.php");
    }
}