<?php
include_once '../PHP/connect.php';
include_once '../PHP/select.php';
$conn = new DBConfig;
$select = new SelectData;

$songID;
$songTitle;
$songArtist;
$songAudioPath;
$songImgPath;
if (isset($_POST['editSongBtn'])) {
    echo $_POST['songId'];
    echo $_POST['songArtist'];
    echo $_POST['songTitle'];
    echo $_POST['audioPath'];
    echo $_POST['imagePath'];
    $songId = $_POST['songId'];
    $songArtist = $_POST['songArtist'];
    $songTitle = $_POST['songTitle'];
    $songAudioPath = $_POST['audioPath'];
    $songImgPath = $_POST['imagePath'];
    $select->editSong($conn, $songId, $songArtist, $songTitle, $songAudioPath, $songImgPath);
    header("Location:../Views/adminView.php");

}
