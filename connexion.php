<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `user` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php");
  }else{
    $message = "Erreur recommencé";
  }
}
?>
<form class="box" action="" method="post" name="login">
<div<ul class='box-image'><img width="50" src="image2.png"/></ul></div>
<h1 class="box-logo">A vous de jouer</h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Identifiant">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="reset" value="Reset">
<input type="submit" value="Valider " name="submit" class="box-button">
<p class="box-inscription">Vous êtes nouveau ici ? <a href="inscription.php">Ajout compte</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>