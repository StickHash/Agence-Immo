<?php
include('connexion.php');    
$cherche = $bdd->prepare('SELECT Nom_Commune FROM Commune');
$cherche->execute();
$resultat = array();
while ($array = $cherche->fetch(PDO::FETCH_ASSOC))
{
	$resultat[]=$array;
}
echo json_encode($resultat);	
?>
