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
				<aside id="infolaterale">
					<h3>INFOS LOGEMENT</h3>
					<p id="info"></p>
				</aside>
				<h2>Liste des locataires</h2>
				<p>
					<table>
						<tr>
							<th> NOM </th>
							<th> PRENOM</th>
							<th> NAISSANCE </th>
							<th> TELEPHONE </th>
							<th> LOGEMENT </th>
						</tr>
						<?php
							include('connexion.php');
							$liste = $bdd->query('SELECT * FROM Locataire WHERE Num_Logement IS NOT NULL ORDER BY Nom_Locataire');
							while ($resultat = $liste->fetch(PDO::FETCH_ASSOC))
							{
								$naissance = $resultat['Naissance_Locataire'];
								$naissance = date('d/m/Y', strtotime($naissance));
								echo '<tr>';
								echo '<td> '.$resultat['Nom_Locataire'].'</td>';
								echo '<td> '.$resultat['Prenom_Locataire'].'</td>';
								echo '<td id="naissance"> '.$naissance.'</td>';
								echo '<td id="telephone"> '.$resultat['Telephone_Locataire'].'</td>';
								echo '<td id="fiche"><input type="button" id="'.$resultat['Num_Logement'].'" value="Ouvrir la fiche" onclick="infoLogementLocataire(this.id)"></td>';
								echo '</tr>';
								}
						?>
					</table>
				</p>
			</div>
			<?php include('footer.php');?>
		</div>
		<script type="text/javascript" src="jquery-3.3.1.js"></script>
		<script type="text/javascript" src="action.js"></script>
    </body>
</html>
