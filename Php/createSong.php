<?php
include_once '../PHP/connect.php';
// include_once '../PHP/select.php';
include_once '../PHP/insert.php';

$conn = new DBConfig;
// $select = new SelectData;
$insert = new InsertData;

session_start();
$userId = $_SESSION['username'];

$errMsg;
$target_dir = "../Assets/Images/";
$target_file_img = $target_dir . basename($_FILES["createImagePath"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file_img, PATHINFO_EXTENSION));

$target_dir_song = "../Assets/Music/";
$target_file_song = $target_dir_song . basename($_FILES["createAudioPath"]["name"]);
$uploadOk_song = 1;
$songFileType = strtolower(pathinfo($target_file_song, PATHINFO_EXTENSION));
if (isset($_POST['createSongBtn'])) {
    $artistName = $_POST['createSongArtist'];
    $songName = $_POST['createSongTitle'];
    $check = getimagesize($_FILES["createImagePath"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        $errMsg = "FileNotImg";
        createErrCookie($errMsg);
        header("Location:../Views/adminView.php");
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
        $errMsg = "WrongImgFormat";
        createErrCookie($errMsg);
        header("Location:../Views/adminView.php");
    }
    if ($songFileType != "mp3" && $songFileType != "wav" && $songFileType != "aac") {
        $uploadOk_song = 0;
        $errMsg = "WrongSongFormat";
        createErrCookie($errMsg);
        header("Location:../Views/adminView.php");
    }
    if (file_exists($target_file_img)) {
        $uploadOk = 0;
        $errMsg = "ImgExists";
        createErrCookie($errMsg);
        header("Location:../Views/adminView.php");
    }
    if (file_exists($target_file_song)) {
        $uploadOk_song = 0;
        $errMsg = "SongExists";
        createErrCookie($errMsg);
        header("Location:../Views/adminView.php");
    }
    if ($uploadOk == 0 || $uploadOk_song == 0) {
        $errMsg = "Error";
        createErrCookie($errMsg);
        header("Location:../Views/adminView.php");
    } else {
        try {
            move_uploaded_file($_FILES["createImagePath"]["tmp_name"], $target_file_img);
            move_uploaded_file($_FILES["createAudioPath"]["tmp_name"], $target_file_song);
            // echo "<img src=".$target_file_img.">";
            $Succ_Cookie = 'Success';
            $Succ_Value = "Song created successfully!";
            setcookie($Succ_Cookie, $Succ_Value, time() + (5), "/");
            $insert->insertMusic($conn, $target_file_song, $target_file_img, $songName, $artistName);
            header("Location:../Views/adminView.php");
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
            $errMsg = "Error";
            createErrCookie($errMsg);
            header("Location:../Views/adminView.php");
        }
    }
}

function createErrCookie($errMsg)
{
    if ($errMsg == "FileNotImg") {
        $File_NotImage_Cookie = 'Error';
        $File_NotImage_Value = "File is not an image!";
        setcookie($File_NotImage_Cookie, $File_NotImage_Value, time() + (5), "/");
    } elseif ($errMsg == "WrongImgFormat") {
        $WrongImgFormat_Cookie = 'Error';
        $WrongImgFormat_Value = "Only JPG, JPEG, PNG files are allowed!";
        setcookie($WrongImgFormat_Cookie, $WrongImgFormat_Value, time() + (5), "/");
    } elseif ($errMsg == "WrongSongFormat") {
        $WrongSongFormat_Cookie = 'Error';
        $WrongSongFormat_Value = "Only MP3, WAV, AAC files are allowed!";
        setcookie($WrongSongFormat_Cookie, $WrongSongFormat_Value, time() + (5), "/");
    } elseif ($errMsg == "ImgExists") {
        $ImgExists_Cookie = 'Error';
        $ImgExists_Value = "The image already exists!";
        setcookie($ImgExists_Cookie, $ImgExists_Value, time() + (5), "/");
    } elseif ($errMsg == "SongExists") {
            $SongExists_Cookie = 'Error';
            $SongExists_Value = "The song already exists!";
        setcookie($SongExists_Cookie, $SongExists_Value, time() + (5), "/");
    } else {
        $Err_Cookie = 'Error';
        $Err_Value = "Sorry, your file couldn't be uploaded.!";
        setcookie($Err_Cookie, $Err_Value, time() + (5), "/");
    }
}


// echo $artistName; 
// echo "<br/>";
// echo $songName;
// echo "<br/>";
// echo $target_file_song;
// echo "<br/>";
// echo $target_file_img;
// echo "<br/>";
            // echo "The file " . htmlspecialchars(basename($_FILES["createImagePath"]["name"])) . " has been uploaded.";
            // $select->changeAvatar($conn, $target_file, $userId);
            // header("Location:../Views/adminView.php");
