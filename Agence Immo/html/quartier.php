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
				<h2>Saisie Quartier</h2>
				<form  id="saisiequartier">
					Nom de la commune</br>	
					<select id="nomCommune">
						<option value="">Selectionnez la commune</option>
						<?php include ('selectcommune.php'); ?>
					</select>
					<a href="commune.php">Cliquez ici pour créer une nouvelle commune</a></br></br>
					Nom du quartier</br>	
					<input type="text" name="nomQuartier" size=40></br>
					</br>
					<input type="submit" value="Créer">
				</form>
				<p id="effectue"></p>
			</div>
			<?php include('footer.php');?>
			<script src="jquery-3.3.1.js"></script>
			<script src="action.js"></script>
		</div>
	</body>
</html>