<?php
include('connexion.php');
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['naissance']) && isset($_POST['telephone'])){
    $nom = strtoupper($_POST['nom']);
    $prenom = ucfirst($_POST['prenom']);
	$naissance = $_POST['naissance'];
	$telephone = $_POST['telephone'];
    
	$verif = $bdd->query('SELECT * FROM Locataire WHERE Nom_Locataire="'.$nom.'" AND Prenom_Locataire="'.$prenom.'" AND Naissance_Locataire="'.$naissance.'"');
	
	if ($verif->rowCount()<1){
		$envoi = $bdd->prepare('INSERT INTO Locataire(Nom_Locataire, Prenom_Locataire, Naissance_Locataire, Telephone_Locataire) VALUES ("'.$nom.'","'.$prenom.'","'.$naissance.'","'.$telephone.'")');
		$envoi->execute();
	}
}
?>