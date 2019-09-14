<?php


if (isset($_POST['nomCommune']) && isset($_POST['nomQuartier']) && isset($_POST['nomType']) && isset ($_POST['loyerMin']) && isset ($_POST['loyerMax']))
{
    $nomCommune = strtoupper($_POST['nomCommune']);
    $nomQuartier = $_POST['nomQuartier'];
	$nomType = $_POST['nomType'];
	$loyerMin = $_POST['loyerMin'];
	$loyerMax = $_POST['loyerMax'];

	$req = 'SELECT Nom_Commune, NbHabitants_Commune, Nom_Type, Nom_Quartier, Loyer_Logement, Nom_Type, Charges_Type, Superficie_Logement, Adresse_Logement,Latitude_Logement,Longitude_Logement FROM Logement,Commune,Quartier,TypeLogement WHERE Nom_Quartier LIKE "'.$nomQuartier.'" AND Logement.Num_Quartier=Quartier.Num_Quartier AND Nom_Commune LIKE "'.$nomCommune.'" AND Quartier.Num_Commune=Commune.Num_Commune AND Nom_Type LIKE "'.$nomType.'" AND Logement.Num_Type=TypeLogement.Num_Type AND Loyer_Logement BETWEEN "'.$loyerMin.'" AND "'.$loyerMax.'";';
	if ($loyerMax == NULL)
	{
		$req = 'SELECT Nom_Commune, NbHabitants_Commune, Nom_Type, Nom_Quartier, Loyer_Logement, Nom_Type, Charges_Type, Superficie_Logement, Adresse_Logement,Latitude_Logement,Longitude_Logement FROM Logement,Commune,Quartier,TypeLogement WHERE Nom_Quartier LIKE "'.$nomQuartier.'" AND Logement.Num_Quartier=Quartier.Num_Quartier AND Nom_Commune LIKE "'.$nomCommune.'" AND Quartier.Num_Commune=Commune.Num_Commune AND Nom_Type LIKE "'.$nomType.'" AND Logement.Num_Type=TypeLogement.Num_Type AND Loyer_Logement BETWEEN "'.$loyerMin.'" AND (SELECT MAX(Loyer_Logement));';
	}
	envoiRecherche($req);
}
function envoiRecherche($req)
{
	include('connexion.php');
	$select = $bdd->query($req);
	while ($donnees = $select->fetch(PDO::FETCH_ASSOC))
	{
		$resultat[]=$donnees;
	}
	echo json_encode($resultat);
}
?>
