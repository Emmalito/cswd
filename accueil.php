<?php
$titre = 'Accueil';
include('header.php'); ?>

<section class="accueil">

	<?php
	$i = 1;
	$semestre = 1;
	while ($i<4) 
	{
		echo "<div id='L$i'>", PHP_EOL;
		echo "<label class='annee' >L$i MIASHS ", PHP_EOL;
		echo "<ul class='matière'>", PHP_EOL;
		for ($e=1; $e < 3 ; $e++) 
		{ 
			echo "<li class='semestre'> Semestre $semestre </li> ", PHP_EOL;
			$semestre++;
			echo "<ul class='matiere_semestre'>", PHP_EOL;
			$req = $pdo->query("SELECT matiere,numero FROM `ue` WHERE numero LIKE '$e%'");
			while ($donnee = $req->fetch()) 
			{
				echo "<li class='ue'> <a href='cours.php?id=$donnee[1]'> $donnee[0] </a></li>", PHP_EOL;
			}
			echo "</ul>", PHP_EOL;
		}
		echo "</ul>", PHP_EOL;
		echo "</label>", PHP_EOL;
		echo "</div>",PHP_EOL;
		$i++;
	}


	?>

</section>



<?php include('footer.php'); ?>