<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css"/>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
            crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script>
        <title>Gestion Agence</title>
    </head>
	<body>
		<div class="global">
			<?php include ('header.php'); ?>
			<nav><?php include ('menu.php'); ?></nav>
			<div class="content">
				<?php include('connexion.php'); ?>
				<aside id="infolaterale">
					<h3>INFOS LOGEMENT</h3>
					<p id="info"></p>
				</aside>
				<h2>Recherche Logement</h2>
				<form id="recherche" onchange="reinitMap()">
					<p><?php include ('rcommune.php');?></p>
					<p><b>Quartier</b>
					<select id="quartier">
						<option value="%">Selectionnez le quartier</option>
					</select></p>
					<p><?php include('rtype.php'); ?></p>
					<p>Loyer mini: <input type="text" name="loyermin" size=8>   Loyer maxi: <input type="text" name="loyermax" size=8></br>
					</br>
					<input type="button" id="rechercher" value="Rechercher" onclick="repereCarte()">
				</form>	
				<div id="map">
				</div>
			</div>
			<?php include('footer.php');?>
		</div>
		<script type="text/javascript" src="jquery-3.3.1.js"></script>
		<script type="text/javascript" src="action.js"></script>
		<script type="text/javascript" src="map.js"></script>
    </body>
</html>