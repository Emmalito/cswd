<?php

$titre = 'Déconnexion';
include('header.php'); 
session_destroy();
echo "Vous êtes déconnecté.";
include('footer.php'); 
?>