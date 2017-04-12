<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		
		//Authentification
		['GET|POST', '/login', 'Authen#login', 'login'],
		['GET|POST', '/register', 'Authen#register', 'register'],

		//HOME
		['GET', '/home', 'Home#accueil', 'home'],

		['GET', '/membre/profil', 'membres#profil', 'profil'],
		

	);
