<?php
$titre = 'Projets';
include('header.php'); 

if (isset($_SESSION['id']))
{
	$id = $_SESSION['id'];
	$classe = $_SESSION['classe'];
?>
	<h3>Inscription d'un projet</h3>
	<h4>Etudiants</h4>

	<form action="gestion_projet.php" method="post">

<?php
	for ($i=1; $i <4 ; $i++) 
	{ 
		echo "<label for='etu$i'><strong>Etudiant n° $i : </strong></label> ", PHP_EOL;
		echo "<select id='etu$i' name='etu$i' required>", PHP_EOL;
		$req = $pdo->query("SELECT pseudo, id FROM membre WHERE classe = '$classe'");
		while ($donnee = $req->fetch()) 
		{
			echo "<option value=$donnee[1]> $donnee[0]</option>";
		}
		echo "</select> <br/>", PHP_EOL;

	}

?>	
	<label for="ue">Projet de : </label>	
	<select name="ue" id="ue" required>
		<option value="">--Choisir la matière--</option>
<?php
	
	if ($classe == 'L1') 
	{
		$req2 = $pdo->query("SELECT matiere, id FROM ue WHERE numero LIKE '1%' OR numero LIKE '2%' ");
		echo "1";
	}
	elseif ($classe == 'L2') 
	{
		$req2 = $pdo->query("SELECT matiere, id FROM ue WHERE numero LIKE '3%' OR numero LIKE '4%' ");
		echo "2";
	}
	else
	{
		$req2 = $pdo->query("SELECT matiere, id FROM ue WHERE numero LIKE '5%' OR numero LIKE '6%' ");
		echo "3";
	}

	while ($donnee2 = $req2->fetch()) 
	{
		echo "<option value=$donnee2[1]> $donnee2[0] </option>";
	}
?>
	</select> <br/>
	
	<label for="nom">Nom du projet : </label>
	<input type="text" name="nom" id="nom" /> <br/>
	<label for="desc">Description du projet</label>
	<textarea name="description" rows="15" cols="50" id="desc">Notez ici l'intérêt de votre projet
	</textarea> <br />
	<input type="submit" value="Créer" >

	</form>
<?php
}
else
{
	echo "Vous n'êtes pas connecté. Se <a href='connexion.php'>connecter</a>. <br/>", PHP_EOL;
	echo "<a href='inscription.php'>S'inscrire</a>", PHP_EOL;
}





include('footer.php'); ?>




