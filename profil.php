<?php
$titre = 'Profil';
include('header.php'); 

if (isset($_SESSION['pseudo'])) 
{
	echo "Bienvenue ", $_SESSION['pseudo'], "<br/>", PHP_EOL;
	echo "Se <a href='deconnexion.php'>déconnecter</a>", PHP_EOL;
}
else
{
	echo "Vous n'êtes pas connecté. Se <a href='connexion.php'>connecter</a>. <br/>", PHP_EOL;
	echo "<a href='inscription.php'>S'inscrire</a>", PHP_EOL;}

?>

 


<?php include('footer.php'); ?>