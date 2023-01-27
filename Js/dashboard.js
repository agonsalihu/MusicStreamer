var dropdown = document.getElementById("dropdown-content");
var arrowIcon = document.getElementById("arrow");

var isOpen = false;
function showDropdown() {
    isOpen = !isOpen;
    if (isOpen == true) {
        dropdown.style.display="block";
        arrowIcon.src = "../Assets/icons/up-arrow.svg";
    }else{
        dropdown.style.display="none";
        arrowIcon.src = "../Assets/icons/down-arrow.svg";
    }
}
var heartIcon;
var isLiked = true;
function likeSong(number) {
    isLiked = !isLiked;
    heartIcon = document.getElementById("heart"+number);
    if (isLiked == true) {
        heartIcon.src = "../Assets/icons/heart-filled.svg";
    }else{
        heartIcon.src = "../Assets/icons/heart.svg";
    }
}