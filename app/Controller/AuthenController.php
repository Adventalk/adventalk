<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MembreModel;
use \W\Security\AuthentificationModel;

class AuthenController extends Controller
{

	/**
	 * Page de connexion
	 */
	public function login()
	{
		if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('authen/login');
				}
			}
			$dbUser = new MembreModel();
			$utilisateur = $dbUser->loginUtilisateur($_POST); // logUserIn($user)
			if($utilisateur["retour"]){
				$this->redirectToRoute('home');
			}
		}
		$this->show('authen/login');
	}

	/**
	 * Page d'inscription
	 */
	public function register()
	{
        if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('authen/register');
				}
			}

			//connexion à la BDD via une nouvelle instance
			$dbUser = new MembreModel();
			$utilisateur = $dbUser->ajouterUtilisateur($_POST, $_FILES);
			if($utilisateur["retour"]){
				$this->redirectToRoute('home');
			}
        }
		$this->show('authen/register');	
	}

} // END CLASS AuthenController