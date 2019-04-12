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
		echo "Vous êtes connecté.";
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

	<label>Pseudo<input type="text" name="pseudo" required></label><br/>
	<label>Mot de passe<input type="password" name="mdp" required></label><br/>
	<input type="submit" name="envoyer">

</form>

<?php
}

include('footer.php'); ?>