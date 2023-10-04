<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion de Cabinet Médical</title>
  <link rel="stylesheet" href="css/style_acceuil.css">
</head>

<body>
  <header>
    <img src="images/doctorlogo.jpg" class="logo">
    <nav class="navigation">
<?php if(!isset($_SESSION["username"])) { ?>
      <ul>        
        <a href="index.php" class="active">Accueil</a>
        <a href="login.php">Connexion</a>
        <a href="signup.php">Inscription</a>
      </ul>
  <?php }  else { ?>
      <ul>        
          <a href="index.php" class="active">Accueil</a>
          <a href="doctor_dashboard.php">Dashboard</a>
        </ul>
  <?php } ?>
    </nav>
  </header>
  <section class="parallax">
    <h2 id="text">Gestion de Cabinet Médical</h2>    
  </section>

</body>

</html>