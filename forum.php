<?php
$titre = 'Forum';
include('header.php'); 

if (isset($_GET['id'])) 
{
	$id = $_GET['id'];
	$rep0 = $pdo->query("SELECT titre from forum WHERE id = $id");
	$donne = $rep0->fetch();
	$titre = $donne['titre'];
	$rep0->closeCursor();

	if (isset($_POST['com'])) 
	{
		$id_membre = $_SESSION['id'];
		$message = $_POST['com'];
		$req = "INSERT INTO message_forum (id_forum,id_membre,message,date) VALUES (?,?,?,NOW())";
		$rep = $pdo->prepare($req);
		$rep->execute(array($id,$id_membre,$message));
		$rep->closeCursor();
	}

	
	$req = "SELECT pseudo, message, message_forum.date FROM (message_forum INNER JOIN membre ON membre.id = message_forum.id_membre) INNER JOIN forum ON id_forum = forum.id WHERE id_forum = $id";
	$rep = $pdo->query($req);
	
	echo "<h1> $titre </h1> <br/>", PHP_EOL;
	
	while ($donnee = $rep->fetch()) 
	{
		echo $donnee['pseudo'], " : ", $donnee['message'], " le ", $donnee['date'],"<br/>", PHP_EOL;
	}


	if (isset($_SESSION['id'])) 
	{
		?>

		<form action=<?php echo "forum.php?id=$id&titre=",$titre; ?> method="post">
			
			<label for="com">Répondre : </label>
			<textarea id="com" name="com" rows="5" cols="33" required> </textarea>
			<input type="submit" vlue="Répondre">

		</form>


		<?php
	}
	else
	{
		echo "Se <a href='connexion.php'> connecter </a> pour répondre.";
	}
	echo "<br/> <a href='forum.php'>Retour</a> ";
}
else
{
	$req = "SELECT forum.id, titre, forum.date, pseudo, classe FROM `forum` INNER JOIN `membre` WHERE membre.id = forum.id_membre";
	$rep = $pdo->query($req);

	echo "créer un <a href='creer_forum.php'>formum de discussion<a/></br>", PHP_EOL;

	echo "<div class='forum'>", PHP_EOL;
	while ($donnee = $rep->fetch()) 
	{
		$id = $donnee['id'];
		$titre = $donnee['titre'];
		echo "Forum de ", $donnee['pseudo'], "le ", $donnee['date'], " titre : <a href='forum.php?id=$id'> $titre </a> en ", $donnee['classe'], "<br/>", PHP_EOL;
	}
	echo "</div>", PHP_EOL;
	$rep->closeCursor();
}

include('footer.php'); ?>