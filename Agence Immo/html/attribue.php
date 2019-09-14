<?php
	include('connexion.php');
	if (isset($_POST['num_logement']) && isset($_POST['num_locataire'])){
		$num_logement = $_POST['num_logement'];
		$num_locataire = $_POST['num_locataire'];
		$envoi = $bdd->prepare('UPDATE Locataire SET Num_Logement=("'.$num_logement.'") WHERE Locataire.Num_Locataire=("'.$num_locataire.'")');
		$envoi->execute();
	}
?>