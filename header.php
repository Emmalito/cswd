<?php session_start(); ?>

<!DOCTYPE html>
<html lang='fr'>
    <head>
         <meta charset="utf-8" />
         <link rel="stylesheet" href="style.css" media="all" />
         <?php echo "<title> $titre </title>"; ?>
    </head>

    <body> 

    	<img src="logo.png" height="200" weight="173"> <label>Unisite</label>

    	<nav>
    		<ul>
    			<?php 
    			$menu = array('home', 'profile', 'progress', 'discussion', 'projet', 'coatcher' );
    			for ($i=0; $i < 6 ; $i++) 
    			{ 
    				$nom = strtolower($menu[$i]);
    				if ($nom !== $titre ) 
    				{
    					echo "<li><a href='$nom.php'>$nom</a></li>", PHP_EOL;
    				}
    				else
    				{
    					echo "<li><a href='#'>$nom</a></li>", PHP_EOL;
    				}
    			}
    			?>
    		</ul>

    	</nav>

    	<div id="corps">
    		<br/>



    	

