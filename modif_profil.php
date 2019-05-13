<?php
$titre = 'Profil';
include('header.php'); 

if (isset($_SESSION['id'])) 
{
	if (isset($_POST['nom'])) 
	{
		$id = $_SESSION['id'];
		$nom = strtolower(htmlspecialchars($_POST['nom']));
		$prenom = strtolower(htmlspecialchars($_POST['prenom']));
		$pseudo = strtolower(htmlspecialchars($_POST['pseudo']));
		$email = strtolower(htmlspecialchars($_POST['email']));
		$mdp = htmlspecialchars($_POST['mdp']);		
		$amdp = htmlspecialchars($_POST['amdp']);	
		$classe = $_POST['classe'];
		$tuteur = $_POST['tuteur'];

		if ($nom != "") 
		{
			$req = $pdo->query("UPDATE membre SET nom = '$nom' WHERE id = $id");
			$req->closeCursor();
			echo "Votre nom à bien été modifié <br/>", PHP_EOL;
		}

		if ($prenom != "") 
		{
			$req = $pdo->query("UPDATE membre SET prenom = '$prenom' WHERE id = $id");
			$req->closeCursor();
			echo "Votre prenom à bien été modifié <br/>", PHP_EOL;
		}

		if ($email != "") 
		{
			$req = $pdo->query("UPDATE membre SET email = '$email' WHERE id = $id");
			$req->closeCursor();
			echo "Votre email à bien été modifié <br/>", PHP_EOL;
		}

		if ($classe != "") 
		{
			$req = $pdo->query("UPDATE membre SET classe = '$classe' WHERE id = $id");
			$req->closeCursor();
			echo "Votre classe à bien été modifié <br/>", PHP_EOL;
		}

		if ($tuteur != "") 
		{
			$req = $pdo->query("UPDATE membre SET tuteur = $tuteur WHERE id = $id");
			$req->closeCursor();
			echo "Votre statut à bien été modifié <br/>", PHP_EOL;
		}

		if ($pseudo != "") 
		{
			$verif= $pdo->query("SELECT COUNT(*) AS existe FROM `membre` WHERE pseudo= '$pseudo'");
			$donnee2 = $verif->fetch();

			if ($donnee2['existe'] != 0) 
			{ ?>

				Ce pseudo existe déja. En choisir un autre. <br/>
				<form action="modif_profil.php" method="post">

					<label for id="pseudo2"> Pseudo : </label>
					<input type="text" name="pseudo" id="pseudo2"> <br/>
					<input type="submit" value="Modifier" >

				</form>

			<?php }
			else
			{
				$req = $pdo->query("UPDATE membre SET pseudo = '$pseudo' WHERE id = $id");
				$req->closeCursor();
				echo "Votre pseudo à bien été modifié <br/>", PHP_EOL;
			}
		}

		if ($mdp != "" and $amdp != "") 
		{
			$req = $pdo->query("SELECT mdp FROM membre WHERE id = $id");
			$donnee = $req->fetch();

			if ($donnee['mdp'] == md5($amdp)) 
			{
				$mdp = md5($mdp);
				$req2 = $pdo->query("UPDATE membre SET mdp = '$mdp' WHERE id = $id");
				$req2->closeCursor();
				echo "Votre mot de passe à bien été modifié <br/>", PHP_EOL;
			}
			else
			{
			?>
				Vous n'avez pas saisi le bon mot de passe. Essayez à nouveau. <br/>

				<form action="modif_profil.php" method="post">

					<label for="amdp2"> Ancien mot de passe : </label>
					<input type="password" name="amdp" id="amdp2"> <br/>
					<label for="mdp2"> Nouveau mot de passe : </label>
					<input type="password" name="mdp" id="mdp2"> <br/>
					<input type="submit" value="Envoyer">				

				</form>
			<?php 
			}
		}
	}

	elseif (isset($_POST['pseudo'])) 
	{
		$pseudo = $_POST['pseudo'];
		$id = $_SESSION['id'];
		$verif= $pdo->query("SELECT COUNT(*) AS existe FROM `membre` WHERE pseudo= '$pseudo'");
		$donnee2 = $verif->fetch();

		if ($donnee2['existe'] != 0) 
		{ ?>
			Ce pseudo existe déja. En choisir un autre. <br/>
			<form action="modif_profil.php" method="post">

				<label for id="pseudo2"> Pseudo : </label>
				<input type="text" name="pseudo" id="pseudo2"> <br/>
				<input type="submit" value="Modifier" >

			</form>

		<?php }
		else
		{
			$req = $pdo->query("UPDATE membre SET pseudo = '$pseudo' WHERE id = $id");
			$req->closeCursor();
			echo "Votre pseudo à bien été modifié <br/>", PHP_EOL;
		}
	}

	elseif (isset($_POST['mdp'])) 
	{
		$id = $_SESSION['id'];
		$amdp = $_POST['amdp'];
		$mdp = $_POST['mdp'];
		$req = $pdo->query("SELECT mdp FROM membre WHERE id = $id");
		$donnee = $req->fetch();

			if ($donnee['mdp'] == md5($amdp)) 
			{
				$mdp = md5($mdp);
				$req2 = $pdo->query("UPDATE membre SET mdp = '$mdp' WHERE id = $id");
				$req2->closeCursor();
				echo "Votre mot de passe à bien été modifié <br/>", PHP_EOL;
			}
			else
			{
			?>
				Vous n'avez pas saisi le bon mot de passe. Essayez à nouveau. <br/>

				<form action="modif_profil.php" method="post">

					<label for="amdp3"> Ancien mot de passe : </label>
					<input type="password" name="amdp" id="amdp3"> <br/>
					<label for="mdp3"> Nouveau mot de passe : </label>
					<input type="password" name="mdp" id="mdp3"> <br/>
					<input type="submit" value="Envoyer">				

				</form>
			<?php 
			}
	}

	else
	{
	?>
		<form action="modif_profil.php" method="post">
			
			<label for="nom">Nom : </label><input type="text" name="nom" id="nom"><br/>
			<label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom"><br/>
			<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo"><br/>
			<label for="mail">Email : </label><input type="email" name="email" id="mail"><br/>
			<label for="amdp">Ancien mot de passe : </label><input type="password" name="amdp" id="amdp"><br/>
			<label for="mdp">Nouveau mot de passe : </label><input type="password" name="mdp" id="mdp"><br/>
			<label for="classe">Année d'étude : </label>
			<select name="classe" id="classe">
			    <option value="">--Choisir une année--</option>
			    <option value="L1">Licence 1</option>
			    <option value="L2">Licence 2</option>
			    <option value="L3">Licence 3</option>
			</select><br/>
			<label for="tuteur">Tuteur : </label>
			<select name="tuteur" id="tuteur">
				<option value="">Choissisez une option</option>
				<option value="0">Non</option>
				<option value="1">Oui</option>
			</select><br/>
			<input type="submit" value="Enregistrer">

		</form>
	<?php 
	}
}


include('footer.php'); ?>