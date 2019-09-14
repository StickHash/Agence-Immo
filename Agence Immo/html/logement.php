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
				<h2>Saisie Logement</h2>
				<form  id="saisielogement">
					<?php include('connexion.php');?>
					<p><?php include ('rcommune.php');?></p>
					<p id="quartier"></p>
					<p><?php include('rtype.php'); ?> <a href="type.php">Cliquez ici pour créer un nouveau type</a></p>
					<b>Adresse </b><input type="text" name="adresse" size=60></br></br>
					<b>Superficie </b><input type="text" name="superficie" size=5> m²</br></br>
					<b>Loyer </b><input type="text" name="loyer" size=8> €</br>
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