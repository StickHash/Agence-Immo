<?php
include('connexion.php');
$infos = $bdd->query('SELECT DISTINCT Adresse_Logement, Nom_Commune, Loyer_Logement, Nom_Type, Charges_Type FROM Locataire, Commune, Logement, TypeLogement, Quartier WHERE Logement.Num_Logement="'.$_POST['id'].'" AND Logement.Num_Quartier=Quartier.Num_Quartier AND Quartier.Num_Commune=Commune.Num_Commune AND Logement.Num_Type=TypeLogement.Num_Type');
$donnees = $infos->fetch(PDO::FETCH_ASSOC);
$type = $donnees['Nom_Type'];
$adresse = $donnees['Adresse_Logement'];
$commune = $donnees['Nom_Commune'];
$loyer = $donnees['Loyer_Logement'];
$charges = $donnees['Charges_Type'];

echo "$type";
echo "<br><br>";
echo "$adresse";
echo "<br>";
echo "$commune";
echo "<br><br>";
echo "Loyer $loyer €";
echo "<br>";
echo "Charges $charges €";
?>