<?php
$titre = 'Forum';
include('header.php'); 

if (isset($_GET['id'])) 
{
	$id = $_GET['id'];
	$titre = $_GET['titre'];
	$req = "SELECT pseudo, message, message_forum.date FROM forum, membre, message_forum WHERE membre.id = message_forum.id_membre AND id_forum = $id ";
	$rep = $pdo->query($req);
	
	echo "<h1> $titre </h1> <br/>", PHP_EOL;
	while ($donnee = $rep->fetch()) 
	{
		echo $donnee['pseudo'], " : ", $donnee['message'], " le ", $donnee['date'],"<br/>", PHP_EOL;
	}
}
else
{
	$req = "SELECT forum.id, titre, forum.date, pseudo, classe FROM `forum` INNER JOIN `membre` WHERE membre.id = forum.id_membre";
	$rep = $pdo->query($req);

	echo "<div class='forum'>", PHP_EOL;
	while ($donnee = $rep->fetch()) 
	{
		$id = $donnee['id'];
		$titre = $donnee['titre'];
		echo "Forum de ", $donnee['pseudo'], "le ", $donnee['date'], " titre : <a href='forum.php?id=$id&titre=$titre'> $titre </a> en ", $donnee['classe'], "<br/>", PHP_EOL;
	}
	echo "</div>", PHP_EOL;
	$rep->closeCursor();
}

include('footer.php'); ?>