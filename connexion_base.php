<?php 
/* définition des paramètres de connexion à la base de données
if ($_SERVER['SERVER_NAME'] == "pedagovic.uf-mi.u-bordeaux.fr")
{
    $config_base['hote'] = "pedagovic.uf-mi.u-bordeaux.fr";
    $config_base['utilisateur'] = "toi";
    $config_base['motdepasse'] = '$oYX';
    $config_base['nom_base'] = "emmdelar";
}
else
{*/
    $config_base['hote']        = "localhost";
    $config_base['utilisateur'] = "root";
    $config_base['motdepasse']  = "Emmalito_973"; 
    $config_base['nom_base']    = "projet_cswd";
/*}

// connexion à la base de données */
try {
    $pdo = new PDO(	"mysql:host={$config_base['hote']};
                    dbname={$config_base['nom_base']}", 
                    "{$config_base['utilisateur']}", 
                    "{$config_base['motdepasse']}");
    
    // afficher les messages d'erreurs pour trouver les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
    // jeu de caractères : UTF-8
    $pdo->query("SET NAMES utf8");
    $pdo->query("SET CHARACTER SET utf8");
}
catch (PDOException $exception) {
    echo "Connexion échouée : " . $exception->getMessage();
}


/*A inclure en début de page :

<?php require_once("connexion_base.php"); ?>   */
?>