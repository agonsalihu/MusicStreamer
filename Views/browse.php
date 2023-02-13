<?php
include_once '../Php/connect.php';
include_once '../Php/select.php';
$conn = new DBConfig;
$select = new SelectData;

$searchVal = "";
if (isset($_GET['searchBtn']) && $_GET['searchValue'] !== "") {
    $searchVal = $_GET['searchValue'];
} else {
    $searchVal = "Drake";
}
function fixSearchVal($searchVal)
{
    echo ucwords($searchVal);
}
function searchDBVal($searchVal)
{
    return ucwords($searchVal);
}

function fixForImg($searchVal)
{
    $valImg = preg_replace('~ ~', '', $searchVal);
    return strtolower($valImg);
}
$valImg = fixForImg($searchVal);
$imgPath = '../Assets/Images/' . $valImg . ".png";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Browse</title>
    <link rel="stylesheet" href="../Css/artist.css" />
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
                <div class="artistDetails">
                    <h1><?php fixSearchVal($searchVal) ?></h1>
                    <span>
                        <img src="../Assets/icons/horizontal-line.svg" style="margin-left: 20px" alt="line" />
                        <span class="monthlyListeners">6,269,178 monthly listeners</span>
                    </span>
                </div>
                <div class="followButton">
                    <div class="artistContent">
                        <h6>Following</h6>
                        <span>
                            <img class="following" src="../Assets/icons/check.svg" alt="check" />
                        </span>
                    </div>
                    <h3>- 50M Followers</h3>
                </div>
                <div class="playedSongs">
                    <img class="playButton" src="../Assets/icons/playButton.svg" alt="playButton" />
                    <h3>Play songs on shuffle</h3>
                    <div class="song1">
                        <img src='<?php echo $imgPath ?>' alt='<?php echo $searchVal ?>'' />
                    <!-- </div> -->
                </div>
            </div>
            <div class="recommended">
                <div class="recommendedTop">
                    <h2>Songs</h2>
                    <div class="arrows">
                        <img class="back-arrow" src="../Assets/icons/back-arrow-disabled.svg" alt="back-arrow" onclick="sliderScrollLeft(0)" />
                        <img class="forward-arrow" src="../Assets/icons/forward-arrow-enabled.svg" alt="forward-arrow" onclick="sliderScrollRight(0)" />
                    </div>
                </div>
                <div class="recommendedA recommendedSliders">
                    <!-- <div class="box1">
                        <img src="../Assets/Images/toosie_slide.png" alt="passionfruit" onclick="changeAudio(' ../Assets/Music/Drake - Toosie Slide (Lyrics).mp3', '../Assets/Images/toosie_slide.png' , 'Toosie Slide' , 'Drake' )" />
                        <h5>Toosie Slide</h5>
                        <h6>Drake</h6>
                    </div> -->
                    <?php
                    $select->selectSongsWhereArtist($conn, searchDBVal($searchVal));
                    ?>
                </div>
            </div>
            <div class="recommended">
                <div class="recommendedTop">
                    <h2>Recommended Albums</h2>
                    <div class="arrows">
                        <img id="back-arrow" class="back-arrow" src="../Assets/icons/back-arrow-disabled.svg" alt="back-arrow" onclick="sliderScrollLeft(1)" />
                        <img id="forward-arrow" class="forward-arrow" src="../Assets/icons/forward-arrow-enabled.svg" alt="forward-arrow" onclick="sliderScrollRight(1)" />
                    </div>
                </div>
                <div class="recommendedA recommendedSliders">
                    <div class="box1">
                        <img src="../Assets/Images/views.png" alt="views" />
                        <h5>Views</h5>
                        <h6>2016</h6>
                    </div>
                    <div class="box">
                        <img src="../Assets/Images/Dark-Lane-Demo-Tapes.png" alt="Dark-Lane-Demo-Tapes" />
                        <h5>Dark Lane Demo Tapes</h5>
                        <h6>2020</h6>
                    </div>
                    <div class="box">
                        <img src="../Assets/Images/godsplan.png" alt="godsplan" />
                        <h5>Scorpion</h5>
                        <h6>2018</h6>
                    </div>
                    <div class="box">
                        <img src="../Assets/Images/nothing-was-the-same.png" alt="nothing-was-the-same" />
                        <h5>Nothing Was The Same</h5>
                        <h6>2013</h6>
                    </div>
                    <div class="box">
                        <img src="../Assets/Images/take-care.png" alt="take-care" />
                        <h5>Take Care</h5>
                        <h6>2011</h6>
                    </div>
                    <div class="box">
                        <img src="../Assets/Images/Dark-Lane-Demo-Tapes.png" alt="Dark-Lane-Demo-Tapes" />
                        <h5>Dark Lane Demo Tapes</h5>
                        <h6>2020</h6>
                    </div>
                    <div class="box">
                        <img src="../Assets/Images/godsplan.png" alt="godsplan" />
                        <h5>Scorpion</h5>
                        <h6>2018</h6>
                    </div>
                    <div class="box">
                        <img src="../Assets/Images/nothing-was-the-same.png" alt="nothing-was-the-same" />
                        <h5>Nothing Was The Same</h5>
                        <h6>2013</h6>
                    </div>
                    <div class="box">
                        <img src="../Assets/Images/take-care.png" alt="take-care" />
                        <h5>Take Care</h5>
                        <h6>2011</h6>
                    </div>
                </div>
            </div>
            <!-- End Of Recommended Albums -->

            <!-- End Of Recommended Songs -->
            <div class="recommended">
                <div class="recommendedTop">
                    <h2>Similar Artists</h2>
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
    <script src="../Js/dashboard.js"></script>
    <script src="../Js/sliders.js"></script>
</body>

</html>