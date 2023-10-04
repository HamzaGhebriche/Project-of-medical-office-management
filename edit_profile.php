<?php
require('db.php');
include("auth_session.php");

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = $_POST["username"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  // Update user information in database
  $user_id = $_SESSION['user_id'];
  $sql = "UPDATE users SET username = '$username', name = '$name', email = '$email', password = '" . md5($password) . "' WHERE id = $user_id";
  mysqli_query($con, $sql);

  // Destroy session

  if(session_destroy()) {
    header( "refresh:5;url=login.php" );
    echo("We Will Redirect you in 5 Seconds");
    die("Account Details Changed, You Should  Login Again");
  }
}

?>


<!DOCTYPE html>
<html id="html" class="" lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doctor Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/user_page_style.css" rel="stylesheet">
  </head>
  <body>
    <header class="header d-flex">
      <div class="logo">
        <a href="#" title="Panel Logo">
          <img id="logo" alt="CloudPanel" src="images/doctorlogo.jpg" width="150" height="35">
        </a>
      </div>
      <div class="navbar-right-container d-flex w-100">
        <div class="nav-link-container w-100">
          <a href="doctor_dashboard.php" title="Dashboard">Dashboard</a>
        </div>
        <div class="navbar-right">
          <ul>
            <li class="admin-area">
              <a href="user_setting.php"> setiings </a>
            </li>
            <li class="admin-area">
              <a href="logout.php"> Logout </a>
            </li>	
            <li class="admin-area">
              <a href="delete_account.php" style='color:red;'> Delete Account </a>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <main id="main-container" class="main-container">
  <div class="container-fluid container-limited-width">
    <div class="account-container">
      <div class="page-header">
        <div class="page-title">
          <h1>Account</h1>
        </div>
      </div>
      <div class="page-content">
        <div class="account-content-container">
          <form method="post">
            <div class="card">
              <div class="card-header"> Settings </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6 ">
                    <label class="col-form-label required" for="user_settings_email">UserName</label>
                    <input type="text" name="username" required="required" class="form-control form-control-lg" value="<?php echo($_SESSION['username']); ?>">
                  </div>
                  <div class="col-6 ">
                    <label class="col-form-label required" for="user_settings_email">Name</label>
                    <input type="text" name="name" required="required" class="form-control form-control-lg" value="<?php echo($_SESSION['user_name']); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <label class="col-form-label required" for="user_settings_email">Email</label>
                    <input type="email" name="email" required="required" class="form-control form-control-lg" value="<?php echo($_SESSION['user_email']); ?>">
                  </div>
                  <div class="col-6 ">
                    <label class="col-form-label required" for="user_settings_email">Password</label>
                    <input type="password" name="password" required="required" class="form-control form-control-lg" value="<?php echo($_SESSION['user_password']); ?>">
                  </div>
                </div>
              </div>
              
              <div class="card-footer text-end">
                <input type="submit" value="Save Changes" class="btn btn-blue btn-lg">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
    <footer class="footer fixed-bottom">
      <div class="container">
        <ul>
          <li> © 2023 Powred By Hamza Ghebrich </li>
        </ul>
      </div>
    </footer>
  </body>
</html>