<?php session_start(); 
require_once("connexion_base.php");
?>

<!DOCTYPE html>
<html lang='fr'>
    <head>
         <meta charset="utf-8" />
         <link rel="stylesheet" href="style.css" media="all" />
         <?php echo "<title> $titre </title>"; ?>
    </head>

    <body> 

    	<table class="tete">
    		<tr>
    			<td class="titre" id="titre_right">UNI</td>
    
    			<td align="center" id="logo_tete"><img src="images/logo1.png" height="200" weight="173"/></td>

    			<td class="titre" id="titre_left">SITE</td>
    		</tr>
    	</table>


    	<nav>
    		<ul class="menu">
    			<?php 
    			$menu = array('Accueil', 'Profil', 'Forum', 'Discussion', 'Projet', 'Tuteur' );
    			for ($i=0; $i < 6 ; $i++) 
    			{ 
    				$nom = strtolower($menu[$i]);
    				$nom_maj = strtoupper($nom);
    				if ($nom !== $titre ) 
    				{
    					echo "<li><a href='$nom.php'>$nom_maj</a></li>", PHP_EOL;
    				}
    				else
    				{
    					echo "<li><a href='#'>$nom</a></li>", PHP_EOL;
    				}
    			}
    			?>
    			<li><a href="connexion.php"><img src="images/power.png"/></a></li>
    		</ul>

    	</nav>

    	<div id="corps">
    		<br/>




    	

