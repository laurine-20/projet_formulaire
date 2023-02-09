<?php
  // Initialiser la session
  session_start();
  
  // Détruire la session
  if(session_destroy())
  {
  // On redirige vers la page de connexion
    header("Location: connexion.php");
  }
?>