<?php
require('db.php');
include("auth_session.php");

$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM users WHERE id = $user_id";
mysqli_query($con, $sql);

if(session_destroy()) {
    header( "refresh:5;url=login.php" );
    echo("We Will Redirect you in 5 Seconds");
    die("Account Deleted,");
}
?>