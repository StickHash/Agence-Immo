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
				<h2>Saisie Commune</h2>
				<form  id="saisiecommune">
					Nom de la commune</br>	
					<input type="text" name="nomCommune" size=40></br>
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