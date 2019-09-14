<?php
include('connexion.php');
$commune = $bdd->query('SELECT Nom_Commune FROM Commune ORDER BY Nom_Commune');
while ($donnees = $commune->fetch())
{
	echo '<option value="'.$donnees['Nom_Commune'].'">'.$donnees['Nom_Commune'].'</option>';
}
?>