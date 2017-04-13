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

		// ALBUM
		['GET|POST', '/album/create', 'Album#create', 'createAlbum'],

		// PHOTO
		['GET|POST', '/album/photo/create', 'Photo#create', 'createPhoto'],

// -------  BACK ---------------------------------------------------------------------------- //
		// MEMBRE
		['GET|POST', '/membres/create', 'Membres#create', 'create'],
		['GET|POST', '/membres/create', 'Membres#read', 'read'],
		['GET|POST', '/membres/create', 'Membres#readAll', 'readAll'],
		['GET|POST', '/membres/create', 'Membres#update', 'update'],
		['GET|POST', '/membres/create', 'Membres#delete', 'delete'],
		
		//API CRUD
		['POST', '/api/create', 'Api#create', 'api_create'],
		['POST', '/api/read', 'Api#readAll', 'api_readAll'],
		['POST', '/api/read/[i:id]', 'Api#read', 'api_read'],
		['POST', '/api/update/[i:id]', 'Api#update', 'api_update'],
		['POST', '/api/delete/[i:id]', 'Api#delete', 'api_delete'],

	);
?>