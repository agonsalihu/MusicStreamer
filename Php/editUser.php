<?php
include_once '../PHP/connect.php';
include_once '../PHP/select.php';
$conn = new DBConfig;
$select = new SelectData;

$userID;
$userName;
$userEmail;
$userRole;
if (isset($_POST['editUserBtn'])) {
    $userID = $_POST['userId'];
    $userName = $_POST['userName'];
    $userEmail = $_POST['editUserEmail'];
    $userRole = $_POST['editUserRole'];
    $select->editUser($conn, $userID, $userEmail, $userRole);
    header("Location:../Views/adminView.php");
}
