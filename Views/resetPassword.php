<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../Css/resetPassword.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet" />
</head>

<body>
    <header>
        <div class="logo">
            <img src="../Assets/Logo.svg" alt="logo">
        </div>
    </header>
    <div class="wrapper">
        <div class="passwordResetContainer">
            <h2>Reset Your Password</h2>
            <form action="../Php/resetPassword.php" method="POST">
            <?php
                $cookie_name = "errMsg";
                $cookie_value = "*Every field must be filled!";
                if(isset($_COOKIE[$cookie_name])) {
                    echo "<label for='text' id='userNotFound' class='errorMsg' style='display: flex;'>$cookie_value</label>";
                }   
            ?>
                <label for="text" id="errorMsg" class="errorMsg" style="display: none;">*Username, Email or Password is incorrect</label>
                <input type="text" id="username" name="resetPassUsername" placeholder="Username" onchange="validateUsername()">
                <input type="text" id="email" name="resetPassEmail" placeholder="Email" onchange="validateEmail()">
                <input type="password" id="password" name="resetPassNewPass" placeholder="New Password" onchange="validatePassword()">
                <button type="submit" name="resetPassBtn">Submit</button>
            </form>
        </div>
    </div>
</body>
<script src="../Js/validate.js"></script>

</html>