<?php
$titre = 'Inscription';
include('header.php'); 

//Récupération des variables
$nom = strtolower(htmlspecialchars($_POST['nom']));
$prenom = strtolower(htmlspecialchars($_POST['prenom']));
$pseudo = strtolower(htmlspecialchars($_POST['pseudo']));
$email = strtolower(htmlspecialchars($_POST['email']));
$mdp = htmlspecialchars($_POST['mdp']);
$classe = htmlspecialchars($_POST['classe']);
$tuteur = $_POST['tuteur'];


//Vérification avec les données de la base du nom et du prénom
$sql = $pdo->prepare("SELECT COUNT(*) AS existe FROM `membre` WHERE nom = ? AND prenom = ?");
$sql->execute(array($nom,$prenom));
$donnee = $sql->fetch();
$sql->closeCursor();
//Puis du pseudo
$verification = $pdo->prepare("SELECT COUNT(*) AS existe2 FROM `membre` WHERE pseudo= ?");
$verification->execute(array($pseudo));
$donnee2 = $verification->fetch();

if ($donnee['existe'] != 0) 
{
	echo "Vous avez déja un compte $nom . <a href='profil.php'>Se connecter.</a>";
}
elseif ($donnee2['existe2'] != 0) 
{
	echo "Ce pseudo existe déja. En choisir un autre. <a href='inscription.php'>Retour</a>";
}
else
{
	$req = "INSERT INTO `membre`(nom, prenom, pseudo, email, mdp, classe, date) VALUES(?,?,?,?,MD5(?),?,NOW())";
	$rep = $pdo->prepare($req);
	$rep->execute(array($nom,$prenom,$pseudo,$email,$mdp,$classe));
	$rep->closeCursor();
	if ($tuteur == 1) 
	{
		$rep2 = $pdo->query("UPDATE membre SET tuteur = 1 WHERE pseudo = '$pseudo'");
	}
	echo "Félicitation, vous avez bien été enregistré.<a href='accueil.php'>Retour<a>";
}

include('footer.php'); ?>