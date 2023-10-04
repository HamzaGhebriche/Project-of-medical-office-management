<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {

        if (empty($_REQUEST["username"])) {
            header( "refresh:5;url=signup.php" );
            echo("We Will Redirect You To Signup Page After 5 Seconds");
            die("Username is required");
            
        }
        
        if (empty($_REQUEST["name"])) {
            header( "refresh:5;url=signup.php" );
            echo("We Will Redirect You To Signup Page After 5 Seconds");
            die("Name is required");
        }
        
        if (!filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)) {
            header( "refresh:5;url=signup.php" );
            echo("We Will Redirect You To Signup Page After 5 Seconds");
            die("Valid email is required");
        }
        
        if (strlen($_REQUEST["password"]) < 8) {
            header( "refresh:5;url=signup.php" );
            echo("We Will Redirect You To Signup Page After 5 Seconds");
            die("Password must be at least 8 characters");
        }
        
        if (!preg_match("/[a-z]/i", $_REQUEST["password"])) {
            header( "refresh:5;url=signup.php" );
            echo("We Will Redirect You To Signup Page After 5 Seconds");
            die("Password must contain at least one letter");
        }
        
        if (!preg_match("/[0-9]/", $_REQUEST["password"])) {
            header( "refresh:5;url=signup.php" );
            echo("We Will Redirect You To Signup Page After 5 Seconds");
            die("Password must contain at least one number");
        }
        
        if ($_POST["password"] !== $_REQUEST["password_confirmation"]) {
            header( "refresh:5;url=signup.php" );
            echo("We Will Redirect You To Signup Page After 5 Seconds");
            die("Passwords must match");
        }

        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $role    = stripslashes($_REQUEST['role']);
        $role    = mysqli_real_escape_string($con, $role);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, name, password, email, role, create_datetime) VALUES ('$username', '$name', '" . md5($password) . "', '$email', '$role', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } 
        
        else {
            echo "<div class='form'>
                  <h3>Something Went Wrong, Sorry For The Inconvenience.</h3><br/>
                  </div>";
        }
    } 

else {
?>

<div class="wrapper">
        <h1>Sign up</h1>
        <form class="form" action="" method="post">
            <input type="text" placeholder="Username" name="username">
            <input type="text" placeholder="Name" name="name">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Re-Enter Password" name="password_confirmation">
            <br><br>
            <select name="role">
                <option value="doctor">doctor</option>
                <option value="secretary">secretary</option>
                <option value="patient">patient</option>
            </select>
            <br><br>
            <input type="submit" name="submit" value="Register" class="login-button">
        </form>       
            
            <div class="member">
                Already a member? <a href="login.php">Login here</a>
            </div>

        
    </div>


<?php } ?>
 
</body>
</html>

