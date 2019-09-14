<?php
include('connexion.php');
if (isset($_POST['num_logement'])){
	$num_logement = $_POST['num_logement'];
	$occupe = $bdd->query('SELECT * FROM Locataire WHERE Locataire.Num_Logement=("'.$num_logement.'")');
	$resultat = $occupe->rowCount();
	if ($resultat!=0){
		echo 'occupe';
	}
}
?>