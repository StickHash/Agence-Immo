<?php
	include('connexion.php');
	$liste = $bdd->query('SELECT * FROM Locataire WHERE Locataire.Num_Logement IS NULL ORDER BY Nom_Locataire');
	echo '<select id="locataires">';
	echo '<option value="">Selectionnez le locataire</option>';			
	while ($resultat = $liste->fetch(PDO::FETCH_ASSOC))
	{
		echo '<option value="'.$resultat['Num_Locataire'].'">'.$resultat['Nom_Locataire'].' '.$resultat['Prenom_Locataire'].'</option>';
	}
	echo '</select>';
	echo '<input type="button" name="attribue" value="Attribuer" onclick="attribuerLogement()">';
?>