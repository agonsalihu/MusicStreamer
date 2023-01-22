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
}