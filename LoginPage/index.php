<?php include_once 'proses.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="/Watchdrit-Project-Website/LoginPage/style.css"
    />
  </head>
  <body>
    <div class="container">
      <input type="checkbox" id="flip" />
      <div class="cover">
        <div class="front">
          <img
            src="/Watchdrit-Project-Website/LoginPage/addons/Logo.png"
            alt=""
          />
          <div class="text">
            <span class="text-1"
              >Time Unleashed,<br />
              Fashion Embraced.</span
            >
            <span class="text-2">Let's get shop</span>
          </div>
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
            <form action="#" method="POST">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input
                    type="text"
                    name="email"
                    placeholder="Enter your email"
                    required
                  />
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                  />
                </div>
                <div class="text"><a href="/Watchdrit-Project-Website/LoginPage/updatepassword.php">Update Password</a></div>
                <div class="button input-box">
                  <input type="submit" name="login" value="Submit" />
                </div>
                <div class="text sign-up-text">
                  Don't have an account? <label for="flip">Signup now</label>
                </div>
              </div>
            </form>
          </div>
          <div class="signup-form">
            <div class="title">Signup</div>
            <form action="#" method="POST">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input
                    type="text"
                    name="name"
                    placeholder="Enter your name"
                    required
                  />
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input
                    type="text"
                    name="email"
                    placeholder="Enter your email"
                    required
                  />
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                  />
                </div>
                <div class="button input-box">
                  <input type="submit" name="signup" value="Submit" />
                </div>
                <div class="text sign-up-text">
                  Already have an account? <label for="flip">Login now</label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
