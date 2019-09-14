<?php
	include('connexion.php');
	if (isset($_POST['num_logement'])){
		$num_logement = $_POST['num_logement'];
		$envoi = $bdd->prepare('UPDATE Locataire SET Num_Logement=NULL WHERE Locataire.Num_Logement=("'.$num_logement.'")');
		$envoi->execute();
	}