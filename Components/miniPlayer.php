<div id="miniPlayer" class="miniPlayer">
    <div class="currentSongImg">
        <img id="currentSongImg" src="../Assets/Images/miniplayer-img.png" alt="currentSongImg" />
    </div>
    <div class="addToFav">
        <img id="heart4" onclick="likeSong(4)" src="../Assets/icons/heart-filled.svg" alt="heart" />
    </div>
    <div class="currentSongTitle">
        <h5 id="currentSongTitle">God's Plan</h5>
        <h6 id="currentArtist">Drake</h6>
    </div>
    <div class="playOptions">
        <div class="timer">
            <span id="currTime"> 0:00 </span>
            <span>
                <audio id="myAudio">
                    <source id="currentSongSrc" src="../Assets/Music/Drake-Gods_Plan.mp3" type="audio/mpeg" />
                </audio>
                <div class="timerBar">
                    <input id="timerRange" class="timerRange" type="range" min="0" max="199" value="0" />
                </div>
            </span>
            <span id="duration">0:00</span>
        </div>
        <div class="options">
            <img onclick="shuffleAudio()" id="shuffleIcon" src="../Assets/icons/shuffle.svg" alt="shuffle" />
            <img onclick="playbackAudio()" src="../Assets//icons/previous.svg" alt="previous" />
            <img onclick="pauseAudio()" id="pauseIcon" src="../Assets//icons/pause.svg" alt="pause" style="display: none" />
            <img onclick="playAudio()" id="playIcon" src="../Assets//icons/play.svg" alt="play" style="display: inline" />
            <img src="../Assets//icons/next.svg" alt="next" />
            <img onclick="loopAudio()" id="loopIcon" src="../Assets/icons/loop.svg" alt="loop" />
        </div>
    </div>
    <div class="volumeOptions">
        <img class="queue" src="../Assets/icons/queue.svg" alt="queue" />
        <img class="volumeIcon" id="volumeIcon" src="../Assets/icons/volume.svg" alt="volume" onclick="muteAudio()"/>
        <div class="volumeBar">
            <input id="volumeRange" class="volumeRange" type="range" min="1" max="100" value="50" />
            <span id="volumeValue">50%</span>
        </div>
        <img id="playerMaximize" src="../Assets/icons/maximize.svg" alt="maximize" onclick="maximizePlayer()"/>
    </div>
</div>
<script src="../JS/playOptions.js"></script>
