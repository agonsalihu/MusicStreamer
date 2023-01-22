<?php
include_once '../PHP/connect.php';
include_once '../PHP/insert.php';

$conn = new DBConfig;
$insert = new InsertData;

if (isset($_POST['registerBtn'])) {
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $insert->insertUser($conn, $username, $email, $hashed_password);
    header("Location:../Views/login.php");
}
