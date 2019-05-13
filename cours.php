<?php
$titre = 'Cours';
include('header.php'); 

if (isset($_GET['id'])) 
{
	$numero = $_GET['id'];
	$req = $pdo->query("SELECT * FROM `ue`, `fichier_ue` WHERE numero = '$numero' AND ue.id = matiere_id");
	$donnee = $req->fetch();
	print_r($donnee);
	echo "hé hooo";
	//echo "<h1> $donnee['matiere'] </h1>", PHP_EOL;

}
else
{
	echo "<h1>ERREUR 504</h1>";
}





?>
<?php include('footer.php'); ?>