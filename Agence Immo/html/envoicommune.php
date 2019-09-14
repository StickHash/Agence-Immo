<?php
include('connexion.php');
if (isset($_POST['nomCommune']) && isset($_POST['nbHabitants'])){
    $nomCommune = strtoupper($_POST['nomCommune']);
	$nbHabitants = $_POST['nbHabitants'];
	$codePostal = $_POST['codePostal']; 
    $envoi = $bdd->prepare('INSERT INTO Commune(Nom_Commune,CodePostal_Commune,NbHabitants_Commune) VALUES ("'.$nomCommune.'","'.$codePostal.'","'.$nbHabitants.'")');
    $envoi->execute();
}
?>