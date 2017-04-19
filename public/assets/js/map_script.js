
	
			///////////////////////// MAP GOOGLE /////////////////////////////


	var map_google;
	var ClosePopup = 0;
	var markers = ["n"];
	function initMap() {// ! \\ on doit appeler cette fonction dans la balise <script> calback(voir la ligne 51)
	var myLatLng = {lat: 48.8589507, lng: 2.2775174}
	$.ajax({
		url: "http://localhost/adventalk/public/api/map",
		type: "POST",
		success: function (reponse){
			TraitementMaps(reponse);//Une fois qu'il récupère les données => il va appelé le Traitement (Maps)
			
		}
	})
				//Traitement Google Maps
	function TraitementMaps(reponse) {
		var resultat = reponse; //Transformer l'objet php en fichier json 
		var image = {
			// Adresse de l'icône personnalisée
			url: 'E:/xamp/htdocs/adventalk/public/assets/img/help.png',
			// Taille de l'icône personnalisée
			size: new google.maps.Size(25, 40),
			// Origine de l'image, souvent (0, 0)
			origin: new google.maps.Point(0,0),
			// L'ancre de l'image. Correspond au point de l'image que l'on raccroche à la carte. Par exemple, si votre îcone est un drapeau, cela correspond à son mâts
			anchor: new google.maps.Point(0, 20)
		};
		map_google = new google.maps.Map(document.getElementById('map'),{
		center: myLatLng,
		zoom: 5,
		mapTypeId: 'satellite',
		icon: image,
		});

	// var resultat = reponse; //Transformer l'objet php en fichier json 

		for(var i=0; i < resultat.length; i++){//boucle pour afficher tous les marker
		
		/* ***Traitement pour la PopUp*** */
		var info = '<h1>'+resultat[i].prenom+' '+resultat[i].nom+'</h1>';
		var infowindow = new google.maps.InfoWindow({
			//marker: marker[i],
			placement: 'top',
			content: info,
			Titre: 'Hello',
			// maxWidth: 400,
			// maxHeight: 200
		}); // Fin Info.Window

		// L'adresse que nous allons rechercher
			var GeocoderOptions = {
				'address' : resultat[i].localite_actuelle,
				'region' : 'FR'
			}

			// Notre fonction qui traitera le resultat
			function GeocodingResult( results , status )
			{
				// Si la recher à fonctionné
				if( status == google.maps.GeocoderStatus.OK ) {


					// On créé donc un nouveau marker sur l'adresse géocodée
					myMarker = new google.maps.Marker({
					position: results[0].geometry.location,
					animation: google.maps.Animation.DROP,
					Mike: infowindow,
					//draggable: true,
					map: map_google,
					visible: true,
					}); //Fin google.maps.Marker

				} // Fin si status OK
		
			} // Fin de la fonction
	
		// Nous pouvons maintenant lancer la recherche de l'adresse
		var myGeocoder = new google.maps.Geocoder();
		myGeocoder.geocode( GeocoderOptions, GeocodingResult );
		
		



		markers[i] = myGeocoder; //Stocker les marker dans un array(tableau)

		//Création de l'evenement sur le marker
		// google.maps.event.addListener(myGeocoder,'click' , function() {
		// 	if(ClosePopup != 0)//S'il y a une popup ouvert tu le fermer 
		// 	ClosePopup.close();
		// 	else{this.Mike.open(map_google, this);}
		// 	//Sinon tu ouvre la popup
		// 	ClosePopup = this.Mike;
		// }); //Fin addListener      
		} //End FOR 
		       
		
		var infowindow = new google.maps.InfoWindow({
			content: "Hello World !",
			size: new google.maps.Size(100, 100)
		});
		
		google.maps.event.addListener(myGeocoder, 'click', function(){
			infowindow.open(map,marker);
		});
	} //END FUNCTION TraitementMaps

} //END FUNCTION initMap()