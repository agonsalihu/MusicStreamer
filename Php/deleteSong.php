<?php
include_once '../PHP/connect.php';
include_once '../PHP/select.php';
$conn = new DBConfig;
$select = new SelectData;

for ($i = 0; $i < 50; $i++) {
    if (isset($_POST['deleteSongId_' . $i])) {
        // echo "deleteSongId_" . $i;
        $select->deleteSong($conn, $i);
        $select->resetAutoIncrementSong($conn);
        header("Location:../Views/adminView.php");
    }
}