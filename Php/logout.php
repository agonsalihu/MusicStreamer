<?php
class LogoutUser
{
    function logout()
    {
        session_start();
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        header("Location: ../Views/login.php");
    }
}
$logout = new LogoutUser;
$logout->logout();
