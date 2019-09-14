<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title>Gestion Agence</title>
    </head>
	<body>
		<div class="global">
			<?php include ('header.php'); ?>
			<nav><?php include ('menu.php'); ?></nav>
			<div class="content">
				<h2>Saisie Locataire</h2>
				<form  id="saisielocataire">
					<b>Nom </b><input type="text" name="nom" size=40></br></br>
					<b>Prenom </b><input type="text" name="prenom" size=40></br></br>
					<b>Date de naissance </b><input type="date" name="naissance" min="1900-01-01"></br></br>
					<b>Telephone </b><input type="text" name="telephone" size=10></br></br>
					</br>
					<input type="submit" value="Créer">
				</form>
				<p id="effectue"></p>
			</div>
			<?php include('footer.php');?>
		</div>
		<script src="jquery-3.3.1.js"></script>
		<script src="action.js"></script>
	</body>
</html>