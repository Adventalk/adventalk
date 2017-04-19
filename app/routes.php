<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

// -------  FRONT ---------------------------------------------------------------------------- //
		//Authentification
		['GET|POST', '/login', 'Authen#login', 'login'],
		['GET|POST', '/register', 'Authen#register', 'register'],

		//HOME
		['GET', '/home', 'Home#accueil', 'home'],

		//MEMBRE
		['GET', '/membre/profil', 'membres#profil', 'profil'],
		['GET', '/membre/map', 'Home#bigMap', 'big_map'],

		// ALBUM
		['GET|POST', '/album/create/[i:id]', 'Album#create', 'createAlbum'],

		// PHOTO
		['GET|POST', '/album/photo/create/[i:id]', 'Photo#create', 'createPhoto'], //NEW


// -------  BACK ---------------------------------------------------------------------------- //
		// MEMBRES
		['GET|POST', '/membres/create', 'Membres#create', 'create'],
		
		//API CRUD
		['POST', '/api/create', 'Api#create', 'api_create'],
		['POST', '/api/read', 'Api#readAll', 'api_readAll'],
		['POST', '/api/read/[i:id]', 'Api#read', 'api_read'],
		['POST', '/api/update/[i:id]', 'Api#update', 'api_update'],
		['POST', '/api/delete/[i:id]', 'Api#delete', 'api_delete'],
		['POST', '/api/map', 'Api#maps', 'api_map'],
    
		//API PHOTO
		['POST', '/api/createphoto', 'Api#createPhoto', 'api_create_photo'], //NEW
		['POST', '/api/readphoto', 'Api#readAllPhotos', 'api_readAll_photo'], //NEW
		['POST', '/api/readphoto/[i:id]', 'Api#readPhoto', 'api_read_photo'], //NEW
		['POST', '/api/updatephoto/[i:id]', 'Api#updatePhoto', 'api_update_photo'], //NEW
		['POST', '/api/deletephoto/[i:id]', 'Api#deletePhoto', 'api_delete_photo'], //NEW

		//API ALBUM
		['POST', '/api/createalbum', 'Api#createAlbum', 'api_create_album'], //NEW
		['POST', '/api/readalbum', 'Api#readAllAlbum', 'api_readAll_album'], //NEW
		['POST', '/api/readalbum/[i:id]', 'Api#readAlbum', 'api_read_album'], //NEW
		['POST', '/api/updatealbum/[i:id]', 'Api#updateAlbum', 'api_update_album'], //NEW
		['POST', '/api/deletealbum/[i:id]', 'Api#deleteAlbum', 'api_delete_album'], //NEW


		// SEARCH
		['GET|POST', '/home/search', 'Search#search', 'search'],
	);
?>