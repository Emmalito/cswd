<?php
$titre = 'Discussion';
include('header.php');

if (isset($_GET['id']) and isset($_SESSION['id'])) 
{
	echo "<a href='discussion.php'>Retour</a> <br/>";
	$id_discussion = $_GET['id'];
	$req = $pdo->query("SELECT pseudo, titre, texte, discussion.date FROM discussion INNER JOIN membre ON id_receveur = membre.id WHERE discussion.id = $id_discussion");
	$donnee = $req->fetch();

	echo "<h2>$donnee[1]</h2>", PHP_EOL;
	echo "$donnee[2] <br/> de $donnee[0] le $donnee[3] <br/>", PHP_EOL;

	$req2 = $pdo->query("UPDATE discussion SET lu = '1' WHERE id = $id_discussion");

}
elseif (isset($_SESSION['id'])) 
{
	echo "<a href='discussion.php'>Retour</a> <br/>";
	$id = $_SESSION['id'];

	$req = $pdo->query("SELECT pseudo, titre, texte, discussion.date, discussion.id FROM discussion INNER JOIN membre ON id_receveur = membre.id WHERE id_expediteur = $id");

	echo "<ul id='message'> ", PHP_EOL;
	while ($donnee = $req->fetch()) 
	{
		$id_discussion = $donnee[4];
		echo "<li> <a href='discussion.php?id=$id_discussion'> <strong>$donnee[1]</strong> </a> de $donnee[0] le $donnee[3]", PHP_EOL;
	}
	echo "</ul>", PHP_EOL;

}
else
{
	echo "Vous n'êtes pas connecté. Se <a href='connexion.php'>connecter</a>. <br/>", PHP_EOL;
	echo "<a href='inscription.php'>S'inscrire</a>", PHP_EOL;
}


include('footer.php'); ?>