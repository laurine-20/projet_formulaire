<?php
  session_start();
  // On vérifie si l'utilisateur est connecté. Si ce n'est pas le cas on le redirige vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: connexion.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p> Vous êtes connectés</p>
    <a href="deconnexion.php">Déconnexion</a>
    </div>
  </body>
</html>