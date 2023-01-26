<div class="mobile-sidebar">
    <span>
        <img class="mobileSidebar" src="../Assets/icons/sidebar-light.svg" alt="sidebar" onclick="openMenu()">
    </span>
    <script src="../JS/mobileMenu.js"></script>
</div>
<div class="searchBar">
    <form action="../Views/browse.php" method="GET">
        <img src="../Assets/icons/search.svg" alt="home" />
        <span class="searchInput">
            <input type="text" placeholder="Search" name="searchValue" />
            <button name="searchBtn">Go</button>
        </span>
    </form>
</div>
<?
    include_once '../PHP/connect.php';
    include_once '../PHP/select.php';
    $conn = new DBConfig;
    $select = new SelectData;
?>
<div class="userSettings">
    <img class="friends" src="../Assets/icons/friends.svg" alt="friends" />
    <div></div>
    <span><img class="avatar" <?php echo 'src=' . $select->getAvatar($conn, $_SESSION["username"]) . '' ?> alt="" /></span>
    <span class="userName"><?php echo $_SESSION["username"] ?></span>
    <div class="dropdown">
        <img onclick="showDropdown()" class="downArrow" id="arrow" src="../Assets/icons/down-arrow.svg" alt="" />
        <div id="dropdown-content">
            <a href="../Views/account.php" class="dropdownGroup"><img src="../Assets/icons/user.svg" alt="">Account</a>
            <a href="#" class="dropdownGroup"><img src="../Assets/icons/settings.svg" alt="">Settings</a>
            <a href="../PHP/logout.php" class="dropdownGroup"><img src="../Assets/icons/logout.svg" alt="">Log Out</a>

        </div>
    </div>
</div>
<script src="../JS/dashboard.js"></script>