<?php
include('connexion.php');
if (isset($_POST['nomCommune']) && isset($_POST['nomQuartier'])){
    $nomCommune = strtoupper($_POST['nomCommune']);
    $nomQuartier = $_POST['nomQuartier'];

	$select = $bdd->query('SELECT Num_Commune FROM Commune WHERE Nom_Commune="'.$nomCommune.'"');
	$resultat = $select->fetch();
	$numCommune = $resultat['Num_Commune'];
    
    $envoi = $bdd->prepare('INSERT INTO Quartier(Nom_Quartier, Num_Commune) VALUES ("'.$nomQuartier.'","'.$numCommune.'")');
    $req = $bdd->query('SELECT * FROM Quartier WHERE Nom_Quartier = "'.$nomQuartier.'" AND Num_Commune = "'.$numCommune.'"');
	$verif = $req-> fetchColumn();
	if ($verif == FALSE){		
		$envoi->execute();
	}
}
?>