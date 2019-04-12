<?php
$titre = 'Profile';
include('header.php'); 
?>

<form action="verification.php" method="post" class="formulaire">

	<label>Nom<input type="text" name="nom" required></label><br/>
	<label>Prénom<input type="text" name="prenom" required></label><br/>
	<label>Pseudo<input type="text" name="pseudo" required></label><br/>
	<label>Email<input type="email" name="email" required></label><br/>
	<label>Mot de Passe<input type="password" name="mdp" required></label><br/>
	<label>Année d'étude
	<select name="classe" required>
	    <option value="">--Choisir une année--</option>
	    <option value="L1">Licence 1</option>
	    <option value="L2">Licence 2</option>
	    <option value="L3">Licence 3</option>
	</select></label><br/>
	<label>Tuteur
		<select name="tuteur" required>
			<option value="0">Non</option>
			<option value="1">Oui</option>
		</select></label><br/>
	<input type="submit" name="envoyer">
	
</form>

<?php include('footer.php'); ?>

