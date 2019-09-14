<?php
include('connexion.php');
$infos = $bdd->query('SELECT Nom_Commune, NbHabitants_Commune, Loyer_Logement, Charges_Type FROM Commune, Logement, TypeLogement, Quartier WHERE Latitude_Logement="'.$_POST['latitude'].'" AND Longitude_Logement="'.$_POST['longitude'].'" AND Logement.Num_Quartier=Quartier.Num_Quartier AND Quartier.Num_Commune=Commune.Num_Commune AND Logement.Num_Type=TypeLogement.Num_Type');
$donnees = $infos->fetch(PDO::FETCH_ASSOC);
$commune = $donnees['Nom_Commune'];
$habitants = $donnees['NbHabitants_Commune'];
$loyer = $donnees['Loyer_Logement'];
$charges = $donnees['Charges_Type'];
$total = $loyer + $charges;

//echo 'Ce logement est situé à "+"'.$commune'." +".<br>Une commune de "+"'.$habitants'."+" habitants.<br><br>Le loyer est de "+"'.$loyer'."+" €.';
echo "Ce logement est situé à $commune.";
echo "<br>";
echo "Une commune de $habitants habitants.";
echo "<br>";
echo "Le loyer est de $loyer €.";
echo "<br>";
echo "Le montant des charges s'élève à $charges €.";
echo "<br>";
echo "Pour un total mensuel de $total €.";
?>