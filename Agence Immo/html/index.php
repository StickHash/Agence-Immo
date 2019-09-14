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
				<h2>Accueil</h2>
				<section id="accueil">
					<article id="introduction">
						<h3> Bienvenue </h3>
						<p> Cette application web est l'aboutissement d'un projet réalisé dans le cadre de l'unité d'enseignement NFA008: Bases de données du CNAM Bretagne. </br>
						J'ai suivi ce cours, enseigné par M. Bernard Couapel lors du premier semestre 2018- 2019.</p>
					</article>
					<article id="projet">
						<h3> But du projet </h3>
						<p> Le but de ce projet est de mettre en oeuvre les connaissances acquises lors du cours.</br>
						Le sujet choisi porte sur la gestion des logements dans une agence immobilière</br>
						Il s'agit bien évidemment d'un cas simplifié<p>
						<h3> Cahier des charges </h3>
						<p> Voici le cahier des charges tel que je l'ai retranscrit:</br></br>
						Une agence immobilière veut gérer son parc locatif (note : pour le diagramme UML, l’acteur principal sera l’agent immobilier)</br>
						-Chaque logement à une adresse, une superficie et un loyer</br>
						-Un logement est situé dans un quartier, lui-même situé dans une commune</br>
						-Un logement est d’un certain type (T2, T3, Maison, etc…)</br>
						-Un quartier à un nom</br>
						-Une commune à un nom, un nombre d’habitants et une distance qui le sépare de l’agence</br>
						-Un type de logement à un montant de charge forfaitaire mensuel s’ajoutant au loyer</br>
						-Un logement peut être loué par un ou plusieurs locataires</br>
						-Un locataire ne peut louer qu’un seul logement</br>
						-Chaque locataire à un nom, un prénom, une date de naissance et un numéro de téléphone</br>
						<p>
					</article>
				</section>
				<section id="realisation">
					<article id="meo">
						<h3>Mise en oeuvre</h3>
						<p>A partir du cahier des charges ci-dessus, j'ai établi le MCD suivant:</br>
						<img src="MCD-Agence.png" a href="MCD-Agence.png" onclick="window.open('MCD-Agence.png');"id="imgmcd"></br>
						Il ne s'agit bien sûr pas du premier jet, les contraintes rencontrées lors du projet m'ont en effet obligées à effectuer des modifications sur le MCD.</br>
						Notamment la geolocalisation pour laquelle j'ai rajouté les champs latitude et longitude dans la table Logement.</br>
						La base de données proprement dite est installée sur un serveur LAMP.</br>
						Côté matériel mon choix s'est porté sur un Raspberry Pi</p>
						<p>Enfin voici le diagramme de cas d'utilisation qui a été défini, afin de construire l'application:</br>
						<img src="UseCase-Agence.png" a href="UseCase-Agence.png" onclick="window.open('UseCase-Agence.png');"id="imgusecase"></br>
					</article>
					<article id="solution">
						<h3>Contraintes et solutions</h3>
						<p>Plusieurs contraintes et interrogations sont apparues durant l'élaboration du projet.</br></br>
						Tout d'abord, ne connaissant pas le matériel (PC, MAC, Tablette, Telepone mobile,...) dont dispose l'agence, la solution de l'interface web m'est apparue comme la solution la plus simple à mettre en oeuvre du point de vue compatibilité.</br></br>
						Les langages utilisés sont donc <b>HTML, CSS, PHP et Javascript(JQuery et AJAX)</b>.<p>
						<p>La nécessité d'évaluer les distances des logements par rapport à l'agence (dont on ne connaît pas l'adresse) m'a incité à implementer sur la page <a href="recherche.php">Recherche</a> une carte interactive.</br>
						Il s'agit d'une carte OpenStreetMap intégrée grâce à la librairie <a href="https://leafletjs.com/" target="_blank">Leaflet</a>.</br></br>
						Afin d'assurer une compatibilité maximum avec cette carte, une partie des données insérées dans la base se fait par l'intermédiaire de l'API du moteur de recherche <a href="https://nominatim.openstreetmap.org/" target="_blank">Nominatim</a>.</br>
						C'est le cas pour les champs CodePostal et NbHabitants dans la table Commune et les champs Latitude et Longitude dans la table Logement.</br></br>
						L'avantage de ce système est qu'il est quasiment impossible d'insérer des adresses inexactes dans la base.</br> 
						L'inconvénient est que le système dépend entièrement de ces données externes qui peuvent dans de rares cas être approximatives, notamment en ce qui concerne les coordonnées geographiques de certaines rues (les joies de l'open source!)</br>
						Néanmoins cette solution me semble être un bon compromis et en plus c'est gratuit!</p>
						<h3>Sources</h3>
						<p><a href="Agence.zip">En cliquant ici</a> Vous pouvez télécharger une archive .Zip comportant l'ensemble des fichiers qui composent le projet.</p>
					</article>
				</section>
			</div>
			<?php include('footer.php');?>
		</div>
		<script src="jquery-3.3.1.js"></script>
		<script src="action.js"></script>
	</body>
</html>