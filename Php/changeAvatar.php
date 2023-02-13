<?php
include_once '../PHP/connect.php';
include_once '../PHP/select.php';
$conn = new DBConfig;
$select = new SelectData;
session_start();

$userId = $_SESSION['username'];
$target_dir = "../Assets/uploads/";
$target_file = $target_dir . basename($_FILES["userAvatarFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST['uploadBtn'])) {
	$check = getimagesize($_FILES["userAvatarFile"]["tmp_name"]);
	if ($check !== false) {
		$uploadOk = 1;
	}else {
		$uploadOk = 0;
		$fileNotImage_Cookie = 'fileNotImage';
		$fileNotImage_Value = "File is not an image.";
		setcookie($fileNotImage_Cookie, $fileNotImage_Value, time() + (5), "/");
		header("Location:../Views/account.php");
	}
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		$uploadOk = 0;
		$wrongType_Cookie = 'wrongType';
		$wrongType_Value = "Only JPG, JPEG, PNG files are allowed.";
		setcookie($wrongType_Cookie, $wrongType_Value, time() + (5), "/");
		header("Location:../Views/account.php");
	}
	if (file_exists($target_file)) {
		$uploadOk = 0;
		$fileExists_Cookie = 'fileExists';
		$fileExists_Value = "The file already exists.";
		setcookie($fileExists_Cookie, $fileExists_Value, time() + (5), "/");
		header("Location:../Views/account.php");
	}
	if ($uploadOk == 0) {
		$fileError_Cookie = 'fileError';
		$fileError_Value = "Sorry, your file couldn't be uploaded.";
		setcookie($fileError_Cookie, $fileError_Value, time() + (5), "/");
		header("Location:../Views/account.php");
	}else{
		try {
			move_uploaded_file($_FILES["userAvatarFile"]["tmp_name"], $target_file);
			// echo "The file " . htmlspecialchars(basename($_FILES["userAvatarFile"]["name"])) . " has been uploaded.";
			$fileSucc_Cookie = 'fileSuccess';
			$fileSucc_Value = "File, uploaded successfully.";
			setcookie($fileSucc_Cookie, $fileSucc_Value, time() + (5), "/");
			$select->changeAvatar($conn, $target_file, $userId);
			header("Location:../Views/account.php");
		} catch (\Throwable $e) {
			echo "Error: ". $e->getMessage();
			$fileError_Cookie = 'fileError';
			$fileError_Value = "Sorry, your file couldn't be uploaded.";
			setcookie($fileError_Cookie, $fileError_Value, time() + (5), "/");
			header("Location:../Views/account.php");
		}
	}
}
