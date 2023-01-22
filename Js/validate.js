const nameRegex = /^[a-zA-Z\-]{2,}$/;
const usernameRegex = /^[a-zA-Z0-9-!$%^&*()_@#]{4,}$/;
const passwordRegex = /^[a-zA-Z0-9-!$%^&*()_@#]{5,}$/;
const emailRegex = /^([A-Za-z0-9_\-.]{3,})+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;

var username = document.getElementById("username");
var password = document.getElementById("password");
var email = document.getElementById("email");
var errMsg = document.getElementById("errorMsg");
var userNotFound = document.getElementById("userNotFound");

function validateLogin() {
  if (validateUsername() == false || validatePassword() == false) {
    errMsg.style.display = "flex";
    return false;
  }
}
function validateRegister() {
  if (
    validateUsername() == false ||
    validateEmail() == false ||
    validatePassword() == false
  ) {
    errMsg.style.display = "flex";
    return false;
  }
}
function validateUsername() {
  if (username.value == "" || !username.value.match(usernameRegex)) {
    console.log(username.value);
    username.style.border = "3px solid red";
    username.classList.add("errPlaceholder");
    errMsg.style.display = "flex";
    userNotFound.style.display = "none";
    return false;
  } else {
    username.style.border = "3px solid #0f3034";
    username.classList.remove("errPlaceholder");
    errMsg.style.display = "none";
    return true;
  }
}
function validatePassword() {
  if (password.value == "" || !password.value.match(passwordRegex)) {
    password.style.border = "3px solid red";
    password.classList.add("errPlaceholder");
    errMsg.style.display = "flex";
    userNotFound.style.display = "none";
    return false;
  } else {
    password.style.border = "3px solid #0f3034";
    password.classList.remove("errPlaceholder");
    errMsg.style.display = "none";
    return true;
  }
}
function validateEmail() {
  if (email.value == "" || !email.value.match(emailRegex)) {
    email.style.border = "3px solid red";
    email.classList.add("errPlaceholder");
    errMsg.style.display = "flex";
    return false;
  } else {
    email.style.border = "3px solid #0f3034";
    email.classList.remove("errPlaceholder");
    errMsg.style.display = "none";
    return true;
  }
}