<?php
$titre = 'Accueil';
include('header.php'); ?>

<section class="annee">

	<?php
	$i = 1;
	$semestre = 1;
	while ($i<4) 
	{
		echo "<label>L$i MIASHS ", PHP_EOL;
		echo "<ul class='matière'>", PHP_EOL;
		for ($e=1; $e < 3 ; $e++) 
		{ 
			echo "<li> Semestre $semestre </li> ", PHP_EOL;
			$semestre++;
			echo "<ul>", PHP_EOL;
			$req = $pdo->query("SELECT matiere FROM `ue` WHERE numero LIKE '$e%'");
			while ($donnee = $req->fetch()) 
			{
				echo "<li> $donnee[0] </li>", PHP_EOL;
			}
			echo "</ul>", PHP_EOL;
		}
		echo "</ul>", PHP_EOL;
		echo "</label>", PHP_EOL;
		$i++;
	}


	?>

</section>



<?php include('footer.php'); ?>