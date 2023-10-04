<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>
<body>
    <div class="wrapper">
    <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        
        if ($rows == 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row["id"];
            $_SESSION['user_name'] = $row["name"];
            $_SESSION['user_email'] = $row["email"];
            $_SESSION['user_password'] = $password;
            $_SESSION['role'] = $row["role"];
            

            header("Location: doctor_dashboard.php");
        } 
        else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
                }
            } 
    else {
        ?>

    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <button type="submit" name="submit">Login</button>
        <p class="link"><a href="registration.php">New Registration</a></p>
    </form>

  <?php } ?>

</div>
</body>

</html>

