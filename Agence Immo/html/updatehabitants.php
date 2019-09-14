<?php
include('connexion.php');
if (isset($_POST['nomCommune']) && isset($_POST['nbHabitants'])){
    $nomCommune = strtoupper($_POST['nomCommune']);
	$nbHabitants = $_POST['nbHabitants'];
    
    $envoi = $bdd->prepare('UPDATE Commune SET NbHabitants_Commune="'.$nbHabitants.'" WHERE Nom_Commune="'.$nomCommune.'"');
    $envoi->execute();
}
?>