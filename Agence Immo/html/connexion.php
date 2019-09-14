<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=Agence;charset=utf8', 'agent_immo', 'connect-agent167');
}
catch (Exception $erreur)
{
	die('Erreur: ' . $erreur->getMessage());
}
?>