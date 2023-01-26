<?php
include_once '../PHP/connect.php';
include_once '../PHP/select.php';
$conn = new DBConfig;
$select = new SelectData;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="../CSS/dashboard.css" />
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
        ?>
      </div>
      <div class="recentlyPlayed">
        <h2>Recently Played</h2>
        <div class="playedSongs">
          <div class="favSongs">
            <img src="../Assets/Images/favorites.png" alt="favs" />
            <h5>Favorites</h5>
          </div>
          <div class="song1">
            <img src="../Assets/Images/godsplan.png" alt="godsplan" onclick="changeAudio('../Assets/Music/Drake-Gods_Plan.mp3', '../Assets/Images/godsplan.png', 'God\'s Plan', 'Drake')" />
            <h5>God's Plan</h5>
            <h6>Drake</h6>
          </div>
          <div class="song2">
            <img src="../Assets/Images/moodswings.png" alt="moodswings" onclick="changeAudio('../Assets/Music/Pop_Smoke-Mood_Swings.mp3', '../Assets/Images/moodswings.png', 'Mood Swings', 'Pop Smoke')" />
            <h5>Mood Swings</h5>
            <h6>Pop Smoke</h6>
          </div>
          <table class="homeTable">
            <tr class="row1">
              <th></th>
              <th>Title</th>
              <th>Artist</th>
              <th>Album</th>
            </tr>
            <tr>
              <th>
                <img src="../Assets/icons/heart-filled.svg" alt="liked" />
              </th>
              <th>God'S Plan</th>
              <th class="artists">Drake</th>
              <th>Scorpion</th>
            </tr>
            <tr>
              <th>
                <img src="../Assets/icons/heart-filled.svg" alt="liked" />
              </th>
              <th>Mood Swings</th>
              <th class="artists">Pop Smoke</th>
              <th>Aim For The Moon</th>
            </tr>
            <tr>
              <th>
                <img src="../Assets/icons/heart-filled.svg" alt="liked" />
              </th>
              <th>Sicko Mode</th>
              <th class="artists">Travis Scott</th>
              <th>Astro World</th>
            </tr>
          </table>
        </div>
      </div>
      <div class="recommended">
        <div class="recommendedTop">
          <h2>Recommended Albums</h2>
          <div class="arrows">
            <img id="back-arrow" class="back-arrow" src="../Assets/icons/back-arrow-disabled.svg" alt="back-arrow" onclick="sliderScrollLeft(0)" />
            <img id="forward-arrow" class="forward-arrow" src="../Assets/icons/forward-arrow-enabled.svg" alt="forward-arrow" onclick="sliderScrollRight(0)" />
          </div>
        </div>
        <div class="recommendedA recommendedSliders">
          <div class="box1">
            <img src="../Assets/Images/myTurn.png" alt="myTurn" />
            <h5>My Turn</h5>
            <h6>Lil Baby</h6>
          </div>
          <div class="box">
            <img src="../Assets/Images/Unknown-Pleasures.png" alt="Unknown-Pleasures" />
            <h5>Unknown Pleasures</h5>
            <h6>Joy Division</h6>
          </div>
          <div class="box">
            <img src="../Assets/Images/jackboys.png" alt="jackboys" />
            <h5>Jackboys</h5>
            <h6>Jackboys</h6>
          </div>
          <div class="box">
            <img src="../Assets/Images/astroworld.png" alt="astroworld" />
            <h5>Astro World</h5>
            <h6>Travis Scott</h6>
          </div>
          <div class="box">
            <img src="../Assets/Images/iyrtitl.png" alt="drake-album" />
            <h5>If you're reading this it's too late</h5>
            <h6>Drake</h6>
          </div>
          <div class="box">
            <img src="../Assets/Images/myTurn.png" alt="myTurn" />
            <h5>My Turn</h5>
            <h6>Lil Baby</h6>
          </div>
          <div class="box">
            <img src="../Assets/Images/Unknown-Pleasures.png" alt="Unknown-Pleasures" />
            <h5>Unknown Pleasures</h5>
            <h6>Joy Division</h6>
          </div>
          <div class="box">
            <img src="../Assets/Images/jackboys.png" alt="jackboys" />
            <h5>Jackboys</h5>
            <h6>Jackboys</h6>
          </div>
          <div class="box">
            <img src="../Assets/Images/astroworld.png" alt="astroworld" />
            <h5>Astro World</h5>
            <h6>Travis Scott</h6>
          </div>
          <div class="box">
            <img src="../Assets/Images/iyrtitl.png" alt="drake-album" />
            <h5>If you're reading this it's too late</h5>
            <h6>Drake</h6>
          </div>

        </div>
      </div>
      <!-- End Of Recommended Albums -->
      <div class="recommended">
        <div class="recommendedTop">
          <h2>Recommended Songs</h2>
          <div class="arrows">
            <img class="back-arrow" src="../Assets/icons/back-arrow-disabled.svg" alt="back-arrow" onclick="sliderScrollLeft(1)" />
            <img class="forward-arrow" src="../Assets/icons/forward-arrow-enabled.svg" alt="forward-arrow" onclick="sliderScrollRight(1)" />
          </div>
        </div>
        <div class="recommendedA recommendedSliders">
          <!-- <div class="box1">
            <img src="../Assets/Images/started_from_the_bottom.png" alt="nothing-was-the-same" onclick="changeAudio('../Assets/Music/Drake-Gods_Plan.mp3', '../Assets/Images/godsplan.png', 'God\'s Plan', 'Drake')" />
            <h5>Started From The Bottom </h5>
            <h6>Drake</h6>
          </div> -->
          <?php
          $select->recommendedSongs($conn);
          ?>
        </div>
      </div>
      <!-- End Of Recommended Songs -->
      <div class="recommended">
        <div class="recommendedTop">
          <h2>Recommended Artists</h2>
          <div class="arrows">
            <img class="back-arrow" src="../Assets/icons/back-arrow-disabled.svg" alt="back-arrow" onclick="sliderScrollLeft(2)" />
            <img class="forward-arrow" src="../Assets/icons/forward-arrow-enabled.svg" alt="forward-arrow" onclick="sliderScrollRight(2)" />
          </div>
        </div>
        <div class="recommendedAr recommendedSliders">
          <div class="artist">
            <img class="artistImg" src="../Assets/Images/chrisBrown.png" alt="godsplan" />
            <h5>Chris Brown</h5>
            <div class="artistContent">
              <h6>Follow</h6>
              <span><img class="following" src="../Assets/icons/add.svg" alt="check" /></span>
            </div>
          </div>
          <?php
          $select->displayArtists($conn);
          ?>
        </div>
      </div>
      <!-- End Of Recommended Artists -->
    </div>
  </div>
  <?php
  include '../Components/miniPlayer.php';
  ?>
  <script src="../JS/dashboard.js"></script>
  <script src="../JS/sliders.js"></script>
</body>

</html>