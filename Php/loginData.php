<?php
include_once '../PHP/connect.php';
include_once '../PHP/select.php';
// session_start();
$conn = new DBConfig;
$select = new SelectData;

if (isset($_POST['loginBtn'])) {
    session_start();
    $loginUsername = ($_POST['loginUsername']);
    $loginPassword = ($_POST['loginPassword']);
    $hashed_password = password_hash($loginPassword, PASSWORD_DEFAULT);
    $_SESSION["username"] = $loginUsername;
    $_SESSION["userRole"] = $select->checkRole($conn, $loginUsername); 

    if ($select->verifyData($conn, $loginUsername, $loginPassword) == true) {
        if ($_SESSION["userRole"] == 1) {
            $userName_cookie = 'username_cookie';
            $userName_cookie_value = $_SESSION['username'];
            setcookie($userName_cookie, $userName_cookie_value);
            header("Location:../Views/adminView.php");
        }else{
            header("Location:../Views/home.php");
        }
    }else{
        $cookie_name = "errMsg";
        $cookie_value = "User does not exist or password is incorrect";
        setcookie($cookie_name, $cookie_value, time() + (3), "/");
        header("Location:../Views/login.php");
        $errMsg = "User does not exist";
    }
}