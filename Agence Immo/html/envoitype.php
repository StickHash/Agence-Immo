<?php
include('connexion.php');
if (isset($_POST['type']) && isset($_POST['charges'])){
    $type = strtoupper($_POST['type']);
    $charges = $_POST['charges'];
    
    $envoi = $bdd->prepare('INSERT INTO TypeLogement(Nom_Type, Charges_Type) VALUES ("'.$type.'","'.$charges.'")');
    $envoi->execute();
}
?>