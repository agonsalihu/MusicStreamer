<?php
include_once '../PHP/connect.php';
include_once '../PHP/select.php';
session_start();
$conn = new DBConfig;
$select = new SelectData;
?>
<div id="mobileSidebar" class="sidebar">
  <div class="logo"><img src="../Assets/Logo.svg" alt="Logo" /></div>
  <div class="closeBtn"><img src="../Assets/icons/close.svg" alt="Close" onclick="closeMenu()" /></div>
  <div class="navigation">
    <div id="mobile-homeLink" class="home">
      <a href="../Views/home.php">
        <img src="../Assets/icons/home.svg" alt="home" /><span>Home</span>
      </a>
    </div>
    <div id="mobile-browseLink" class="browse">
      <a href="../Views/browse.php">
        <img src="../Assets/icons/categories.svg" alt="home" /><span>Browse</span>
      </a>
    </div>
    <div id="mobile-favoritesLink" class="favorites">
      <a href="../Views/favorites.php">
        <img src="../Assets/icons/heart.svg" alt="home" /><span>Favorites</span>
      </a>
    </div>
    <?php
    if ($select->checkRole($conn, $_SESSION["username"]) == 1) {
      echo '<div id="mobile-dashboardLink" class="favorites">
                  <a href="../Views/adminView.php">
                    <img src="../Assets/icons/chart1.svg" alt="home" />
                    <span>Dashboard</span>
                  </a>
                </div>';
    }
    ?>
  </div>
  <div class="library">
    <h4>Your Library</h4>
    <h3>Made For You</h3>
    <h3>Recently Played</h3>
    <h3>Albums</h3>
    <h3>Artists</h3>
    <h3>Local Files</h3>
  </div>
  <div class="playlists">
    <h4>Playlists</h4>
    <div class="addPlaylist">
      <img src="../Assets/icons/addPlaylist.svg" alt="home" /><span>New Playlist</span>
    </div>
    <h3>Rap</h3>
    <h3>Deep House</h3>
    <h3>Pop</h3>
  </div>
  <div class="friends">
    <hr class="friendsLine" />
    <div class="onlineFriends">
      <img src="../Assets/icons/friendsOnline.svg" alt="home" />
      <span>5 Friends Online</span>
    </div>
  </div>
</div>
<div id="sidebar" class="sidebar">
  <div class="logo"><img src="../Assets/Logo.svg" alt="Logo" /></div>
  <div class="navigation">
    <div id="homeLink" class="home">
      <a href="../Views/home.php">
        <img src="../Assets/icons/home.svg" alt="home" /><span>Home</span>
      </a>
    </div>
    <div id="browseLink" class="browse">
      <a href="../Views/browse.php">
        <img src="../Assets/icons/categories.svg" alt="home" /><span>Browse</span>
      </a>
    </div>
    <div id="favoritesLink" class="favorites">
      <a href="../Views/favorites.php">
        <img src="../Assets/icons/heart.svg" alt="home" /><span>Favorites</span>
      </a>
    </div>
    <?php
    if ($select->checkRole($conn, $_SESSION["username"]) == 1) {
      echo '<div id="dashboardLink" class="favorites">
                  <a href="../Views/adminView.php">
                    <img src="../Assets/icons/chart1.svg" alt="home" />
                    <span>Dashboard</span>
                  </a>
                </div>';
    }
    ?>
  </div>
  <div class="library">
    <h4>Your Library</h4>
    <h3>Made For You</h3>
    <h3>Recently Played</h3>
    <h3>Albums</h3>
    <h3>Artists</h3>
    <h3>Local Files</h3>
  </div>
  <div class="playlists">
    <h4>Playlists</h4>
    <div class="addPlaylist">
      <img src="../Assets/icons/addPlaylist.svg" alt="home" /><span>New Playlist</span>
    </div>
    <h3>Rap</h3>
    <h3>Deep House</h3>
    <h3>Pop</h3>
  </div>
  <div class="friends">
    <hr class="friendsLine" />
    <div class="onlineFriends">
      <img src="../Assets/icons/friendsOnline.svg" alt="home" />
      <span>5 Friends Online</span>
    </div>
  </div>
</div>
<script src="../JS/activeLinks.js">
</script>