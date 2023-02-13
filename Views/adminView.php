<?php
include_once '../Php/connect.php';
include_once '../Php/select.php';

$conn = new DBConfig;
$select = new SelectData;
// echo $_SESSION["username"]; 
// echo $_SESSION["userRole"]; 
// if ($_SESSION['userRole'] == 0) {
// header("Location:../Views/home.php");
// }
// echo "Hello ".$_SESSION["username"];

// $select->selectAllUsers($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Css/dashboard.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="header">
        <?php
        include '../Components/sidebar.php';
        if ($_SESSION['userRole'] == 0) {
            header("Location:../Views/home.php");
        }
        ?>
        <div class="content">
            <div class="topBar">
                <?php
                include '../Components/topBar.php';
                ?>
            </div>
            <div class="recentlyPlayed">
                <h2>User Stats</h2>
                <div class="stats">
                    <div class="userStats">
                        <h1 class="numberOfUsers"><?php echo $select->getRowResults($conn); ?></h1>
                        <img src="../Assets/icons/friends.svg" alt="users">
                        <h5>Total Users</h5>
                    </div>
                    <div class="userStats">
                        <h1 class="numberOfUsers"><?php echo $select->getRowSongsResults($conn); ?></h1>
                        <img src="../Assets/icons/music-note.svg" alt="music">
                        <h5>Total Musics</h5>
                    </div>
                    <div class="userStats">
                        <h1 class="numberOfUsers"><?php echo $select->selectAllArtists($conn); ?></h1>
                        <img src="../Assets/icons/mic.svg" alt="albums">
                        <h5>Total Artists</h5>
                    </div>
                </div>
            </div>
            <div class="userList">
                <h2>All Users</h2>
                <?php
                $select->selectAllUsers($conn);
                ?>
            </div>
            <div class="myFavSongs">
                <div class="createMusicDiv">
                    <h2>All Songs</h2>
                    <a href="../Views/createSong.php"><button name="createMusicBtn"><span><img src="../Assets/icons/add.svg" alt="addMusic"></span> Add Music</button></a>
                </div>
                <label for="text" class="infoMsg">
                    <?php
                    $Succ_Cookie = 'Success';
                    $Succ_Value = "Song created successfully!";
                    if (isset($_COOKIE[$Succ_Cookie])) {
                        echo "<label class='okMsg' for='uploadBtn'style='display: flex;'>$Succ_Value</label>";
                    }
                    $Err_Cookie = 'Error';
                    $Err_Value = "Sorry, the song couldn't be uploaded!";
                    if (isset($_COOKIE[$Err_Cookie])) {
                        echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$Err_Value</label>";
                    }
                    $File_NotImage_Cookie = 'Error';
                    $File_NotImage_Value = "File is not an image!";
                    if (isset($_COOKIE[$File_NotImage_Cookie])) {
                        echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$File_NotImage_Value</label>";
                    }
                    $WrongImgFormat_Cookie = 'Error';
                    $WrongImgFormat_Value = "Only JPG, JPEG, PNG files are allowed!";
                    if (isset($_COOKIE[$WrongImgFormat_Cookie])) {
                        echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$WrongImgFormat_Value</label>";
                    }
                    $WrongSongFormat_Cookie = 'Error';
                    $WrongSongFormat_Value = "Only MP3, WAV, AAC files are allowed!";
                    if (isset($_COOKIE[$WrongSongFormat_Cookie])) {
                        echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$WrongSongFormat_Value</label>";
                    }
                    $ImgExists_Cookie = 'Error';
                    $ImgExists_Value = "The image already exists!";
                    if (isset($_COOKIE[$ImgExists_Cookie])) {
                        echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$ImgExists_Value</label>";
                    }
                    $SongExists_Cookie = 'Error';
                    $SongExists_Value = "The song already exists!";
                    if (isset($_COOKIE[$SongExists_Cookie])) {
                        echo "<label class='errorMsg' for='uploadBtn'style='display: flex;'>$SongExists_Value</label>";
                    }
                    ?>
                </label>
                <?php
                $select->selectAllSongs($conn);
                ?>
            </div>
            <div>
                <h2>All Albums</h2>
            </div>
        </div>
    </div>
    <?php
    include '../Components/miniPlayer.php';
    ?>
    <script src="../Js/dashboard.js"></script>
    <script src="../Js/activeLinks.js"></script>
    <script src="../Js/sliders.js"></script>
</body>

</html>