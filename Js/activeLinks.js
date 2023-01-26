const path = "/Projekti-WebInxh/Views/";
var activeLink;

const homeLink = document.getElementById("homeLink");
const browseLink = document.getElementById("browseLink");
const favoritesLink = document.getElementById("favoritesLink");
const dashboardLink = document.getElementById("dashboardLink");
const mobiledashboardLink = document.getElementById("mobile-dashboardLink");
const mobilehomeLink = document.getElementById("mobile-homeLink");
const mobilebrowseLink = document.getElementById("mobile-browseLink");
const mobilefavoritesLink = document.getElementById("mobile-favoritesLink");

window.onload = function () {
  showUrl();
};
function showUrl() {
  if (path + "home.php" == window.location.pathname) {
    // alert(window.location.pathname);
    homeLink.classList.add("active");
    mobilehomeLink.classList.add("active");
    activeLink = homeLink;
  } else if (path + "browse.php" == window.location.pathname) {
    // alert(window.location.pathname);
    browseLink.classList.add("active");
    mobilebrowseLink.classList.add("active");
    activeLink = browseLink;
  } else if (path + "favorites.php" == window.location.pathname) {
    // alert(window.location.pathname);
    favoritesLink.classList.add("active");
    mobilefavoritesLink.classList.add("active");
    activeLink = favoritesLink;
  } else if (path + "adminView.php" == window.location.pathname) {
    // alert(window.location.pathname);
    dashboardLink.classList.add("active");
    mobiledashboardLink.classList.add("active");
    activeLink = dashboardLink;
  } else {
    // alert("false: " + window.location.pathname);
  }
}