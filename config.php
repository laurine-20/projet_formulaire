<?php
// Informations d'identification
define('db_Server', 'localhost');
define('db_Username', 'root');
define('db_Password', 'root');
define('db_Name', 'formulaire');
 
// On se connecte à la base de données  
$conn = mysqli_connect(db_Server, db_Username, db_Password, db_Name);
 
// On vérifie ensuite la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>
