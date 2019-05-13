<?php
$titre = 'Tuteurs';
include('header.php'); 

$req = $pdo->query("SELECT nom, prenom,pseudo,classe FROM membre WHERE tuteur = 1");
while ($donnee = $req->fetch()) 
{
	echo "Tuteur : ", $donnee['nom']," ", $donnee['prenom'], " ", $donnee['pseudo'], " ", $donnee['classe'], "<br/>", PHP_EOL;
}


include('footer.php'); ?>