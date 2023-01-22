<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="../CSS/register.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
</head>

<body>
  <div id="checkRE" class="regexModalInfo">
    <div class="modalHeader">
      <h2>Need Help With RegEx?</h2>
      <img onclick="closeModal()" src="../Assets/icons/close.svg" alt="close">
    </div>
    <div class="modalBody">
      <h1>Username:</h1>
      <p>-Username must contain at least 4 characters, uppercase or lowercase letters, symbols and numbers</p>
      <h1>Email:</h1>
      <p>-Email must be valid, it should start with minimun of 3 characters which can be uppercase or lowercase letters, numbers or these symbols(.dot, _underline, -line), after that it must contain the @ symbol, and afterward it may contain the same combination as in the name, and in the end it must contain a dot(.)symbol followed by the domain name where only string can be accepted.</p>
      <h1>Password:</h1>
      <p>-Password must contain at least 5 characters, uppercase or lowercase letters, symbols and numbers</p>
    </div>
  </div>
  <div class="Main">
    <div class="logo">
      <svg width="300" height="224" viewBox="0 0 478 224" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M109.745 15.36C105.247 14.4945 100.849 17.7208 99.9859 22.2065L83.1516 109.696C82.72 111.939 80.2587 112.633 78.51 111.129C71.7917 105.184 62.9108 101.439 53.1491 100.72C33.2977 99.5242 15.1223 112.308 9.48798 130.999C1.61118 156.824 19.0123 182.852 45.4352 186.19C67.9276 188.771 88.4991 172.665 92.761 150.515L114.939 35.2563C124.108 40.5139 129.342 51.1144 127.236 62.058C126.59 65.4181 127.917 69.158 131.063 70.9307C136.474 74.5873 142.945 71.1806 144.023 65.5776C148.501 42.3023 133.094 19.5629 109.745 15.36ZM55.302 118.293C69.3298 120.992 78.4028 134.376 75.7059 148.392C73.0074 162.417 59.6171 171.47 45.5893 168.771C31.5531 166.07 22.4869 152.696 25.1855 138.671C27.8823 124.655 41.2657 115.592 55.302 118.293Z" fill="#fff" />
        <path d="M150.07 186.268C141.97 186.268 134.67 184.518 128.17 181.018C121.67 177.518 116.57 172.668 112.87 166.468C109.27 160.168 107.47 153.068 107.47 145.168C107.47 137.268 109.27 130.218 112.87 124.018C116.57 117.818 121.67 112.968 128.17 109.468C134.67 105.968 141.97 104.218 150.07 104.218C158.27 104.218 165.62 105.968 172.12 109.468C178.62 112.968 183.67 117.818 187.27 124.018C190.97 130.218 192.82 137.268 192.82 145.168C192.82 153.068 190.97 160.168 187.27 166.468C183.67 172.668 178.62 177.518 172.12 181.018C165.62 184.518 158.27 186.268 150.07 186.268ZM150.07 170.218C156.97 170.218 162.67 167.918 167.17 163.318C171.67 158.718 173.92 152.668 173.92 145.168C173.92 137.668 171.67 131.618 167.17 127.018C162.67 122.418 156.97 120.118 150.07 120.118C143.17 120.118 137.47 122.418 132.97 127.018C128.57 131.618 126.37 137.668 126.37 145.168C126.37 152.668 128.57 158.718 132.97 163.318C137.47 167.918 143.17 170.218 150.07 170.218ZM246.749 186.268C238.649 186.268 231.349 184.518 224.849 181.018C218.349 177.518 213.249 172.668 209.549 166.468C205.949 160.168 204.149 153.068 204.149 145.168C204.149 137.268 205.949 130.218 209.549 124.018C213.249 117.818 218.349 112.968 224.849 109.468C231.349 105.968 238.649 104.218 246.749 104.218C254.949 104.218 262.299 105.968 268.799 109.468C275.299 112.968 280.349 117.818 283.949 124.018C287.649 130.218 289.499 137.268 289.499 145.168C289.499 153.068 287.649 160.168 283.949 166.468C280.349 172.668 275.299 177.518 268.799 181.018C262.299 184.518 254.949 186.268 246.749 186.268ZM246.749 170.218C253.649 170.218 259.349 167.918 263.849 163.318C268.349 158.718 270.599 152.668 270.599 145.168C270.599 137.668 268.349 131.618 263.849 127.018C259.349 122.418 253.649 120.118 246.749 120.118C239.849 120.118 234.149 122.418 229.649 127.018C225.249 131.618 223.049 137.668 223.049 145.168C223.049 152.668 225.249 158.718 229.649 163.318C234.149 167.918 239.849 170.218 246.749 170.218ZM369.557 170.218V185.218H300.407V173.368L318.407 151.618H305.957V137.818H329.807L344.357 120.118H301.307V105.118H368.357V116.968L350.957 137.968H363.857V151.768H339.557L324.257 170.218H369.557ZM465.106 105.118V173.068C465.106 201.268 451.256 215.368 423.556 215.368C416.256 215.368 409.256 214.368 402.556 212.368C395.956 210.468 390.506 207.668 386.206 203.968L394.606 189.868C398.006 192.768 402.156 195.068 407.056 196.768C411.956 198.468 417.106 199.318 422.506 199.318C430.706 199.318 436.706 197.318 440.506 193.318C444.406 189.418 446.356 183.368 446.356 175.168V171.418C443.356 174.718 439.706 177.268 435.406 179.068C431.106 180.768 426.456 181.618 421.456 181.618C410.756 181.618 402.306 178.668 396.106 172.768C390.006 166.868 386.956 158.018 386.956 146.218V105.118H405.706V143.818C405.706 150.918 407.306 156.268 410.506 159.868C413.806 163.368 418.456 165.118 424.456 165.118C431.156 165.118 436.456 163.068 440.356 158.968C444.356 154.868 446.356 148.918 446.356 141.118V105.118H465.106Z" fill="#fff" />
      </svg>
    </div>
  </div>
  <div class="TitleDiv">
    <h1>REGISTER</h1>
  </div>
  <div class="Content">
    <div class="QuickRegister">
      <div class="registerTitle">
        <h2>register by:</h2>
      </div>
      <div class="twoQuickRegisters">
        <button class="registerBy"><span><img src="../Assets/Images/Outlook.png" alt="Outlook"></span> <span>Outlook</span></button>
        <button class="registerBy"><span><img src="../Assets/Images/Facebook.png" alt="Facebook.png"></span> <span>Facebook</span></button>
      </div>
      <div class="GoogleQuickRegister">
        <button class="registerBy google"><span><img src="../Assets/Images/Google.png" alt="Google"></span> <span>Gmail</span></button>
        <h3 style="margin-top: 20px;"><a href="../Views/login.php">Already have an account?</a></h3>
        <h3 onclick="openModal()" class="openModal" style="margin-top: 20px;">Check RegEx validity</h3>
      </div>
    </div>
    <div class="VerticalLine">
      <hr class="line">
      </hr>
    </div>
    <div class="RegisterField">
      <div class="InputFields">
        <div class="registerTitle">
          <h2>register an account:</h2>
        </div>
        <form action="../PHP/registerData.php" method="POST" onsubmit="return validateRegister()">
          <div class="input">
            <label for="text" id="errorMsg" class="errorMsg">*Your Name, Username or Password is Incorrect</label>
            <input id="username" name="username" type="text" placeholder="Username" onchange="validateUsername()">
            <input id="email" name="email" type="text" placeholder="Email" onchange="validateUsername()">
            <input id="password" name="password" type="password" placeholder="Password" onchange="validatePassword()">
            <button class="RegisterBtn" name="registerBtn">Register</button>
          </div>
        </form>
      </div>
    </div>
    <script src="../JS/validate.js">
    </script>
    <script>
      var checkRE = document.getElementById("checkRE");
      var htmlArea = document.getElementsByTagName("html");
      var isOpen = false;

      function openModal() {
        if (isOpen == false) {
          checkRE.style.display = "inline";
          isOpen = true;
        } else {
          closeModal();
        }
      }

      function closeModal() {
        checkRE.style.display = "none";
        isOpen = false;
      }
    </script>
</body>

</html>