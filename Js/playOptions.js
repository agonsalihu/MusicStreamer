var x = document.getElementById("myAudio");
var currSong = document.getElementById("currentSongSrc");
var currentSongImg = document.getElementById("currentSongImg");
var currentSongTitle = document.getElementById("currentSongTitle");
var currentArtist = document.getElementById("currentArtist");
var playing = false;

function playAudio() {
  x.play();
  playing = true;
  document.getElementById("playIcon").style.display = "none";
  document.getElementById("pauseIcon").style.display = "inline";
}
function pauseAudio() {
  x.pause();
  playing = false;
  document.getElementById("playIcon").style.display = "inline";
  document.getElementById("pauseIcon").style.display = "none";
}
function loopAudio() {
  x.loop = !x.loop;
  if (x.loop == false) {
    // alert("Loop Disabled");
    console.log("Loop Disabled");
    document.getElementById("loopIcon").src = "../Assets/icons/loop.svg";
  } else {
    // alert("Loop Enabled");
    console.log("Loop Enabled");
    document.getElementById("loopIcon").src =
      "../Assets/icons/loop-enabled.svg";
  }
}
var shuffle = false;
function shuffleAudio() {
  shuffle = !shuffle;
  if (shuffle == false) {
    // alert("Shuffle Disabled");
    console.log("Shuffle Disabled");
    document.getElementById("shuffleIcon").src = "../Assets/icons/shuffle.svg";
  } else {
    console.log("Shuffle Enabled");
    // alert("Shuffle Enabled");
    document.getElementById("shuffleIcon").src =
      "../Assets/icons/shuffle-enabled.svg";
  }
}
//restart audio
function playbackAudio() {
  x.load();
  playAudio();
  playing = true;
}
function changeAudio(musicPath, imgPath, songTitle, artistName) {
  currSong.src = musicPath;
  currentSongImg.src = imgPath;
  currentSongTitle.innerHTML = songTitle;
  currentArtist.innerHTML = artistName;
  playbackAudio();
  // console.log(x);
}
//control volume
var volumeRange = document.getElementById("volumeRange");
var audioVolume = volumeRange.value;
var volumeValue = document.getElementById("volumeValue");
volumeValue.innerHTML = volumeRange.value + "%";
volumeRange.oninput = function () {
  audioIcon.src = "../Assets/icons/volume.svg";
  volumeValue.innerHTML = this.value + "%";
  audioVolume = this.value;
  x.volume = this.value / 100;
};

// audioVolume = volumeRange.value;
var audioMuted = false;
var audioIcon = document.getElementById("volumeIcon");
function muteAudio() {
  if (audioMuted == false) {
    audioMuted = true;
    audioIcon.src = "../Assets/icons/mute.svg";
    volumeValue.innerHTML = "0%";
    x.volume = 0;
    volumeRange.value = 0;
  } else {
    audioMuted = false;
    audioIcon.src = "../Assets/icons/volume.svg";
    volumeValue.innerHTML = audioVolume + "%";
    x.volume = audioVolume / 100;
    volumeRange.value = audioVolume;
  }
}

//control time
var timerRange = document.getElementById("timerRange");
var currTime = document.getElementById("currTime");
timerRange.oninput = function () {
  x.currentTime = this.value;
  currTime.innerHTML = this.value;
};
//move slider every 1 second
var checkForRange = setInterval(() => {
  timerRange.value = x.currentTime;
  currTime.innerHTML =
    Math.floor(x.currentTime / 60) +
    ":" +
    parseFloat(x.currentTime - Math.floor(x.currentTime / 60) * 60).toFixed(0);
}, 1000);

// var maxPlayer = document.getElementById('miniPlayer');
// var playerMaximize = document.getElementById('playerMaximize');

// function maximizePlayer() {
//   maxPlayer.style.height = "100%";
//   playerMaximize.src = '../Assets/icons/minimize.svg';
// }

//get duration of song when metadata is loaded and display it
x.onloadedmetadata = function returnDuration() {
  var durationTime = x.duration;
  document.getElementById("duration").innerHTML =
    Math.floor(x.duration / 60) +
    ":" +
    parseFloat(x.duration - Math.floor(x.duration / 60) * 60).toFixed(0);
  x.volume = volumeRange.value / 100;
};
