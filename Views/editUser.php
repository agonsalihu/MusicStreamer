<?php
include_once '../Php/connect.php';
include_once '../Php/select.php';
$conn = new DBConfig;
$select = new SelectData;

session_start();
$userID;
$userName;
$userEmail;
$userRole;
for ($i = 0; $i < 50; $i++) {
    if (isset($_POST['editId_' . $i])) {
        // echo "Edit user with: editId_" . $i;
        // echo '<br>';
        $data = $select->selectUserById($conn, $i);
        $userID = $data['Id'];
        $userName = $data['Username'];
        $userEmail = $data['Email'];
        $userRole = $data['Role'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
if ($_SESSION['userRole'] == 0) {
    header("Location:../Views/home.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../Css/editUser.css">
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
        <div class="editUserContainer">
            <h2>Edit User Details</h2>
            <form action="../Php/editUser.php" method="POST">
                <?php
                $cookie_name = "errMsg";
                $cookie_value = "*Every field must be filled!";
                if (isset($_COOKIE[$cookie_name])) {
                    echo "<label for='text' id='userNotFound' class='errorMsg' style='display: flex;'>$cookie_value</label>";
                }
                ?>
                <label for="text" id="errorMsg" class="errorMsg" style="display: none;">*Username, Email or Role is incorrect</label>
                <input type="text" id="userId" name="userId" value=<?php echo $userID ?> />
                <label for="editUserEmail" id="editUserRole" class="userName infoLabel">User:</label>
                <input type="text" id="username" name="userName" value=<?php echo $userName ?> style="display: none;">
                <input type="text" id="username" disabled placeholder=<?php echo $userName ?> onchange="validateUsername()">
                <label for="editUserEmail" id="editUserRole" class="editUserEmail infoLabel">Edit Email:</label>
                <input type="text" id="email" name="editUserEmail" placeholder=<?php echo $userEmail ?> value=<?php echo $userEmail ?> onchange="validateEmail()">
                <label for="editUserRole" id="editUserRole" class="editUserRole infoLabel">Edit Role:</label>
                <input type="text" id="role" name="editUserRole" placeholder=<?php echo $userRole ?> value=<?php echo $userRole ?>>
                <button type="submit" name="editUserBtn">Submit</button>
            </form>
        </div>
    </div>
</body>
<script src="../Js/validate.js"></script>

</html>