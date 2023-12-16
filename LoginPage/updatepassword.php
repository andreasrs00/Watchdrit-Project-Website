<?php include_once 'updateproses.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password Update</title>
    <link rel="stylesheet" href="/Watchdrit-Project-Website/LoginPage/update.css" />
  </head>
  <body>
    <div class="forms">
      <div class="update-password-form">
        <div class="title">Update Password</div>
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
                name="new_password"
                placeholder="Enter your new password"
                required
              />
            </div>
            <div class="button input-box">
              <input 
                type="submit"
                name="update_password"
                value="Update Password"
              />
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
