<?php
include_once '../Php/connect.php';
include_once '../Php/select.php';
$conn = new DBConfig;
$select = new SelectData;

session_start();
$songID;
$songTitle;
$songArtist;
$songAudioPath;
$songImgPath;
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
    <title>Create Song</title>
    <link rel="stylesheet" href="../Css/editSong.css">
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
        <div class="editSongContainer">
            <h2>Create Song</h2>
            <form action="../Php/createSong.php" method="POST" enctype="multipart/form-data">
                <?php
                $cookie_name = "errMsg";
                $cookie_value = "*Every field must be filled!";
                if (isset($_COOKIE[$cookie_name])) {
                    echo "<label for='text' id='userNotFound' class='errorMsg' style='display: flex;'>$cookie_value</label>";
                }
                ?>
                <label for="text" id="errorMsg" class="errorMsg" style="display: none;">*Song name, Artist or Path is incorrect</label>

                <label for="createSongArtist" class="songArtist infoLabel">Artist:</label>
                <input type="text" name="createSongArtist" placeholder='Artist Name'>

                <label for="createSongTitle" class="infoLabel">Song Name:</label>
                <input type="text" id="createSongTitle" name="createSongTitle" placeholder='Song Title'>

                <label for="createAudioPath" class="infoLabel">Audio Path:</label>
                <input class="fileHandlerBtn" type="file" id="createAudioPath" name="createAudioPath">

                <label for="createImagePath" class="infoLabel">Image Path:</label>
                <input class="fileHandlerBtn" type="file" id="createImagePath" name="createImagePath">

                <button type="submit" name="createSongBtn">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>