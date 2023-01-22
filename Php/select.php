<?php
// include_once '../PHP/connect.php';
// $conn = new DBConfig;

class SelectData
{
    /*Querys for Users*/
    public $data;
    public function selectUserById($conn, $userId)
    {
        $sql = "SELECT * FROM user u WHERE u.ID = :userId;";
        $statement = $conn->getConnection()->prepare($sql);

        $statement->bindParam(":userId", $userId);
        try {
            $statement->execute();
            // echo "Data has been selected successfully";
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $data['ID'] = $result['ID'];
            $data['Username'] = $result['Username'];
            $data['Email'] = $result['Email'];
            $data['Role'] = $result['Role'];
            return $data;
            // print_r($result['Username']);
            // print_r($result['Role']);
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function verifyData($conn, $username, $password)
    {
        $sql = "SELECT * FROM user u WHERE u.Username = :username;";
        $statement = $conn->getConnection()->prepare($sql);
        $statement->bindParam(":username", $username);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            //Check if password matches hashed password
            // password_verify($password, $result['Password'])
            if ($result['Username'] == $username && password_verify($password, $result['Password']) == 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function checkRole($conn, $username)
    {
        $sql = "SELECT u.Role FROM user u WHERE u.Username = :username;";
        $statement = $conn->getConnection()->prepare($sql);

        $statement->bindParam(":username", $username);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result['Role'] == 1) {
                return 1;
            } else {
                return 0;
            }
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function selectUserByUsername($conn, $username)
    {
        $sql = "SELECT * FROM user u WHERE u.Username = :username;";
        $statement = $conn->getConnection()->prepare($sql);

        $statement->bindParam(":username", $username);
        try {
            $statement->execute();
            // echo "Data has been selected successfully";
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result['Username'] !== $username) {
                return null;
            } else {
                return $result;
            }
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getRowResults($conn)
    {
        $sql = "SELECT COUNT(*) FROM user;";
        $statement = $conn->getConnection()->prepare($sql);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['COUNT(*)'];
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function selectAllUsers($conn)
    {
        $sql = "SELECT * FROM user;";
        $statement = $conn->getConnection()->prepare($sql);
        try {
            $statement->execute();
            // echo "Data has been selected successfully";
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            // $numOfRows = $this->getRowResults($conn);
            // var_dump($result);
            echo "<br>";
            echo "<form method='POST' action='../Views/editUser.php'>";
            echo '<table>
            <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>';
            $index = 1;
            foreach ($result as $row) {
                echo '<tr>
                        <th data-label="User_ID" id="ID' . $index . '">' . $row["ID"] . '</th>
                        <th data-label="User_Name">' . $row["Username"] . '</th>
                        <th data-label="User_Email">' . $row["Email"] . '</th>
                        <th data-label="User_Role">' . $row["Role"] . '</th>
                        <th data-label="Edit_User"><button type="submit" class="editUser" name="editId_' . $index . '" id="editUser" href="../PHP/editUser.php"><img src="../Assets/icons/edit.svg" alt="editUser"></button></th>';
                echo '</form>';
                echo "<form method='POST' action='../PHP/deleteUser.php'>";
                echo '<th data-label="Delete_User"><button class="deleteUser" name="deleteId_' . $index . '"><img src="../Assets/icons/delete.svg" alt="deleteUser"></button></th>';
                echo '</form>';
                echo '</tr>';
                $index++;
            }
            echo '</table>';
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function resetPassword($conn, $username, $email, $password)
    {
        $sql = "UPDATE user u SET u.Password = :password WHERE u.Username = :username AND u.Email = :email;";
        $statement = $conn->getConnection()->prepare($sql);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":email", $email);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function editUser($conn, $userId, $userEmail, $userRole)
    {
        $sql = "UPDATE user u SET u.Email = :email, u.Role = :role WHERE u.ID = :id;";
        $statement = $conn->getConnection()->prepare($sql);
        $statement->bindParam(":email", $userEmail);
        $statement->bindParam(":id", $userId);
        $statement->bindParam(":role", $userRole);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteUser($conn, $userId)
    {
        $sql = "DELETE FROM user WHERE user.ID = :id;";
        $statement = $conn->getConnection()->prepare($sql);
        $statement->bindParam(":id", $userId);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function resetAutoIncrement($conn)
    {
        $sql = "SET @autoid :=0;
        UPDATE user SET user.ID = @autoid := (@autoid+1);
        ALTER TABLE user Auto_Increment = 1;";
        $statement = $conn->getConnection()->prepare($sql);
        try {
            $statement->execute();
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getAvatar($conn, $userName)
    {
        $sql = "SELECT AvatarPath FROM user u WHERE u.Username = :username";
        $statement = $conn->getConnection()->prepare($sql);
        $statement->bindParam(":username", $userName);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['AvatarPath'];
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function changeAvatar($conn, $filePath, $userName)
    {
        $sql = "UPDATE user u SET u.AvatarPath = :filePath WHERE u.Username = :username;";
        $statement = $conn->getConnection()->prepare($sql);
        $statement->bindParam(":filePath", $filePath);
        $statement->bindParam(":username", $userName);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    /*Querys for Songs */
    public $songData;
    public function selectSongById($conn, $songID)
    {
        $sql = "SELECT * FROM music m WHERE m.SongID = :songID;";
        $statement = $conn->getConnection()->prepare($sql);

        $statement->bindParam(":songID", $songID);
        try {
            $statement->execute();
            // echo "Data has been selected successfully";
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $songData['ID'] = $result['SongID'];
            $songData['Title'] = $result['Title'];
            $songData['Artist'] = $result['Artist'];
            $songData['AudioPath'] = $result['AudioPath'];
            $songData['ImgPath'] = $result['ImgPath'];
            return $songData;
            // print_r($result['Title']);
            // print_r($result['Artist']);
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getRowSongsResults($conn)
    {
        $sql = "SELECT COUNT(*) FROM music;";
        $statement = $conn->getConnection()->prepare($sql);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['COUNT(*)'];
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function selectAllSongs($conn)
    {
        $sql = "SELECT * FROM music;";
        $statement = $conn->getConnection()->prepare($sql);
        try {
            $statement->execute();
            // echo "Data has been selected successfully";
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            // $numOfRows = $this->getRowResults($conn);
            // var_dump($result);
            echo "<br>";
            echo "<form method='POST' action='../Views/editSong.php'>";
            echo '<table>
            <tr>
            <th>ID</th>
            <th>Artist</th>
            <th>Title</th>
            <th>Image Cover</th>
            <th>Audio Path</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>';
            $index = 1;
            foreach ($result as $row) {
                echo '<tr>
                        <td data-label="Song_ID" id="ID' . $index . '">' . $row["SongID"] . '</td>
                        <td data-label="Song_Title">' . $row["Artist"] . '</td>
                        <td data-label="Artist_Name">' . $row["Title"] . '</td>
                        <td data-label="Song_Img"><img class="miniImg" src=' . $row["ImgPath"] . '></td>
                        <td data-label="Audio_Path" class="audioPathTd">' . $row["AudioPath"] . '</td>
                        <td data-label="Edit_Song"><button type="submit" class="editSong" name="editSongId_' . $index . '" id="editSong" href="../PHP/editSong.php"><img src="../Assets/icons/edit.svg" alt="editSong"></button></td>';
                echo '</form>';
                echo "<form method='POST' action='../PHP/deleteSong.php'>";
                echo '<td data-label="Delete_Song"><button class="deleteSong" name="deleteSongId_' . $index . '"><img src="../Assets/icons/delete.svg" alt="deleteSong"></button></td>';
                echo '</form>';
                echo '</tr>';
                $index++;
            }
            echo '</table>';
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function recommendedSongs($conn)
    {
        $sql = "SELECT * FROM music;";
        $statement = $conn->getConnection()->prepare($sql);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $title = $row['Title'];
                $imgPath = $row["ImgPath"];
                $artist = $row['Artist'];
                $audioPath = $row["AudioPath"];
                echo '<div class="box">
                        <img src=' . $imgPath . ' alt="' . $title . '" onclick="changeAudio(\'' . $audioPath . '\', \'' . $imgPath . '\', \'' . $title . '\', \'' . $artist . '\')"/>
                        <h5>' . $title . '</h5>
                        <h6>' . $artist . '</h6>
                    </div>';
            }
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function selectSongsWhereArtist($conn, $artistName)
    {
        $sql = "SELECT * FROM music m Where m.Artist = :artist Order By m.Title;";
        $statement = $conn->getConnection()->prepare($sql);
        $statement->bindParam(":artist", $artistName);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo "This artists has no songs.";
            } else {
                foreach ($result as $row) {
                    $title = $row['Title'];
                    $imgPath = $row["ImgPath"];
                    $artist = $row['Artist'];
                    $audioPath = $row["AudioPath"];
                    echo '<div class="box">
                        <img src=' . $imgPath . ' alt="' . $title . '" onclick="changeAudio(\'' . $audioPath . '\', \'' . $imgPath . '\', \'' . $title . '\', \'' . $artist . '\')"/>
                        <h5>' . $title . '</h5>
                        <h6>' . $artist . '</h6>
                    </div>';
                }
            }
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function displayArtists($conn)
    {
        $sql = "SELECT DISTINCT Artist FROM music;";
        $statement = $conn->getConnection()->prepare($sql);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo "There are no artists.";
            } else {
                foreach ($result as $row) {
                    $name = $row['Artist'];
                    $imgName = strtolower(preg_replace('~ ~', '', $name));
                    $imgPath = '../Assets/Images/' . $imgName . ".png";
                    echo '<div class="artist">
                        <a href="../Views/browse.php?searchValue='.$name.'&searchBtn=">
                            <img class="artistImg" src='.$imgPath.' alt='.$name.' />
                        </a>
                        <h5>'.$name.'</h5>
                        <div class="artistContent">
                            <h6>Following</h6>
                            <span><img class="following" src="../Assets/icons/check.svg" alt="check" /></span>
                        </div>
                </div>';
                }
            }
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function selectAllArtists($conn)
    {
        $sql = "SELECT COUNT(distinct Artist) FROM music;";
        $statement = $conn->getConnection()->prepare($sql);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['COUNT(distinct Artist)'];
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function editSong($conn, $songId, $songArtist, $songTitle, $songAudioPath, $songImgPath)
    {
        $sql = "UPDATE music m SET m.Artist = :artist, m.Title = :title, m.AudioPath = :audioPath, m.ImgPath = :imgPath  WHERE m.SongID = :id;";
        $statement = $conn->getConnection()->prepare($sql);
        $statement->bindParam(":id", $songId);
        $statement->bindParam(":artist", $songArtist);
        $statement->bindParam(":title", $songTitle);
        $statement->bindParam(":audioPath", $songAudioPath);
        $statement->bindParam(":imgPath", $songImgPath);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteSong($conn, $songID)
    {
        $sql = "DELETE FROM music WHERE music.SongID = :id;";
        $statement = $conn->getConnection()->prepare($sql);
        $statement->bindParam(":id", $songID);
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function resetAutoIncrementSong($conn)
    {
        $sql = "SET @autoid :=0;
        UPDATE music SET music.SongID = @autoid := (@autoid+1);
        ALTER TABLE music Auto_Increment = 1;";
        $statement = $conn->getConnection()->prepare($sql);
        try {
            $statement->execute();
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// $obj = new SelectData;
// $obj->selectUserById($conn, 1);
// $obj->selectUserByUsername($conn, 'AlbinBeee');
// $obj->selectAllUsers($conn);
