<?php
$titre = 'Forum';
include('header.php'); 

if (isset($_POST['titre'])) 
{
	$id_membre = $_SESSION['id'];
	$titre = $_POST['titre'];
	$req = "INSERT INTO forum (id_membre,titre,date) VALUES (?,?,NOW())";
	$rep = $pdo->prepare($req);
	$rep->execute(array($id_membre,$titre));
	$req->closeCursor();

	$req2 = $pdo->query("SELECT max(id) FROM forum");
	$donnee = $req2->fetch();
	$id = $donnee[0];

	echo "Voir le <a href='forum.php?id=$id'>forum</a>", PHP_EOL;
	echo "<br/> <a href='forum.php'>Retour</a> ";
}

elseif (isset($_SESSION['id'])) 
{
?>

	<form action="creer_forum.php" method="post">

		<label for="titre">Titre du forum</label>
		<input type="text" name="titre" required> <br/>
		<input type="submit" value="Créer"> <br/>
		
	</form>

<?php
	echo "<a href='forum.php'>Retour</a> <br/>";
}
else
{
	echo "<a href='connexion.php'>Connectez-vous</a> pour créer un forum <br/>", PHP_EOL;
	echo "Pas encore de compte ? <a href='inscription.php'>Inscrivez-vous</a> <br/>", PHP_EOL;
	echo "<a href='forum.php'>Retour</a> <br/>";
}


include('footer.php'); ?>