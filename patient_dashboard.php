<?php
require('db.php');
include("auth_session.php");

if ($_SESSION['role'] == 'doctor') {
    header( "refresh:5;url=doctor_dashboard.php" );
    echo("We Will Redirect You To Signup Page After 5 Seconds");
    die("Valid email is required");
}
elseif ($_SESSION['role'] == 'secretary') { 
    header( "refresh:5;url=secretary_dashboard.php" );
    echo("We Will Redirect You To Signup Page After 5 Seconds");
    die("Valid email is required");
}
elseif ($_SESSION['role'] == 'patient') { 

    $query = "SELECT * FROM users";
    $result   = mysqli_query($con, $query);
    $all_users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html id="html" class="" lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Patient Dashboard</title>
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
          <a href="patient_dashboard.php" title="Dashboard">Dashboard</a>
        </div>
        <div class="navbar-right">
          <ul>
            <li class="admin-area">
              <a href="edit_profile.php"> setiings </a>
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
    <h1 style="text-align:center;">Welcome <?php echo($_SESSION['role'] . ' ' .$_SESSION['user_name']); ?></h1>
        <div class="container-fluid container-limited-width">
            <div class="container-fluid container-limited-width">
            <div class="sites-container">
                <div class="page-header">
                <div class="page-title">
                    <h1>Users</h1>
                </div>
                </div>
                <div class="page-content">
                <div class="sites-page-container">
                    <div class="card card-table">
                    <div class="card-body card-body-no-padding">
                        <table class="table table-sites">
                        <thead>
                            <tr>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Role </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_users as $user) {
                                echo('<tr>');
                                echo('<td>' . $user['name'] . '</td>');
                                echo('<td>' . $user['email'] . '</td>');
                                echo('<td>' . $user['role'] . '</td>');
                                echo('</tr>');
                            }
                            ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
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



<?php } ?>