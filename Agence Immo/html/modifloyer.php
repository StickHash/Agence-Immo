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
				<h2>Modification des loyers</h2>
				<p>
					<table name="listelogement">
						<tr>
							<th> COMMUNE </th>
							<th> ADRESSE </th>
							<th> TYPE </th>
							<th> LOYER ACTUEL </th>
							<th> NOUVEAU LOYER </th>
						</tr>
						<?php
						include('connexion.php');
						$liste = $bdd->query('SELECT Num_Logement,Nom_Commune, Adresse_Logement, Loyer_Logement, Nom_Type FROM Commune, Quartier, Logement, TypeLogement WHERE Logement.Num_Quartier=Quartier.Num_Quartier AND Quartier.Num_Commune=Commune.Num_Commune AND Logement.Num_Type=TypeLogement.Num_Type ORDER BY Nom_Commune, Adresse_Logement');
						while ($resultat = $liste->fetch(PDO::FETCH_ASSOC))
						{
							echo '<tr>';
							echo '<td id="nomcommune"> '.$resultat['Nom_Commune'].'</td>';
							echo '<td id="adresse"> '.$resultat['Adresse_Logement'].'</td>';
							echo '<td> '.$resultat['Nom_Type'].'</td>';
							echo '<td id="loyer"> '.$resultat['Loyer_Logement'].' €</td>';
							echo '<td id="loyer"><input type="text" name="'.$resultat['Num_Logement'].'" size=8></td>';
							echo '<td id="modifier"><input type="button" value="Modifier" id="'.$resultat['Num_Logement'].'" onclick="nouveauLoyer('.$resultat['Num_Logement'].')"></td>';
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
