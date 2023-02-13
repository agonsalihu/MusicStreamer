<?php
include_once '../Php/connect.php';
include_once '../Php/select.php';

$conn = new DBConfig;
$select = new SelectData;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account</title>
    <link rel="stylesheet" href="../Css/dashboard.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="header">
        <?php
        include '../Components/sidebar.php';
        ?>
        <div class="content">
            <div class="topBar">
                <?php
                include '../Components/topBar.php';
                $userName = $_SESSION['username'];
                $avatarImg = $select->getAvatar($conn, $userName);
                ?>
            </div>
            <div class="recentlyPlayed">
                <h1>Hello <?php echo $userName; ?>😊</h1>
            </div>
            <div class="userInfo">
                <div class="avatarImg">
                    <h3>Your Avatar Image:</h3>
                    <img class="userAvatar" <?php echo 'src=' . $avatarImg . '' ?> alt="avatar">
                    <form method="POST" action="../Php/changeAvatar.php" enctype="multipart/form-data">
                        <?php
                        $fileNotImage_Cookie = 'fileNotImage';
                        $fileNotImage_Value = "File is not an image.";
                        if (isset($_COOKIE[$fileNotImage_Cookie])) {
                            echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$fileNotImage_Value</label>";
                        }
                        $wrongType_Cookie = 'wrongType';
                        $wrongType_Value = "Only JPG, JPEG, PNG files are allowed.";
                        if (isset($_COOKIE[$wrongType_Cookie])) {
                            echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$wrongType_Value</label>";
                        }
                        $fileExists_Cookie = 'fileExists';
                        $fileExists_Value = "The file already exists.";
                        if (isset($_COOKIE[$fileExists_Cookie])) {
                            echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$fileExists_Value</label>";
                        }
                        $fileError_Cookie = 'fileError';
                        $fileError_Value = "Sorry, your file couldn't be uploaded.";
                        if (isset($_COOKIE[$fileError_Cookie])) {
                            echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$fileError_Value</label>";
                        }
                        $fileSucc_Cookie = 'fileSuccess';
                        $fileSucc_Value = "File, uploaded successfully.";
                        if (isset($_COOKIE[$fileSucc_Cookie])) {
                            echo "<label  class='okMsg' for='uploadBtn'style='display: flex;'>$fileSucc_Value</label>";
                        }
                        ?>
                        <input class="fileHandlerBtn" type="file" id="userAvatarFile" name="userAvatarFile">
                        <button class="submitAvatarBtn" type="submit" name="uploadBtn">UPLOAD</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <?php
    include '../Components/miniPlayer.php';
    ?>
    <script src="../Js/dashboard.js"></script>
</body>

</html>