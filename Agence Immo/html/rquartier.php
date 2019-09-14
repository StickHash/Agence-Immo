<?php
include('connexion.php');
$quartier = $bdd->query('SELECT Nom_Quartier FROM Quartier,Commune WHERE Quartier.Num_Commune=Commune.Num_Commune AND Nom_Commune="'.$_POST['id_commune'].'" ORDER BY Nom_Quartier');
echo '<b>Quartier </b>';
echo '<select id="quartier">';
echo '<option value="%">Selectionnez le quartier</option>';
while ($donnees = $quartier->fetch())
{
	echo '<option value="'.$donnees['Nom_Quartier'].'">'.$donnees['Nom_Quartier'].'</option>';
}
echo '</select>';
?>
