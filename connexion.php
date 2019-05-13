<?php
$titre = 'Connexion';
include('header.php'); 

if (isset($_POST['pseudo'])) 
{
	$pseudo = strtolower(htmlspecialchars($_POST['pseudo']));
	$mdp = htmlspecialchars($_POST['mdp']);
	$verification = $pdo->prepare("SELECT * FROM `membre` WHERE pseudo= ? AND mdp = MD5(?)");
	$verification->execute(array($pseudo,$mdp));
	$rep = $verification->fetch();
	if (isset($rep['pseudo'])) 
	{
		$_SESSION['pseudo'] = $rep['pseudo'];
		$_SESSION['id'] = $rep['id'];
		$_SESSION['classe'] = $rep['classe'];
		echo "Vous êtes connecté. <br/>", PHP_EOL;
		echo "<a href='profil.php'> Mes Infos </a>", PHP_EOL;
	}
	else
	{
		unset($_POST);
		echo "Votre compte ou mot de passe est incorrect. <a href='connexion.php'>Réessayer</a> "; 
	}
}
else
{
?>

<form action="connexion.php" method="post" class="formulaire">

	<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" required id="pseudo"><br/>
	<label for="mdp">Mot de passe : </label><input type="password" name="mdp" required id="mdp"><br/>
	<input type="submit" value="Envoyer">

</form>

<?php
}

include('footer.php'); ?>