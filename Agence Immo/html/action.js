	$('#saisiecommune').submit(function (event)
	{
		var commune = $('input[name="nomCommune"]').val();
		var nbhabitants = 0;
		var codepostal = 0;
		if(commune != ""){
			$.ajax({
				url: "https://nominatim.openstreetmap.org/search", // URL de Nominatim
				type: 'get', // Requête de type GET
				data: "city="+commune+"&format=json&addressdetails=1&extratags=1&limit=1&polygon_svg=1" // Données envoyées (q -> adresse complète, format -> format attendu pour la réponse, limit -> nombre de réponses attendu, polygon_svg -> fournit les données de polygone de la réponse en svg)
			}).done(function (response) {
			if(response != ""){
				nbhabitants = response[0]['extratags']['population'];
				codepostal = response[0]['address']['postcode'];
				
				$.post('envoicommune.php',{nomCommune:commune, codePostal:codepostal, nbHabitants:nbhabitants});
            }                
			}).fail(function (error) {
            alert(error);
			});
		}				
		$('#effectue').html("enregistrement effectué");
		$('#effectue').fadeOut("slow");
		$('#saisiecommune')[0].reset();	
		event.preventDefault();
	});
	
	$('#saisiequartier').submit(function (event)
	{		
		var commune = $('#nomCommune option:selected').val();
		var quartier = $('input[name="nomQuartier"]').val();
		$.post('envoiquartier.php',{nomCommune:commune, nomQuartier:quartier});
		$('#effectue').html("enregistrement effectué");
		$('#effectue').fadeOut("slow");
		$('#saisiequartier')[0].reset();
	});
	
	$('#saisielogement').submit(function (event)
	{
		var commune = $('#commune option:selected').val();
		var codepostal = $('#commune option:selected').attr("id");
		var quartier = $('#quartier option:selected').val();
		var type = $('#type option:selected').val();
		var adresse = $('input[name="adresse"]').val();
		var superficie = $('input[name="superficie"]').val();
		var loyer = $('input[name="loyer"]').val();
		if (adresse == "" || superficie == "" || loyer == ""){
			alert('Tous les champs doivent être remplis!');
		}
		else if (isNaN(superficie) || isNaN(loyer)){
			alert('Loyer et Superficie doivent avoir des valeurs numérique');
		}
		else{
			var coordonnees = (adresse + " " + commune + " " + codepostal);
			if (codepostal == 0){
				coordonness = (adresse + " " + commune);
			}
			var userlat = new Number;
			var userlon = new Number;
			if(coordonnees != ""){
				$.ajax({
					url: "https://nominatim.openstreetmap.org/search", // URL de Nominatim
					type: 'get', // Requête de type GET
					data: "q="+coordonnees+"&format=json&addressdetails=1&extratags=1&limit=1&polygon_svg=1" // Données envoyées (q -> adresse complète, format -> format attendu pour la réponse, limit -> nombre de réponses attendu, polygon_svg -> fournit les données de polygone de la réponse en svg)
				}).done(function (response) {
				if(response != ""){
					userlat = response[0]['lat'];
					userlon = response[0]['lon'];
					$.post('envoilogement.php',{nomCommune:commune, nomQuartier:quartier, nomType:type, adresse:adresse, latitude:userlat, longitude:userlon, superficie:superficie, loyer:loyer});
				}                
				}).fail(function (error) {
				alert(error);
				});
			}	
			$('#effectue').html("enregistrement effectué");
			$('#effectue').fadeOut("slow");
			$('#saisielogement')[0].reset();
			event.preventDefault();
		}
	});
	
	$('#saisielocataire').submit(function (event)
	{
		var nom = $('input[name="nom"]').val();
		var prenom = $('input[name="prenom"]').val();
		var naissance = $('input[name="naissance"]').val();
		var telephone= $('input[name="telephone"]').val();
		if (nom == "" || prenom == "" || naissance == "" || telephone == ""){
			alert ('Tous les champs doivent être remplis!');
		}
		else if (isNaN(charges)){
			alert ('Entrez le numéro de téléphone sous forme de chiffre');
		}
		else{
			$.post('envoilocataire.php',{nom:nom, prenom:prenom, naissance:naissance, telephone:telephone});
			$('#effectue').html("enregistrement effectué");
			$('#effectue').fadeOut("slow");
			$('#saisielocataire')[0].reset();
		}
	});
	
	$('#saisietype').submit(function (event)
	{
		var type = $('input[name="type"]').val();
		var charges = $('input[name="charges"]').val();
		if (type == "" || charges == ""){
			alert ('Tous les champs doivent être remplis!');
		}
		else if (isNaN(charges)){
			alert ('Le montant des charges doit avoir une valeur numérique');
		}
		else{
			$.post('envoitype.php',{type:type,charges:charges});
			$('#effectue').html("enregistrement effectué");
			$('#effectue').fadeOut("slow");
			$('#saisietype')[0].reset();
		}
	});
	
	function repereCarte()
	{
		var commune = $('#commune option:selected').val();
		var quartier = $('#quartier option:selected').val();
		var type = $('#type option:selected').val();
		var loyermin = $('input[name="loyermin"]').val();
		var loyermax = $('input[name="loyermax"]').val();
		var infos = document.getElementById("info");
		selection = L.layerGroup();
		document.getElementById('rechercher').disabled= true;
		$.post('envoirecherche.php',{nomCommune:commune, nomQuartier:quartier, nomType:type, loyerMin:loyermin, loyerMax:loyermax},
		function(data)
		{
			reponse = JSON.parse(data);
			for (var i=0;i<reponse.length;i++)
			{
				var lat = reponse[i].Latitude_Logement;
				var lon = reponse[i].Longitude_Logement;
				var adresse = reponse[i].Adresse_Logement;
				var type = reponse[i].Nom_Type;
				var superficie = reponse[i].Superficie_Logement;
				var quartier = reponse[i].Nom_Quartier;
				marker = L.marker([lat, lon]);
				marker.addTo(selection)
					.bindPopup(quartier+"<br>"+adresse+"<br>"+type+" - "+superficie+"m2")
					.on('popupopen', function () {
						infoLogement(this.getLatLng().lat,this.getLatLng().lng);
					 })
					 .on('popupclose', function () {
						 document.getElementById('infolaterale').style.visibility="hidden";
					 });
			}
			selection.addTo(macarte);
		});			
	}
	
	function reinitMap()
	{
		selection.clearLayers();
		document.getElementById('rechercher').disabled= false;
	}

	function miseAJour()
	{
		$.post('cherchecommune.php',
			function(data)
			{
				reponse = JSON.parse(data);
				for (var i=0;i<reponse.length;i++)
				{
					commune = reponse[i].Nom_Commune;
					$.ajax({
					url: "https://nominatim.openstreetmap.org/search", // URL de Nominatim
					type: 'get',
					async: false,
					data: "q="+commune+"&format=json&addressdetails=1&extratags=1&limit=1&polygon_svg=1" // Données envoyées (q -> adresse complète, format -> format attendu pour la réponse, limit -> nombre de réponses attendu, polygon_svg -> fournit les données de polygone de la réponse en svg)
					}).done(function (response) {
					if(response != ""){
						var nbhabitants = response[0]['extratags']['population'];
						$.post('updatehabitants.php',{nomCommune:commune, nbHabitants:nbhabitants});
						}                
					}).fail(function (error) {
					alert(error);
					});
				}				
			});		
	alert ("Mise à jour effectuée");	
	}

	function chercheQuartier()
	{
		var commune = $('#commune option:selected').val();
	
		$.post('rquartier.php',
		{id_commune: commune},
		function(data)
		{
			$('#quartier').html(data);
		});
	}
	
	function infoLogementLocataire(id)
	{
		document.getElementById('infolaterale').style.visibility="visible";
		$.post('rinfologementlocataire.php',
		{id:id},
		function(data)
		{
			$('#info').html(data);
		});
	}
	
	function infoLogement(lat,lon)
	{
		document.getElementById('infolaterale').style.visibility="visible";
		$.post('rinfologement.php',
		{latitude:lat, longitude:lon},
		function(data)
		{
			$('#info').html(data);
		});
	}
	
	function libererLogement()
	{	
		var numLogement = $('input[name=selection]:checked').val(); 
		$.post('libere.php', {num_logement:numLogement});
		alert('Le logement est libre');
		chercheLocataire();
	}
	
	function attribuerLogement()
	{
		var numLogement = $('input[name=selection]:checked').val();
		var numLocataire = $('#locataires option:selected').val();
		$.post('veriflogement.php', 
		{num_logement:numLogement},
		function(data)
		{
			if (data != "")
			{
				if ( confirm( "Ce logement n'est pas libre. Souhaitez-vous ajouter un locataire supplémentaire?" ) ) 
				{
					$.post('attribue.php', {num_logement:numLogement, num_locataire:numLocataire});
					alert('Logement attribué');
				}
			}
			else
			{
				$.post('attribue.php', {num_logement:numLogement, num_locataire:numLocataire});
				alert('Logement attribué');
			}
			document.location.reload(true);
		});
	}
	
	function chercheLocataire()
	{
		document.getElementById('libere').disabled= false;
		$.post('rlocataire.php',
		function(data)
		{
			$('#attribution').html(data);
		});
	}
	
	function nouveauLoyer(id)
	{
		var newLoyer = $('input[name='+id+']').val();
		if (isNaN(newLoyer)) {
			alert('Entrez une valeur en chiffre');
			document.location.reload(true);
		}
		else if (newLoyer != ""){
			$.post('changeloyer.php', {numLogement:id, newLoyer:newLoyer});
			alert ('Loyer modifié');
			document.location.reload(true);
		}
		else {
			alert ('Entrez un montant');
		}
	}
	
	function nouvelleCharge(id)
	{
		var newCharge = $('input[name='+id+']').val();
		if (isNaN(newCharge)) {
			alert('Entrez une valeur en chiffre');
			document.location.reload(true);
		}
		else if (newCharge != ""){
			$.post('changecharge.php', {numType:id, newCharge:newCharge});
			alert ('Montant de charge modifié');
			document.location.reload(true);
		}
		else {
			alert ('Entrez un montant');
		}
	}