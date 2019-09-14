<?php 
$commune = $bdd->query('SELECT Nom_Commune, CodePostal_Commune FROM Commune ORDER BY Nom_Commune');
echo '<b>Commune </b>';
echo '<select id="commune" onchange="chercheQuartier()">';
echo '<option value="%">Selectionnez la ville</option>';
while ($donnees = $commune->fetch())
{
	echo '<option value="'.$donnees['Nom_Commune'].'" id="'.$donnees['CodePostal_Commune'].'">'.$donnees['Nom_Commune'].'</option>';
}
echo '</select>';
?>
 <script type="text/javascript" src="jquery-3.3.1.js"></script>
 <script type="text/javascript" src="cherchequartier.js"></script>