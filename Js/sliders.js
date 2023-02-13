var scrollPerClick = document.getElementsByClassName("box1");
var sliders = document.getElementsByClassName("recommendedSliders");
var backArrow = document.getElementsByClassName("back-arrow");
var forwardArrow = document.getElementsByClassName("forwardArrow");
// Scroll Functionality
var scrollAmounts = [150, 150, 150];

function sliderScrollLeft(number) {
  sliders[number].scrollTo({
    top: 0,
    left: (scrollAmounts[number] -= scrollPerClick[0].clientWidth + 150),
    behavior: "smooth",
  });

  if (scrollAmounts[number] <= 0) {
    scrollAmounts[number] = 0;
    backArrow[number].src = '../Assets/icons/back-arrow-disabled.svg';
  }
  console.log("Scroll Amount: ", scrollAmounts[number]);
}

function sliderScrollRight(number) {
  if (scrollAmounts[number] <= sliders[number].scrollWidth - sliders[number].clientWidth) {
    sliders[number].scrollTo({
      top: 0,
      left: (scrollAmounts[number] += scrollPerClick[0].clientWidth + 150),
      behavior: "smooth",
    });
    backArrow[number].src = '../Assets/icons/back-arrow-enabled.svg';
  }
  console.log("Scroll Amount: ", scrollAmounts[number]);
}
