<?php
include('connexion.php');
if (isset($_POST['nomCommune']) && isset($_POST['nomQuartier']) && isset($_POST['nomType']) && isset($_POST['adresse']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['superficie']) && isset($_POST['loyer'])){
    $nomCommune = strtoupper($_POST['nomCommune']);
    $nomQuartier = $_POST['nomQuartier'];
	$nomType = $_POST['nomType'];
	$adresse = $_POST['adresse'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$superficie = $_POST['superficie'];
	$loyer = $_POST['loyer'];

	$select = $bdd->query('SELECT Num_Quartier FROM Quartier,Commune WHERE Nom_Quartier="'.$nomQuartier.'" AND Nom_Commune="'.$nomCommune.'" AND Quartier.Num_Commune=Commune.Num_Commune');
	$resultat = $select->fetch();
	$numQuartier = $resultat['Num_Quartier'];
	
	$select = $bdd->query('SELECT Num_Type FROM TypeLogement WHERE Nom_Type="'.$nomType.'"');
	$resultat = $select->fetch();
	$numType = $resultat['Num_Type'];
    
    $envoi = $bdd->prepare('INSERT INTO Logement(Num_Quartier, Num_Type, Adresse_Logement, Latitude_Logement, Longitude_Logement, Superficie_Logement, Loyer_Logement) VALUES ("'.$numQuartier.'","'.$numType.'","'.$adresse.'","'.$latitude.'","'.$longitude.'","'.$superficie.'","'.$loyer.'")');
    $envoi->execute();
}
?>
