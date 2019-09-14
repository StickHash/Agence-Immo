<?php
	include('connexion.php');
	if (isset($_POST['numType']) && isset($_POST['newCharge'])){
		$numType = $_POST['numType'];
		$newCharge = $_POST['newCharge'];
		$envoi = $bdd->prepare('UPDATE TypeLogement SET Charges_Type="'.$newCharge.'" WHERE TypeLogement.Num_Type="'.$numType.'"');
		$envoi->execute();
	}
?>