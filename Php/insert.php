<?php
class InsertData
{
    /*User Insert Querys */
    public function insertUser($conn, $username, $email, $hashed_password)
    {
        $sql = "INSERT INTO user (Username, Email, Password, Role) VALUES (:username, :email, :password , 0);";
        $statement = $conn->getConnection()->prepare($sql);
        
        $statement->bindParam(":username", $username);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $hashed_password);
        try {
            $statement->execute();
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }  

    /*Music Insert Querys */
    public function insertMusic($conn, $songAudioPath, $songImgPath, $songTitle, $songArtist)
    {
        $sql = "INSERT INTO music (AudioPath, ImgPath, Title, Artist) VALUES (:audioPath, :imgPath, :title, :artist);";
        $statement = $conn->getConnection()->prepare($sql);

        $statement->bindParam(":audioPath", $songAudioPath);
        $statement->bindParam(":imgPath", $songImgPath);
        $statement->bindParam(":title", $songTitle);
        $statement->bindParam(":artist", $songArtist);
        try {
            $statement->execute();
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}