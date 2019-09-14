<?php 
echo '<b>Type </b>';
echo '<select id="type">';
echo '<option value="%">Selectionnez le type de logement</option>';
$type = $bdd->query('SELECT Nom_Type FROM TypeLogement ORDER BY Nom_Type');
while ($donnees = $type->fetch())
{
	echo '<option value="'.$donnees['Nom_Type'].'">'.$donnees['Nom_Type'].'</option>';
}
echo '</select>';
?>