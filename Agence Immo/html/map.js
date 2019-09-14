window.onload = function()
	{
		initMap();
		document.getElementById('infolaterale').style.visibility="hidden";
	};

var latCentre = 47.997542;
var lonCentre = -4.097899;
var macarte = null;

function initMap() 
{
	macarte = L.map('map').setView([latCentre, lonCentre], 9);    
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', 
	{                   
		attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);            
			
}
