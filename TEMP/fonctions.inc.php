<?php

// fonction pour faire les debug : 
function debug($arg){
	echo '<div style="color: white; padding: 10px; background:#' . rand(111111,999999) . '" >';
	$trace = debug_backtrace(); // Nous retourne des infos sur l'emplacement où est exécuter la fonction actuelle. (sous forme de tableau multi)
	
	echo 'Le debug a été demandé dans le fichier : ' . $trace[0]['file'] . ' à la ligne : ' . $trace[0]['line'] . '<hr/>'; 
	
	echo '<pre>';
	print_r($arg);
	echo '</pre>';
	
	echo '</div>';
}

/* ******************** CONNEXION ******************** */
function userConnecte(){
	if(isset($_SESSION['membre'])){
		return TRUE; 
	}
	else{
		return FALSE; 
	}
	// S'il existe une session/membre, cela signifie que l'utilisateur est connecté. On retourne TRUE, sinon FALSE. 
}

// Fonction pour voir si user est admin
function userAdmin(){
	if(userConnecte() && $_SESSION['membre']['statut'] == 1){
		return TRUE;
	}
	else{
		return FALSE;
	}
	// Si l'utilisateur est connecté et que dans le même temps son statut est égal à 1, alors cela signifie qu'il est admin. Je retourne TRUE, sinon je retourne FALSE. 
}



/* ******************** GESTION ******************** */
// Fonction pour supprimer un produit du panier
function retirerProduit($id_produit){
	$position_pdt_a_supprimer = array_search($id_produit, $_SESSION['panier']['id_produit']); 
	// Je cherche la position du produit a supprimer grace à son ID afin de supprimer la ligne dans les 5 mini-tableaux de mon panier
	if($position_pdt_a_supprimer !== FALSE){
		array_splice($_SESSION['panier']['id_produit'], $position_pdt_a_supprimer, 1);
		array_splice($_SESSION['panier']['quantite'], $position_pdt_a_supprimer, 1);
		array_splice($_SESSION['panier']['titre'], $position_pdt_a_supprimer, 1);
		array_splice($_SESSION['panier']['photo'], $position_pdt_a_supprimer, 1);
		array_splice($_SESSION['panier']['prix'], $position_pdt_a_supprimer, 1);
	}
}