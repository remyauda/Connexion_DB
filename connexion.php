<?php
try {
	$servername = "localhost";
	$bddname = "test2";
	$username = "root";
	$password = "MonPassword"; // A REMPLACER PAR LE VRAI PASSWORD !
	
	// On se connecte à MySQL
	$bdd = new PDO ( 'mysql:host='.$servername.';dbname='.$bddname.';charset=utf8', $username, $password );
	// on active le verbose sur les erreurs (pour avoir des message d'erreur clairs)
	array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
}
 
catch ( Exception $e ) {
	echo "Connection  fail: <br/>"; 
	// En cas d'erreur, on affiche un message et on arrête tout
	die ( 'Erreur : ' . $e->getMessage () );
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$query1='SELECT * FROM jeux_video';
$reponse = $bdd->query($query1);

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	?>
    <p>
    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
    Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
    Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
    <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>


