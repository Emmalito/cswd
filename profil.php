<?php
$titre = 'Profil';
include('header.php'); 

if (isset($_SESSION['pseudo'])) 
{
	$pseudo = $_SESSION['pseudo'];
	echo "Bienvenue $pseudo <br/>", PHP_EOL;

	$req = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
	$donnee = $req->fetch();

	echo "Nom : $donnee[nom] <br/>", PHP_EOL;
	echo "Prenom : $donnee[prenom] <br/>", PHP_EOL;
	echo "Pseudo : $donnee[pseudo] <br/>", PHP_EOL;
	echo "Email : $donnee[email] <br/>", PHP_EOL;
	echo "Année : $donnee[classe] <br/>", PHP_EOL;
	echo "Se <a href='deconnexion.php'>déconnecter</a> <br/>", PHP_EOL;
	echo "<a href='modif_profil.php'>Modifier</a> mes infos", PHP_EOL;
}
else
{
	echo "Vous n'êtes pas connecté. Se <a href='connexion.php'>connecter</a>. <br/>", PHP_EOL;
	echo "<a href='inscription.php'>S'inscrire</a>", PHP_EOL;
}



include('footer.php'); ?>