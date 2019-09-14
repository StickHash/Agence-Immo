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
				<h2>Modification du montant des charges</h2>
				<p>
					<table name="listecharge">
						<tr>
							<th> TYPE </th>
							<th> MONTANT ACTUEL </th>
							<th> NOUVEAU MONTANT </th>
						</tr>
						<?php
						include('connexion.php');
						$liste = $bdd->query('SELECT * FROM TypeLogement ORDER BY Nom_Type');
						while ($resultat = $liste->fetch(PDO::FETCH_ASSOC))
						{
							echo '<tr>';
							echo '<td> '.$resultat['Nom_Type'].'</td>';
							echo '<td id="charge"> '.$resultat['Charges_Type'].' €</td>';
							echo '<td id="charge"><input type="text" name="'.$resultat['Num_Type'].'" size=8></td>';
							echo '<td id="modifier"><input type="button" value="Modifier" id="'.$resultat['Num_Type'].'" onclick="nouvelleCharge('.$resultat['Num_Type'].')"></td>';
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
