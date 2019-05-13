<?php
$titre = 'Discussion';
include('header.php');

if (isset($_SESSION['id']) and isset($_POST['pseudo'])) 
{
	$id_expediteur = $_SESSION['id'];
	$id_receveur = $_POST['pseudo'];
	$titre = $_POST['titre'];
	$message = $_POST['message'];
	
	$req = $pdo->query("INSERT INTO discussion(id_receveur,id_expediteur,titre,texte,date,lu) VALUES ($id_expediteur,$id_receveur,'$titre','$message',NOW(),'0')");
	echo "Message envoyé.";
}

elseif (isset($_SESSION['id'])) 
{
?>
	<form action="rediger.php" method="post">
		
		<label for="pseudo">Destinataire (pseudo) : </label>
		<select name="pseudo" id="pseudo" required> 
			<?php
			$req = $pdo->query("SELECT id,pseudo FROM membre");
			while ($donnee = $req->fetch()) 
			{
				echo "<option value=$donnee[0]> $donnee[1] </option> <br/>", PHP_EOL;
			}
			?>
		</select> <br/>
		<label for="titre">Titre : </label>
		<input type="text" name="titre" id="titre" ><br/>
		<label for="msg">Message : </label>
		<textarea id="msg" rows="5" cols="100" name="message" required>
		Entrez votre message			
		</textarea> <br/>
		<input type="submit" value="Envoyer">

	</form>
<?php 
	echo "<br/> <a href='discussion.php'>Retour</a> <br/>";
}

else
{
	echo "Vous n'êtes pas connecté. Se <a href='connexion.php'>connecter</a>. <br/>", PHP_EOL;
	echo "<a href='inscription.php'>S'inscrire</a>", PHP_EOL;
}


include('footer.php'); ?>