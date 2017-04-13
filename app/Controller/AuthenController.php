<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UtilisateurModel;
use \W\Security\AuthentificationModel;

class AuthenController extends Controller
{

	/**
	 * Page de connexion
	 */
	public function login()
	{
		$this->show('authen/login'); 
		if(!empty($_POST)){
            foreach($_POST as $elem)
                if(empty($elem))
                    $this->show('authen/login');
		}
		$dbUser = new UtilisateurModel();
		$utilisateur = $dbUser->logUserIn($_POST);
		
		if($utilisateur["retour"]){
			$this->redirectToRoute('home');
		}
			   $this->show('authen/login');
	}

	/**
	 * Page d'inscription
	 */
	public function register()
	{
        if(!empty($_POST)){
            foreach($_POST as $elem)
                if(empty($elem))
                    $this->show('authen/register');
                
				//connexion à la BDD via une nouvelle instance
                $dbUser = new UtilisateurModel();
               	$utilisateur = $dbUser->ajouterUtilisateur($_POST);
			    if($utilisateur["retour"]){
				   $this->redirectToRoute('home');
			    }
        }
			   $this->show('authen/register');
			
	}
	

}