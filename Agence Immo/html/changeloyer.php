<?php
	include('connexion.php');
	if (isset($_POST['numLogement']) && isset($_POST['newLoyer'])){
		$numLogement = $_POST['numLogement'];
		$newLoyer = $_POST['newLoyer'];
		$envoi = $bdd->prepare('UPDATE Logement SET Loyer_Logement="'.$newLoyer.'" WHERE Logement.Num_Logement="'.$numLogement.'"');
		$envoi->execute();
	}
?>