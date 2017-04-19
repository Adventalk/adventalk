<?php /* app/Model/CommentModel.php */
namespace Model;

use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use \W\View\Plates\PlatesExtensions;

class MembreModel extends UsersModel 
{

	//Ajouter un nouvel utilisateur
	public function ajouterUtilisateur($arrayUser, $arrayFile)
	{
		$this->setPrimaryKey("id_membre");
		$msg = "Utilisateur ajouté avec succès" ;
		//création de l'instance
		$security = new AuthentificationModel();

		// $this->setPrimaryKey("id_utilisateur");
		if($this->emailExists($arrayUser['email']))
			return array("retour"=>false, "message"=>"Email exists");

		//Cryptage du password
		$arrayUser["mdp"] = $security->hashPassword($arrayUser["mdp"]);
		
		//Ajout de l'avatar
		$result = $this->avatarUpload($arrayUser, $arrayFile);
		$arrayUser["avatar"] = $result["filename"];

		//Ajouter l'utilisateur
		$monUtilisateur = $this->insert($arrayUser);

		//Sauvegarder dans les variables de session
		$security->logUserIn($monUtilisateur);
		
		//retour de l'utilisateur au Controller
		return array("retour"=>true, "message"=>$msg);
	}

	
	//Connexion utilisateur
	public function loginUtilisateur($arrayUser)
	{
		$this->setPrimaryKey("id_membre");
		//création de l'instance
		$security = new AuthentificationModel();
		//vérif email
		if(!$this->emailExists($arrayUser['email']))
			return array("retour"=>false, "message"=>"Email exists");

		//vérif des infos sur l'utilisateur
		$monUtilisateur = $security->isValidLoginInfo($arrayUser["email"], $arrayUser["mdp"]);

		if($monUtilisateur["id_membre"] <= 0)
			return array("retour"=>false, "message"=>"Password exists");//retour de l'utilisateur au Controller

		//Sauvegarder dans les variables de session
		$security->logUserIn($monUtilisateur);
		return array("retour"=>true, "message"=>$monUtilisateur);//retour de l'utilisateur au Controller
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
		$msg = "Utilisateur supprimé avec succès" ;
        $this->delete($id);
		return array("retour"=>true, "message"=>$msg);
    }
	
    //Api Mettre à jours un utilisateur
    public function userUpdate($array, $arrayFile, $id){ 
		$this->setPrimaryKey("id_membre");
		$msg = "Utilisateur modifié avec succès !";

		$oldUser = $this->find($id);

		// Ne modifie pas l'avatar si il n'est pas mis à jours
		$result = $this->avatarUpload($array, $arrayFile);
		if($result['newAvatar'] === true ){
			$array["avatar"] = $result["filename"];
			$msg = $result["msg"];
		}
		else{
			$array["avatar"] = $oldUser["avatar"];
		}

		// ne modifie pas le mot-de-passe s'il est vide
		if(isset($array["mdp"]) && $array["mdp"] != ""){
			$array["mdp"] = $security->hashPassword($array["mdp"]);
		}
		else{
			$array["mdp"] = $oldUser["mdp"];
		}

        $this->update($array, $id);
		return array("retour"=>true, "message"=>$msg);
    }


	//Api pour ajouter AVATAR
    private function avatarUpload($array, $arrayFile){ 
		$msg = "";

		$avatar = 'default.jpg'; // Ajouter Avatar par défaut 
		$newAvatar = false; // Variable pour verifier le changement d'avatar

		if(!empty($arrayFile['avatar']['name'])){
			if($arrayFile['avatar']['error'] == 0){
				$ext = explode('/', $arrayFile['avatar']['type']);
				$ext_autorise = array('jpeg', 'jpg', 'png');

				if(in_array($ext[1], $ext_autorise)){

					// Renomme la photo pour éviter les doublons
					$avatar = rand(000000, 999999) . "." . pathinfo($arrayFile['avatar']['name'], PATHINFO_EXTENSION); 
					$avatar = utf8_decode($avatar);

					// enregistrer la photo dans le dossier photo/
					$plates = new PlatesExtensions;
					$chemin_photo = $plates->uploadUrl('gallery/' . $avatar);

					// Copie la photo dans le dossier spécifié
					$target_dir = "upload/avatar/";
					$target_file = $target_dir . basename($avatar);
					move_uploaded_file($arrayFile["avatar"]["tmp_name"], $target_file);
				
					$newAvatar = true;
					
				}
				else{
					$msg .= 'Extensions autorisées : PNG, JPG, JPEG, GIF';
				}
			}
			else{
				$msg .= 'Veuillez selectionner une autre image';
			}
		} // Fin du if

		return ['msg'=> $msg, 'filename' => $avatar, 'newAvatar' =>$newAvatar];
    }

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////// MAPS requête pour récupérer localité, nom, prénom, avatar ////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function googleMap(){		
		
		$resultat =$this->dbh->query('SELECT * FROM membre');
		return $resultat->fetchAll();


	}
}
