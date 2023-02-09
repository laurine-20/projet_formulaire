<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // On récupère le nom d'utilisateur et on supprime les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // On récupère l'email et on supprime les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // On récupère le mot de passe et on supprime les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requête sql, condition qu'on peut mettre qu'un email, puis mot de passe crypté 
  $sql = "SELECT email, COUNT(email)
  FROM user
  GROUP BY email
  HAVING COUNT(email) > 0";

    $compte = mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($compte) > 0) {
      echo "<div class='sucess'>
     <h3>Vous êtes déjà inscrit </h3>
   <p>Cliquez ici pour vous <a href='connexion.php'>connecter</a></p>
</div>";
  } else {
    $query = "INSERT into `user` (username, email, password)
    VALUES ('$username', '$email', '".hash('sha256', $password)."')";
$res = mysqli_query($conn, $query);
if($res){
echo "<div class='sucess'>
   <h3>Vous êtes inscrit avec succès </h3>
   <p>Cliquez ici pour vous <a href='connexion.php'>connecter</a></p>
</div>";
} 
  }
   
}else{
?>
<form class="box" action="" method="post">
<div<ul class='box-image'><img width="50" src="image2.png"/></ul> </div> 
  <h1 class="box-logo">A vous de jouer</h1>
    <h1 class="box-title">Ajout compte</h1>
  <input type="text" class="box-input" name="username" placeholder="Identifiant" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="reset" value="Reset">
    <input type="submit" name="submit" value="Ajout compte" class="box-button" />
    <p class="box-inscription">Déjà inscrit ? <a href="connexion.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>