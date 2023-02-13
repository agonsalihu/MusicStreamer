<?php
    include_once '../PHP/connect.php';
    include_once '../PHP/select.php';
    $conn = new DBConfig;
    $select = new SelectData;

    if (isset($_POST['resetPassBtn'])) {
        $username = $_POST['resetPassUsername'];
        $email = $_POST['resetPassEmail'];
        $password = $_POST['resetPassNewPass'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        if (empty($username) || empty($email) || empty($password)) {
            $err_cookie = "errMsg";
            $err_cookie_value = "*Every field must be filled!";
            setcookie($err_cookie, $err_cookie_value, time() + (3), "/");
            header("Location:../Views/resetPassword.php");
        }else{
            $select->resetPassword($conn, $username, $email, $hashed_password);
            $succ_cookie = "successMsg";
            $succ_cookie_value = "*Password successfully changed!";
            setcookie($succ_cookie, $succ_cookie_value, time() + (3), "/");
            header("Location:../Views/login.php");
            // echo $username." ". $email." ".$hashed_password;
        }
    }
    // echo "here u can reset password";
?>