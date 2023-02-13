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
for ($i = 0; $i < 50; $i++) {
    if (isset($_POST['editSongId_' . $i])) {
        // echo "Edit song with: editSongId_" . $i;
        // echo '<br>';
        $songData = $select->selectSongById($conn, $i);
        $songID = $songData['ID'];
        $songTitle = $songData['Title'];
        $songArtist = $songData['Artist'];
        $songAudioPath = $songData['AudioPath'];
        $songImgPath = $songData['ImgPath'];
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
    <title>Edit Song</title>
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
            <h2>Edit Song Details</h2>
            <form action="../Php/editSong.php" method="POST">
                <?php
                $cookie_name = "errMsg";
                $cookie_value = "*Every field must be filled!";
                if (isset($_COOKIE[$cookie_name])) {
                    echo "<label for='text' id='userNotFound' class='errorMsg' style='display: flex;'>$cookie_value</label>";
                }
                ?>
                <label for="text" id="errorMsg" class="errorMsg" style="display: none;">*Song, Artist or Path is incorrect</label>
                <input type="text" id="songId" name="songId" value="<?php echo $songID ?>"" style=" display: none;">

                <label for="editSongArtist" class="songArtist infoLabel">Artist:</label>
                <input type="text" name="songArtist" value="<?php echo $songArtist ?>"" style=" display: none;">
                <input type="text" id="artistName" disabled placeholder="<?php echo $songData['Artist']; ?>">

                <label for="editSongTitle" class="infoLabel">Edit Song Name:</label>
                <input type="text" id="editSongTitle" name="songTitle" placeholder="<?php echo $songData['Title']; ?>" value="<?php echo $songData['Title']; ?>">

                <label for="editAudioPath" class="infoLabel">Edit Audio Path:</label>
                <input type="text" id="editAudioPath" name="audioPath" placeholder=<?php echo $songAudioPath ?> value="<?php echo $songAudioPath ?>">

                <label for="editImagePath" class="infoLabel">Edit Image Path:</label>
                <input type="text" id="editImagePath" name="imagePath" placeholder=<?php echo $songImgPath ?> value="<?php echo $songImgPath ?>">
                <button type="submit" name="editSongBtn">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>