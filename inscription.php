<?php
$titre = 'Profil';
include('header.php'); 
?>

<form action="verification.php" method="post" class="formulaire">

	<label for="nom">Nom : </label><input type="text" name="nom" required id="nom"><br/>
	<label for="prenom">Prénom : </label><input type="text" name="prenom" required id="prenom"><br/>
	<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" required id="pseudo"><br/>
	<label for="mail">Email : </label><input type="email" name="email" required id="mail"><br/>
	<label for="mdp">Mot de Passe : </label><input type="password" name="mdp" required id="mdp"><br/>
	<label for="classe">Année d'étude : </label>
	<select name="classe" id="classe" required>
	    <option value="">--Choisir une année--</option>
	    <option value="L1">Licence 1</option>
	    <option value="L2">Licence 2</option>
	    <option value="L3">Licence 3</option>
	</select><br/>
	<label for="tuteur">Tuteur : </label>
	<select name="tuteur" required id="tuteur">
		<option value="0">Non</option>
		<option value="1">Oui</option>
	</select><br/>
	<input type="submit" value="Envoyer">
	
</form>

<?php include('footer.php'); ?>

