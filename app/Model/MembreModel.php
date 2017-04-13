<?php /* app/Model/CommentModel.php */
namespace Model;

use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;

class MembreModel extends UsersModel 
{

	//Ajouter un nouvel utilisateur
	public function ajouterUtilisateur($arrayUser)
	{

		$this->setPrimaryKey("id_membre");

		//création de l'instance
		$security = new AuthentificationModel();

		// $this->setPrimaryKey("id_utilisateur");
		if($this->emailExists($arrayUser['email']))
			return array("retour"=>false, "message"=>"Email exists");

		//Cryptage du password
		$arrayUser["mdp"] = $security->hashPassword($arrayUser["mdp"]);

		//Ajouter l'utilisateur
		$monUtilisateur = $this->insert($arrayUser);

		//Sauvegarder dans les variables de session
		$security->logUserIn($monUtilisateur);

		//retour de l'utilisateur au Controller
		return array("retour"=>true, "message"=>$monUtilisateur);
	}

	//Ajouter un nouvel utilisateur
	public function loginUtilisateur($arrayUser)
	{

		//création de l'instance
		$security = new AuthentificationModel();

		//vérif email
		if($this->emailExists($arrayUser['email']))
			return array("retour"=>false, "message"=>"Email exists");

		


		//vérif des infos sur l'utilisateur
		$monUtilisateur = $security->isValidLoginInfo($arrayUser["email"], $arrayUser["mdp"]);

		//retour de l'utilisateur au Controller
		return array("retour"=>true, "message"=>$monUtilisateur);
	}

	//récupération de toute la table utilisateurs
	public function readAllUser(){
		$this->setPrimaryKey("id_membre");
		return $this->findAll();
	}

	//récupération d'un seul utilisateur
	public function readUser($id){
		$this->setPrimaryKey("id_membre");
		return $this->find($id);
	}

	
    //Api delete utilisateur
    public function userDelete($id){ 
		$this->setPrimaryKey("id_membre");
        $this->delete($id);

    }
	
    //Api update utilisateur
    public function userUpdate($array, $id){ 
		$this->setPrimaryKey("id_membre");
        $this->update($array, $id);

    }
}
